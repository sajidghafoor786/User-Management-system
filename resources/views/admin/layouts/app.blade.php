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
        .custom {
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
            <div class="flex-grow">
                <!-- Your content here -->
            {{-- <footer class="bg-gray-900 text-white py-10 mt-auto">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-wrap justify-between">
                        <!-- Company Info -->
                        <div class="w-full sm:w-1/2 lg:w-1/4 mb-6 sm:mb-0">
                            <h4 class="text-lg font-semibold mb-4">SkyNetSolutionZ</h4>
                            <p class="text-sm">Skynet Solutionz with a motto “Together we create amazing solution for your business!” is a high-end custom software development company working in different IT fields that enables its clients to achieve high‐impact business results. We offer full cycle custom software development services, from product idea, mobile application development to outsourcing support and enhancement..</p>
                        </div>

                        <!-- Navigation Links -->
                        <div class="w-full sm:w-1/2 lg:w-1/4 mb-6 sm:mb-0">
                            <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                            <ul>
                                <li class="mb-2"><a href="#" class="text-sm hover:text-gray-400">Home</a></li>
                                <li class="mb-2"><a href="#" class="text-sm hover:text-gray-400">About Us</a>
                                </li>
                                <li class="mb-2"><a href="#" class="text-sm hover:text-gray-400">Services</a>
                                </li>
                                <li class="mb-2"><a href="#" class="text-sm hover:text-gray-400">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Contact Info -->
                        <div class="w-full sm:w-1/2 lg:w-1/4 mb-6 sm:mb-0">
                            <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                            <p class="text-sm mb-2">123 Software St, Suite 456</p>
                            <p class="text-sm mb-2">City, State, 12345</p>
                            <p class="text-sm mb-2">Email: info@skynetsolutionz.com</p>
                            <p class="text-sm">Phone: (123) 456-7890</p>
                        </div>
                    </div>
                </div>

            </footer> --}}
            </div>

            <!--/footer-->

        </div>

    </div>
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
    <!-- jQuery (you can use a CDN or your local file) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
