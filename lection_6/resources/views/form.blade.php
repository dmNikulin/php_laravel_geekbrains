<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Form</title>
</head>

<body>
    <div class="container">
        <form name="book-form" method="post" action="{{ Route('post-form') }}">
            @csrf

            <div>
                <div class="form-section">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
                <div class="form-section">
                    <label for="author">Author</label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>
                <div class="form-section">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        <option value="Fantasy">Fantasy</option>
                        <option value="Sci-fi">Sci-fi</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Drama">Drama</option>
                    </select>
                </div>
            </div>
            <button type="submit">Add book</button>
        </form>
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    </div>
    {{-- <div class="container">
        <div class="card">
            <h2>User registration</h2>
            <div class="card__form">
                <form name="registration-form" id="registration-form" method="POST" action="{{ url('form') }}">
                    @csrf

                    <div>
                        <label for="username">Name</label>
                        <input type="text" id="username" name="username" required>
                        <label for="secondname">Second Name</label>
                        <input type="text" id="secondname" name="secondname" required>
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" required>
                        <textarea name="textarea" id="textarea" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div> --}}
</body>

</html>