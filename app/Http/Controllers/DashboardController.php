<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        if(auth()->user()->role == 'admin'){

            $customers = Customer::all()->count();
            $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->count();
            $selesai = Transaksi::where('status_order','Selesai')->count();
            $diambil = Transaksi::where('status_order','Clear')->count();
           
        return view('dashboard.index',compact('customers','masuk','selesai','diambil'));
        } else {
            $customers = Customer::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get()->count();
            $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->where('user_id',Auth::user()->id)->get()->count();
            $selesai = Transaksi::where('status_order','Selesai')->where('user_id',Auth::user()->id)->get()->count();
            $diambil = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id)->get()->count();
        return view('dashboard.index',compact('customers','masuk','selesai','diambil'));
        }
    }

    public function keuangan(){

        if(auth()->user()->role == 'admin'){

            // harian
            $days = Carbon::now()->locale('id');
            // dd($days);
            $pemasukanhari = Transaksi::where('status_order','Clear') ->whereDate('created_at', '=', $days)->get();
            // dd($pemasukanhari);
            $day = $pemasukanhari->sum('total');

            // bulanan
            $pemasukanbulan = Transaksi::where('status_order','Clear') ->whereMonth('created_at', '=', $days)->get();
            // dd($pemasukanbulan);
            $bulan = $pemasukanbulan->sum('total');

            // tahunan
            $pemasukantahun = Transaksi::where('status_order','Clear') ->whereYear('created_at', '=', $days)->get();
            // dd($pemasukantahun);
            $tahun = $pemasukantahun->sum('total');


            $chart = Transaksi::where(DB::raw("(DATE_FORMAT(updated_at,'%Y'))"),date('Y'))
                    ->get();
            dd($chart);

            // dd($total);
            return view('dashboard.keuangan',compact('pemasukanhari','pemasukanbulan','pemasukantahun','days','day','bulan','tahun'));
        } else {
            $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereDate('created_at', '=', $days)->get();
            $day = $pemasukanhari->sum('total');
            $pemasukanbulan = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereMonth('created_at', '=', $days)->get();
            $bulan = $pemasukanbulan->sum('total');
            $pemasukantahun = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereYear('created_at', '=', $days)->get();
            $tahun = $pemasukantahun->sum('total');
        
            return view('dashboard.keuangan',compact('pemasukanhari','pemasukanbulan','pemasukantahun','days','day','bulan','tahun'));
        }
       
    }
    public function keuangantahun(){

        if(auth()->user()->role == 'admin'){

          
             $days = Carbon::now()->locale('id');
            $pemasukantahun = Transaksi::where('status_order','Clear') ->whereYear('created_at', '=', $days)->get();
          
            return view('dashboard.keuangan.tahun',compact('days','pemasukantahun'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukantahun = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereYear('created_at', '=', $days)->get();
            $tahun = $pemasukantahun->sum('total');
        
            return view('dashboard.keuangan.tahun',compact('days','pemasukantahun'));
        }
       
    }
    public function keuanganhari(){

        if(auth()->user()->role == 'admin'){

            // harian
             $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear') ->whereDate('created_at', '=', $days)->get();
            // dd($pemasukanhari);
            $day = $pemasukanhari->sum('total');

            return view('dashboard.keuangan.hari',compact('days','pemasukanhari'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukanhari = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereDate('created_at', '=', $days)->get();
           
            return view('dashboard.keuangan.hari',compact('days','pemasukanhari'));
        }
       
    }
    public function keuanganbulan(){

        if(auth()->user()->role == 'admin'){

             $days = Carbon::now()->locale('id');
            $pemasukanbulan = Transaksi::where('status_order','Clear') ->whereMonth('created_at', '=', $days)->get();

            return view('dashboard.keuangan.bulan',compact('days','pemasukanbulan'));
        } else {
             $days = Carbon::now()->locale('id');
            $pemasukanbulan = Transaksi::where('status_order','Clear')->where('user_id',Auth::user()->id) ->whereMonth('created_at', '=', $days)->get();
           
            return view('dashboard.keuangan.bulan',compact('days','pemasukanbulan'));
        }
       
    }
}
