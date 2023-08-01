<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    
    
</body>
</html>