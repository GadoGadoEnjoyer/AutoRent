<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login!</title>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="email">Email</label>
        <input type="text" name="email">
        <label for="password">Password</label>
        <input type="password" name="password">
        <button type="submit">Login!</button>
    </form>
</body>
</html>