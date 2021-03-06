<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SPP</title>
        <!-- Favicon -->
        <link href="{{ asset('images/favicon.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        {{-- DataTable --}}
        <link rel="stylesheet" href="{{asset('argon')}}/vendor/datatables/datatables.min.css">
        {{-- Datepicker --}}
        <link rel="stylesheet" href="{{asset('argon')}}/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">
        {{-- Sweetalert2 --}}
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.min.css">
        {{-- Select2 --}}
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
        {{-- Custom Script --}}
        <link rel="stylesheet" href="{{asset('argon')}}/css/custom.css">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        
        {{-- Datatable --}}
        <script src="{{asset('argon')}}/vendor/datatables/datatables.min.js"></script>
        {{-- Datepicker --}}
        <script src="{{asset('argon')}}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        {{-- moment --}}
        <script src="{{asset('argon')}}/vendor/moment-with-locales.min.js"></script>
        {{-- File Input --}}
        <script src="{{asset('argon')}}/vendor/bs-custom-file-input.min.js"></script>
        {{-- Sweetalert2 --}}
        <script src="{{ asset('argon') }}/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
        {{-- Select2 --}}
        <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
        {{-- Custom Script --}}
        <script src="{{ asset('argon') }}/js/custom.js"></script>
        @stack('js')
    </body>
</html>