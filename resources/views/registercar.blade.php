<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Your Car!</title>
</head>
<body>
    <form action="{{ route('registerCar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="model">Model</label>
        <input type="text" name="model">
        <label for="user_id">Owner</label>
        <input type="text" name="" value="{{ $username }}" readonly disabled>
        <input type="text" name="user_id" value="{{ $userid }}" hidden>
        <label for="color">Color</label>
        <input type="text" name="color">
        <label for="price">Price per day</label>
        <input type="number" name="price">
        <label for="Imagelink">Image</label>
        <input type="file" name="Imagelink">
        </div>
        <div class="row">
        <button type="submit">Register!</button>
    </form>
</body>
</html>