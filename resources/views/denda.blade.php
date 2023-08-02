<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DENDA!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>