<?php

namespace App\Exports;


use Illuminate\Http\Request;

use App\Suara;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\Exportable;

class KelurahanSuaraExport implements  ShouldAutoSize,  FromCollection,  WithHeadings,  WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    protected $request;
   public function __construct($request)
   {
       $this->request = $request;
   }

    public function collection()
    {

        // $suaras = Suara::query('id',$this->request->id)->get();
        $suaras = Suara::query();
        // dd($suaras);

        if ($this->request->get('kelurahan')) {
            if ($this->request->get('kelurahan') == 'LoktabatUtara') {
                $suaras->where('kelurahan', 'Loktabat Utara');
            }

            if ($this->request->get('kelurahan') == 'Komet') {
                $suaras->where('kelurahan', 'Komet');
            }
            if ($this->request->get('kelurahan') == 'Mentaos') {
                $suaras->where('kelurahan', 'Mentaos');
            }
            if ($this->request->get('kelurahan') == 'Komet') {
                $suaras->where('kelurahan', 'Komet');
            }
            if ($this->request->get('kelurahan') == 'SungaiUlin') {
                $suaras->where('kelurahan', 'Sungai Ulin');
            }
            if ($this->request->get('kelurahan') == 'SeiBesar') {
                $suaras->where('kelurahan', 'Sei Besar');
            }
            if ($this->request->get('kelurahan') == 'GuntungPaikat') {
                $suaras->where('kelurahan', 'Guntung Paikat');
            }
            if ($this->request->get('kelurahan') == 'Kemuning') {
                $suaras->where('kelurahan', 'Kemuning');
            }
            if ($this->request->get('kelurahan') == 'LoktabatSelatan') {
                $suaras->where('kelurahan', 'Loktabat Selatan');
            }
            if ($this->request->get('kelurahan') == 'Cempaka') {
                $suaras->where('kelurahan', 'Cempaka');
            }
            if ($this->request->get('kelurahan') == 'SungaiTiung') {
                $suaras->where('kelurahan', 'Sungai Tiung');
            }
            if ($this->request->get('kelurahan') == 'Bangkal') {
                $suaras->where('kelurahan', 'Bangkal');
            }
            if ($this->request->get('kelurahan') == 'Palam') {
                $suaras->where('kelurahan', 'Palam');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinTimur') {
                $suaras->where('kelurahan', 'Landasan Ulin Timur');
            }
            if ($this->request->get('kelurahan') == 'Syamsuddinoor') {
                $suaras->where('kelurahan', 'Syamsuddinoor');
            }
            if ($this->request->get('kelurahan') == 'GuntungManggis') {
                $suaras->where('kelurahan', 'Guntung Manggis');
            }
            if ($this->request->get('kelurahan') == 'GuntungPayung') {
                $suaras->where('kelurahan', 'Guntung Payung');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinBarat') {
                $suaras->where('kelurahan', 'Landasan Ulin Barat');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinTengah') {
                $suaras->where('kelurahan', 'Landasan Ulin Tengah');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinUtara') {
                $suaras->where('kelurahan', 'Landasan Ulin Utara');
            }
            if ($this->request->get('kelurahan') == 'LandasanUlinSelatan') {
                $suaras->where('kelurahan', 'Landasan Ulin Selatan');
            }
          
        }

        $tes = $suaras->get();

        // dd($tes);

        $output = [];

        foreach ($tes as $suara)
        {
          $output[] = [
            $suara->nama,
            $suara->no_ktp,
            $suara->alamat,
            $suara->rt ,
            $suara->rw ,
            $suara->kelurahan ,
            $suara->no_tps ,
            $suara->no_telpon,
            $suara->ket ,
            $suara->koordinator ,
            $suara->tim_pendata ,
            Date::dateTimeToExcel($suara->tgl_terima),
          ];
        }
        return collect($output);
    }

    // public function map($suara): array
    // {
    //     return [
    //         $suara->nama,
    //         $suara->no_ktp,
    //         $suara->alamat,
    //         $suara->rt ,
    //         $suara->rw ,
    //         $suara->kelurahan ,
    //         $suara->no_tps ,
    //         $suara->no_telpon,
    //         $suara->ket ,
    //         $suara->koordinator ,
    //         $suara->tim_pendata ,
    //         Date::dateTimeToExcel($suara->tgl_terima),
            
    //     ];
    // }

    public function headings(): array
    {
        return [
            'Nama',
            'Nomor KTP',
            'Alamat',
            'RT',
            'RW',
            'Kelurahan',
            'No TPS',
            'No Telpon',
            'KET',
            'Koordinator',
            'Tim Pendata',
            'Tanggal Terima Data',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
