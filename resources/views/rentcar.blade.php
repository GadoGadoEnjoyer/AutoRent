<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent {{ $car->model }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <p> You will be renting {{ $car->model }} for {{ $car->price }} dollars a day </p>
    <form action="{{ route('rentcar',$car->id) }}" method="POST">
        @csrf
        @method('patch')
        <label for="rentLimit">Rent this Car until</label>
        <input type="date" name="rentLimit" id="dateInput">
        <button type="submit">Rent the car!</button>
    </form>
    <div id="displayText"></div>
    <form action="{{ route('cekdiskon',$car->id) }}" method="GET">
        @csrf
        <input type="text" name="nama_diskon" placeholder="Nama Diskon" @isset(session('diskon')->jumlah_diskon) value={{ session('diskon')->nama_diskon }} @endisset>
        @isset(session('diskon')->jumlah_diskon)
        <p>Valid! You got {{ session('diskon')->jumlah_diskon }}% discount!</p>
        @endisset
        <button type="submit">Cek Diskon Valid?</button>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const dateInput = document.getElementById('dateInput');
            const displayText = document.getElementById('displayText');

            dateInput.addEventListener('change', function () {
                const selectedDate = dateInput.value;

                const diff = new Date(selectedDate) - new Date() ;
                const realdiff = Math.ceil(diff / (1000 * 60 * 60 * 24)) * 1;
                const price = {{ $car->price }} * realdiff;
                
                displayText.textContent = realdiff + "Days! for only " + price + " dollars!";
                @isset(session('diskon')->jumlah_diskon)
                const diskonan = price/100 * {{session('diskon')->jumlah_diskon}}
                const hargadiskon = Math.ceil(price - diskonan);
                    displayText.textContent = realdiff + "Days! for only " + price + " dollars! And with discount you only pay " + hargadiskon + "dollar!";
                @endisset
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>