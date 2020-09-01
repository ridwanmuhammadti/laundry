<?php

namespace App\Http\Controllers;

use App\Customer;
use Carbon\Carbon;
use PDF;
use App\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
      
    }
    public function indexlaundry(){
        $customers = Customer::all();
        $transaksi = Transaksi::all();
       
        return view('laporan.laundry',compact('customers','masuk','selesai','diambil'));
    }

    public function invoicefilter(Request $request){
        $data = Riwayat::whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
        // dd($data);

        $tgl_mulai = $request->tanggal_mulai;
        $tgl_akhir = $request->tanggal_akhir;
        $tgl = Carbon::now();
        $pdf = PDF::loadView('backend.laporan.riwayatfilterwaktu', ['data' => $data, 'tgl' => $tgl, 'tgl_mulai' => $tgl_mulai, 'tgl_akhir' => $tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Riwayat .pdf');
    }
}
