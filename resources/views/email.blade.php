<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <h1>Tiket Wisata</h1>
    <P>Kode :{{$data->kode_tiket}}</P>
    <p>Nama Wisata : {{$data->wisata->nama_wisata}}</p>
    <p>Jumlah Orang : {{$data->jumlah_pengunjung}}</p>
    <p>Total bayar : {{$data->total}}</p>
   
    <p>Tanggal Berkunjung : {{$data->tgl_berkunjung}}</p>
    
</body>
</html>