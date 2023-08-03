<!DOCTYPE html>
<html class="h-100 m-0 p-0" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars for Rent!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">
</head>
<body style="min-height:fit-content;background-color:#383838;font-family: 'Lexend Deca', sans-serif; color:white !important;">
    <a href='{{ route("welcome") }}' style="font-weight:700;font-size: clamp(2rem, 4vw, 4rem);margin:2%;text-shadow:0px 13px 4px black;color:white !important;text-decoration:none !important;cursor:pointer;">AUTORENT</a>
<div style="display:grid;grid-template-columns:1fr 1fr;font-size: clamp(0.5rem, 1.5vw, 2rem);min-height:fit-content;margin-top:10%;justify-items:center;">
    @if($cars->isEmpty())
        <h1>NO CAR TO RENT</h1>
        <h2>MASSIVE SKILL ISSUE LMAO</h2>
    @endif
    @foreach ($cars as $car)
    <div style="max-width:75%;background-color:#6f6f6faa;display:grid;padding-top:2%;padding-left:2%;grid-template-areas:'img desc' 'butt butt';margin-bottom:5%;grid-template-columns:1fr 1fr;box-shadow:20px 20px 10px black;">
        @if(isset($car->Imagelink))
            <img src="{{ url('../'.$car->Imagelink) }}" alt="car image" style="width:90%;max-height:80%;grid-area: img;">
         @else
            <img src="{{ url('../image/default.png') }}" alt="car image" style="width:90%;max-height:80%;grid-area: img;">
        @endif
        <div style="grid-area: desc;overflow-y:scroll;max-height:75%;overflow-wrap:normal;scrollbar-width:thin;padding-right:0%;overflow-x:hidden;scrollbar-color:#C4C4C4 #5D5D5D ">
         <p style="inline-size:100%;">Model : {{ $car->model }}<br>Owner : {{ $car->owner->name }}<br>Color : {{ $car->color }}<br>Price : {{ $car->price }}$ per Day</p>
         <br>
        </div>
        <button onclick="window.location='{{ route('bukarentCar',$car->id) }}'" style="grid-area: butt;max-width:45%;min-height:100%;justify-self:center;border-radius:10px;background-color:#9D9D9D;color:white;"><span>RENT THE CAR!</span></button>
    </div>
    @endforeach
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>