<!DOCTYPE html>
<html class="h-100 m-0 p-0" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AutoRent!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>

</head>
<body>
    <div>
        <div>
            @if(Auth::user())
            <div>
                <button onclick="window.location='{{ route("logout") }}'"><img src="../image/door-check-out-icon.svg"></button>
                <br>
                <span>Log Out</span>
            </div>
            @else
            <div>
                <button onclick="window.location='{{ route("bukalogin") }}'"><img src="../image/door-check-in-icon.svg"></button>
                <br>
                <span>Log In</span>
            </div>
            @endif

            <div>
                <button onclick="window.location='{{ route("bukaregister") }}'"><img src="../image/user-plus-icon.svg"></button>
                <br>
                <span>Register</span>
            </div>
            <div>
                <p>Welcome to AutoRent!</p>
            </div>
            @if(Auth::user())
            <div>
                <button onclick="window.location='{{ route("bukaprofile",Auth::User()) }}'"><img src="../image/business-card-icon.svg"></button>
                <br>
                <span>Profile</span>
            </div>
            @else
            <div>
            </div>
            @endif
        </div>
        <br>
        <div>
            <div>
                <button onclick="window.location='{{ route("registerCar") }}'"><img src="../image/access-hand-key-icon.svg"><br><span>Rent Your Car!</span></button>
            </div>
            <div>
                <button onclick="window.location='{{ route("carlist") }}'"><img src="../image/rent-a-car-icon.svg"><br><span>Rent some stranger Car!</span></button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>