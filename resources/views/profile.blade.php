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
    The Car you currently own are <br>
    @foreach ($user->cars as $car)
        {{ $car->model }}
        <br>
    @endforeach
    
    
</body>
</html>