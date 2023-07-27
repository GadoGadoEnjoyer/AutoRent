<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars for Rent!</title>
</head>
<body>
    @foreach ($cars as $car)
        @if(!$car->isRented == 1)
         <p>Model : {{ $car->model }}</p>
         <p>Owner : {{ $car->owner->name }}</p>
         <p>Color : {{ $car->color }}</p>
         <p>Price : {{ $car->price }}$ per Day</p>
         <br>
         @if(isset($car->Imagelink))
            <img src="{{ url('../'.$car->Imagelink) }}" alt="car image">
         @else
            <img src="{{ url('../image/default.png') }}" alt="car image">
        @endif
         <button><a href={{ route('bukarentCar',$car->id) }}>RENT THIS CAR!</a></button>
        @endif
    @endforeach
</body>
</html>