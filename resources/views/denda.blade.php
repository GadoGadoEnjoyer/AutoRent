<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DENDA!</title>
</head>
<body>
    {{ $car->RenterUser->name }}
    <p>KAMU TELAH TELAT BAYAR MOBIL {{ $car->model }} BATAS {{ $car->rentLimit }} DAN HARI INI {{ $now }}</p>
    <br>
    <h2>KAMU SUDAH TELAT {{ $besardenda }} HARI</h2>
    <h2>DENDA KAMU {{ $besardenda * 20 }} MORBILLION DOLLAR</h2>
    <p>KAMU JUGA DI BAN</p>
    <form action="{{ route('denda',$car->id) }}" method="POST">
        @csrf
        @method('patch')
        <button type="submit" onclick="window.location.reload();">BAYAR DENDA!</button>
</body>
</html>