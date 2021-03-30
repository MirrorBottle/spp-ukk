

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
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
        {{-- Custom Script --}}
        <link rel="stylesheet" href="{{asset('argon')}}/css/custom.css">
    </head>
    <body class="bg-default">
        
        <div class="main-content">
            @include('layouts.navbars.navs.guest')
            @include('layouts.headers.guest', ['text' => 'About'])
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-body px-lg-5 py-lg-5">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore non eligendi necessitatibus, dolorem, saepe commodi molestias blanditiis cum, veritatis dolores beatae labore cupiditate voluptatum nam eveniet suscipit quidem libero et.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.guest')

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        {{-- Datatable --}}
        <script src="{{asset('argon')}}/vendor/datatables/datatables.min.js"></script>
        {{-- Custom Script --}}
        <script src="{{ asset('argon') }}/js/custom.js"></script>
    </body>
</html>
