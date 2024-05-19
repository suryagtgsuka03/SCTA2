<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,100;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>

<body class="login-body">
    <div class="login-container">
        <h2>Login Admin</h2>
        <div class="container-2">
            <form action="{{ route('actionlogin') }}" id="registration-form" method="post">
                @csrf
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" required><br><br>

                <button class="btn" type="submit" id="submit-button">Login</button>
                <a class="btn" href="/">Back</a>
            </form>
        </div>
    </div>
</body>

<script>
    feather.replace();
</script>

</html>
