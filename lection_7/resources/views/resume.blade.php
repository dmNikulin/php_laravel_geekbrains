<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User</title>
</head>

<body>
    <h3> Name = {{$name}}</h3>
    <h3> Surname = {{$surname}}</h3>
    <h3> Email = {{$email}}</h3>
</body>

</html>