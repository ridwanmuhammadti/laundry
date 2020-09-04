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
        $customers = Customer::all()->count();
        $masuk = Transaksi::whereIN('status_order',['Proses','Selesai','Clear'])->count();
        $selesai = Transaksi::where('status_order','Selesai')->count();
        $diambil = Transaksi::where('status_order','Clear')->count();
        $sp = Transaksi::where('status_order','Proses')->count();
        $proses = Transaksi::whereIN('status_order',['Proses','Selesai'])->get();
        return view('laporan.laundry',compact('proses','customers','masuk','selesai','diambil','sp'));
    }

    public function cetaklaundry(Request $request)
    {
        

        $transaksi = Transaksi::query();

        // dd($request->all());
        if ($request->get('status_order')) {
            if ($request->get('status_order') == 'Proses') {
                $transaksi->where('status_order', 'Proses');
            }

            if ($request->get('status_order') == 'Selesai') {
                $transaksi->where('status_order', 'Selesai');
            }
            if ($request->get('status_order') == 'Diambil') {
                $transaksi->where('status_order', 'Clear');
            }
        }

        $cetaklaundry = $transaksi->get();

        return PDF::setOptions(['images' => true, 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('laporan.cetak-laundry', compact('cetaklaundry'))->setPaper('legal', 'landscape')->stream();
    }

    public function cetakfilterlaundry(Request $request){
        // dd($request->all());

        $days = Carbon::now()->locale('id');
        $data = Transaksi::whereIN('status_order',[$request->proses,$request->selesai,$request->diambil])->whereBetween('updated_at', [$request->tanggal_mulai, $request->tanggal_akhir])->get();
        // dd($data);

        $tgl_mulai = $request->tanggal_mulai;
        $tgl_akhir = $request->tanggal_akhir;
        
        $pdf = PDF::loadView('laporan.cetak-laundry-filter',compact('data','tgl_mulai','tgl_akhir','days'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan Riwayat .pdf');
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
