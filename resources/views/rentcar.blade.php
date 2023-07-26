<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rent {{ $car->model }}</title>
</head>
<body>
    <p> You will be renting {{ $car->model }} for {{ $car->price }} dollars a day </p>
    <form action="{{ route('rentcar',$car->id) }}" method="POST">
        @csrf
        @method('patch')
        <label for="rentLimit">Rent this Car until</label>
        <input type="date" name="rentLimit">
        <button type="submit">Rent the car!</button>
    </form>
</body>
</html>