<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
