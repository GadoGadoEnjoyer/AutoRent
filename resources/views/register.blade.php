<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name">
            </div>
            <div>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email">
            </div>
            <div>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password">
            </div>
            <div>
            <button type="submit">Register!</button>
            </div>
        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
    </body>
    </html>