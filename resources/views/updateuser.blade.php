<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update!</title>
</head>
<body>
    <form action="{{ route('updateuser',$user->id) }}" method="POST">
        @csrf
        @method('patch')
        <label for="name">Name</label>
        <input type="text" name="name" value={{ $user['name'] }}>
        <label for="email">Email</label>
        <input type="text" name="email" value={{ $user['email'] }}>
        <button type="submit">Update!</button>
    </form>
</body>
</html>