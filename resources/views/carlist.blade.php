<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars for Rent!</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="container-fluid h-100 w-100">
    @if($cars->isEmpty())
        <h1>NO CAR TO RENT</h1>
        <h2>MASSIVE SKILL ISSUE LMAO</h2>
    @endif
    @foreach ($cars as $car)
    <div class="row border-dark border">
        <div class="col-sm-12 col-md-6 col-lg-4 text-center display-5">
         <p>Model : {{ $car->model }}</p>
         <p>Owner : {{ $car->owner->name }}</p>
         <p>Color : <span style="background-color:{{ $car->color }};">{{ $car->color }}</span></p>
         <p>Price : {{ $car->price }}$ per Day</p>
         <br>
        </div>
         @if(isset($car->Imagelink))
            <img src="{{ url('../'.$car->Imagelink) }}" alt="car image" style="max-width:40%" class="col-sm-12 col-md-10 col-lg-10">
         @else
            <img src="{{ url('../image/default.png') }}" alt="car image" style="max-width:40%" class="col-sm-12 col-md-10 col-lg-10">
        @endif
        <button class="btn btn-light col-sm-2 col-md-2 col-lg-2" onclick="window.location='{{ route('bukarentCar',$car->id) }}'"><span class="text-center display-5">RENT THIS CAR!</span></button>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>