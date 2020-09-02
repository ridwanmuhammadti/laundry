<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:0px;
            width:100%;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:0px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:auto;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <table>
            <thead>
                <tr>
                    {{-- <th colspan="4">Invoice <strong>{{$data->invoice}}</strong></th>
                    <th>{{ $data->created_at->format('d-M-Y') }}</th> --}}
                </tr>
               
            </thead>
            <tbody>
                <tr>
                    <th class="text-center">#</th>
                    <th>Jenis Pakaian</th>
                    <th class="text-right">Berat</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Total</th>
                </tr>
              
                <td>{{ $gaji->user->name }}</td>
                  <td>{{ $gaji->tgl_awal }} - {{ $gaji->tgl_akhir }}</td>
                  <td>{{ Rupiah($gaji->absen) }}</td>
                  <td>{{ Rupiah($gaji->uang_makan) }}</td>
                  <td>{{ Rupiah($gaji->uang_transport) }}</td>
                  <td>{{ Rupiah($gaji->uang_lembur) }}</td>
                  <td>{{ Rupiah($gaji->bonus) }}</td>
                  <td>{{ Rupiah($gaji->total) }}</td>
              
                <tr>
               
            </tbody>
            
        </table>
    </div>
</body>
</html>