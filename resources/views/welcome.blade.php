<!DOCTYPE html>
<html class="h-100 m-0 p-0" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AutoRent!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">
  </head>
  <style>
    .butt{
        background-color:rgba(66, 66, 66, 0.275);
        color:white;
    }
    .butt:hover{
        background-color:white;
        color:black;
    }
  </style>
<body class="h-100 m-0 p-0">
    <div class="wallpaper" style="background-image: 
    linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.6) 40%, rgba(0,0,0,0.15) 60%, rgba(0,0,0,0) 100%),
    url('../image/wallpaper4.jpg'); background-size: cover; background-position: center; height: 100vh; width: 100vw; position: absolute; top: 0; left: 0; font-family: 'Lexend Deca', sans-serif; color:white !important;">

        <div class="header" style="display:grid;grid-auto-flow: column;grid-template-columns:1fr 1fr 8fr 2fr;align-items:center;">
            <a href='{{ route("bukaregister") }}' style="color:white !important;text-decoration:none !important;cursor:pointer;justify-self:end">Register</a>
            @if(Auth::user())
            <a href='{{ route("logout") }}' style="color:white !important;text-decoration:none !important;cursor:pointer;justify-self:end">Logout</a>
            @else
            <a href='{{ route("bukalogin") }}' style="color:white !important;text-decoration:none !important;cursor:pointer;justify-self:end">Login</a>
            @endif
            <p class="title text-center" style="font-size : clamp(3rem, 7.6vw, 8rem);font-weight:700;text-shadow: 12px 4px 4px black;">AUTO RENT</p>
            @if(Auth::user())
            <a href='{{ route("bukaprofile",Auth::User()) }}' style="color:white !important;text-decoration:none !important;cursor:pointer;justify-self:start">Profile</a>
            @endif
        </div>

        <div style="display:flex;justify-content:space-evenly;font-size : clamp(2rem, 4vw, 4rem);margin-top:clamp(6rem,15vw,15rem);">
            <button class="butt" onclick="window.location='{{ route("registerCar") }}'">
                RENT YOUR CAR
            </button>
            <button class="butt" onclick="window.location='{{ route("carlist") }}'">
               RENT SOMEONE CAR
            </button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>