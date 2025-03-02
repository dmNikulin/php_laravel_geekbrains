<html>

<head>
    <title>User registration</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
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
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>