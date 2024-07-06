<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="tailwind,tailwindcss,tailwind css,css,starter template,free template,admin templates, admin template, admin dashboard, free tailwind templates, tailwind example">
        <title>{{ config('app.name') }}</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/all.css') }}">
    {{-- <link rel="stylesheet" href="./dist/all.css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
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
                <div class="flex flex-1 mx-auto">&copy; My Design</div>
                <div class="flex flex-1 mx-auto">Distributed by: <a href="https://themewagon.com/"
                        target=" _blank">Themewagon</a></div>
            </footer>
            <!--/footer-->

        </div>

    </div>
    <script src="{{asset('admin-assets/js/main.js')}}"></script>
</body>

</html>
