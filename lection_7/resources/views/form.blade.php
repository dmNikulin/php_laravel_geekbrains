<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User Form</title>
    <style>
        .vision_input_form{
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form name="book-form" method="post" action="{{ Route('adduser') }}">
            @csrf

            <div>
                <div class="form-section">
                    <label for="name">First name:</label>
                    <input type="text" id="name" name="name" class="vision_input_form" required>
                </div>
                <div class="form-section">
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" class="vision_input_form" required>
                </div>
                <div class="form-section">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="vision_input_form" required>
                </div>
            </div>
            <button type="submit">Add user to database</button>
        </form>

       
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    </div>
</body>

</html>