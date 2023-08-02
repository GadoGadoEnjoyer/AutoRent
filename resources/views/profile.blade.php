<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Your Profile!</title>
</head>
<body>
    <p> Hello {{ $user->name }} !!! </p>
    <br>
    <b>The Car you currently own are</b><br>
    @foreach ($user->cars as $car)
        {{ $car->model }}
        @if($car->isRented)
         Rented By <b>{{ $car->RenterUser->name }}</b> Until  {{ $car->rentLimit }}
        @endif
        <br>
    @endforeach
    <br>
    <br>
    <b>The Car you currently Renting are</b> <br>
    @foreach ($cars as $car)
        {{ $car->model }} 
        Until {{ $car->rentLimit}}
        <br>
        @if($isUser)
            <form action="{{ route('returncar',$car->id) }}" method="POST">
                @csrf
                @method('patch')
                <button type="submit" onclick="window.location.reload();">Return the car!</button>
            </form>
            @if($now > $car->rentLimit)
            <p> YOU ARE LATE! YOU NEED TO RETURN THE CAR IMMIDEATLY!!! THE LIMIT IS {{ $car->rentLimit }} AND TODAY IS {{ $now }}</p>
            @endif
        @endif
    @endforeach
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>