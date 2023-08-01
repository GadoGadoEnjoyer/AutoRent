<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN</title>
</head>
<body>
    {{-- @foreach ($users as $user)
         <p>Name : {{ $user->name }}</p>
         <p>Email : {{ $user->email }}</p>
         <p>Admin : {{ $user->isAdmin }}</p>
         <br>
         <button><a href={{route('bukaupdateuser',$user->id)}}>Update</a></button>
         <button><a href={{route('deleteuser',$user->id)}}>Delete</a></button>

    @endforeach --}}

    @foreach ($banneduser as $banuser)
         <p>Name : {{ $banuser->name }}</p>
         <p>Email : {{ $banuser->email }}</p>
         <p>Admin : {{ $banuser->isAdmin }}</p>
         <br>
        <form action="{{ route('unbanuser',$banuser->id) }}" method="POST">
            @csrf
            @method('patch')
            <button type="submit">Unban?</button>
    @endforeach
</body>
</html>