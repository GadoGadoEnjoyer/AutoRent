<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login!</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="login d-flex align-items-center justify-content-center">
<div class="container h-100 w-25">
    <form action="{{ route('login') }}" method="POST" class="border border-dark p-5 m-5">
        @csrf
        <div class="row">
        <label for="name">Name</label>
        <br>
        <input type="text" name="name">
        </div>
        <div class="row mt-2">
        <label for="email">Email</label>
        <br>
        <input type="text" name="email">
        </div>
        <div class="row mt-2">
        <label for="password">Password</label>
        <br>
        <input type="text" name="password">
        </div>
        <div class="row mt-5">
        <button type="submit" class="btn btn-primary">Login!</button>
        </div>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>