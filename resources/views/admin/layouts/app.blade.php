<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
        <title>{{ config('app.name') }} </title>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <style>
        .custom{
            padding-bottom: 0px !important;
        }
    </style>
</head>

<body>
    <!--Container -->
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            @include('admin.partials.header')
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->

                @include('admin.partials.sidebar')

                <!--/Sidebar-->
                <!--Main-->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                    @yield('content')

                </main>
                <!--/Main-->
            </div>
            <!--Footer-->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="container mx-auto">
                    <p class="text-center text-white pt-3 font-bold text-sm">© 2024 User-Management-System, all rights reserved</p>
                </div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="{{asset('admin-assets/js/main.js')}}"></script>
        <!-- jQuery (you can use a CDN or your local file) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
