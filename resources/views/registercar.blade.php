<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Your Car!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <form action="{{ route('registerCar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
        <label for="model">Model</label>
        <input type="text" name="model">
        </div>
        <div>
        <label for="user_id">Owner</label>
        <input type="text" name="" value="{{ $username }}" readonly disabled>
        <input type="text" name="user_id" value="{{ $userid }}" hidden>
        </div>
        <div>
        <label for="color">Color</label>
        <input type="text" name="color">
        </div>
        <div>
        <label for="price">Price per day</label>
        <input type="number" name="price">
        </div>
        <div>
        <label for="Imagelink">Image</label>
        <input type="file" name="Imagelink">
        </div>
        <br>
        <div>
        <button type="submit">Register!</button>
        </div>
    </form>
</body>
</html>