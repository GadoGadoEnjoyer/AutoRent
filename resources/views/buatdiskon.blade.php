<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Diskon!</title>
</head>
<body>
    <form action="{{ route('buatdiskon') }}" method="POST">
        @csrf
        <input type="text" name="nama_diskon" placeholder="Nama Diskon">
        <input type="number" name="jumlah_diskon" placeholder="Jumlah Diskon">
        <button type="submit">Buat Diskon</button>
</body>
</html>