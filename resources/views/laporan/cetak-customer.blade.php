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
                    <td colspan="6" style="background-color: rgb(133, 133, 133); text-align: center"><h3>Arsya Laundry</h3></td>
                </tr>

                <tr>
                <th>Cabang</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                </tr>
               
            </thead>
            <tbody>
              
                @foreach ($data as $item)
                    <tr>
                       
                        <td>{{ $item->user->nama_cabang }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>@if ($item->kelamin == 'L')
                            Laki - laki
                        @else 
                      Perempuan @endif</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_telp }}</td>
                  
                </tr>
               
                  @endforeach

              
            </tbody>
            
        </table>
    </div>
</body>
</html>