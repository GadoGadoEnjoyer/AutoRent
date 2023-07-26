<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AutoRent!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

</head>
<body>
    <h1>Welcome to AutoRent!</h1>

    <div class="gridwrap">
        <button onclick="window.location='{{ route("registerCar") }}'"><img src="../image/access-hand-key-icon.svg">Rent Your Car!</button>
        <button onclick="window.location='{{ route("carlist") }}'"><img src="../image/rent-a-car-icon.svg">Rent some stranger Car!</button>
    </div>
</body>
</html>