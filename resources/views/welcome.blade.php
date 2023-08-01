<!DOCTYPE html>
<html class="h-100 m-0 p-0" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AutoRent!</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }} ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

</head>
<body class="h-100 m-0 p-0 welcome">
    <div class="container-fluid h-100 w-100">
        
        <div class="row justify-content-center mt-3 mb-5">
            @if(Auth::user())
            <div class="col-sm-1 col-md-1 col-lg-1 text-end mt-5">
                <button class="btn btn-outline-light h-50 w-50" onclick="window.location='{{ route("logout") }}'"><img src="../image/door-check-out-icon.svg" class="w-75 h-75"></button>
                <br>
                <span class="fs-4">Log Out</span>
            </div>
            @else
            <div class="col-sm-1 col-md-1 col-lg-1 text-end mt-5">
                <button class="btn btn-outline-light h-50 w-50" onclick="window.location='{{ route("bukalogin") }}'"><img src="../image/door-check-in-icon.svg" class="w-75 h-75"></button>
                <br>
                <span class="fs-4">Log In</span>
            </div>
            @endif

            <div class="col-sm-1 col-md-1 col-lg-1 text-start mt-5">
                <button class="btn btn-outline-light h-50 w-50" onclick="window.location='{{ route("bukaregister") }}'"><img src="../image/user-plus-icon.svg" class="w-75 h-75"></button>
                <br>
                <span class="fs-4">Register</span>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 text-start">
                <p class="title text-center font-weight-bold text-white">Welcome to AutoRent!</p>
            </div>
            @if(Auth::user())
            <div class="col-sm-2 col-md-2 col-lg-2 text-center mt-5">
                <button class="btn btn-outline-light h-50 w-25" onclick="window.location='{{ route("bukaprofile",Auth::User()) }}'"><img src="../image/business-card-icon.svg" class="w-100 h-100"></button>
                <br>
                <span class="fs-4">Profile</span>
            </div>
            @else
            <div class="col-sm-2 col-md-2 col-lg-2 text-center mt-5">
            </div>
            @endif
        </div>
        <br>
        <div class="row justify-content-center h-75 mt-5">
            <div class="col-sm-12 col-md-6 col-lg-6 text-end px-5">
                <button class="btn btn-outline-light h-75 w-50" onclick="window.location='{{ route("registerCar") }}'"><img src="../image/access-hand-key-icon.svg" class="w-75 h-75"><br><span class="fs-1">Rent Your Car!</span></button>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 text-start px-5">
                <button class="btn btn-outline-light h-75 w-50" onclick="window.location='{{ route("carlist") }}'"><img src="../image/rent-a-car-icon.svg" class="w-75 h-75"><br><span class="fs-1">Rent some stranger Car!</span></button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>