{{-- auth app loyouts  --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/styles.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
        integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <style>
        .login {
            background: url('admin-assets/dist/images/login-new.jpeg')
        }
    </style>
    <title>@yield('app-name')</title>
</head>

<body class="h-screen font-sans login bg-cover">
    @yield('content')
</body>

</html>
