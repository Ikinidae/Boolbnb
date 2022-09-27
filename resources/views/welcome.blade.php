<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoolBnb</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/front.js') }}" defer></script>

        <!-- link css tomtom -->
        <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>

        <!-- script tomtom -->
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js" defer></script>

        <!-- script fuzzy search and services -->
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js" defer></script>

        <!-- Styles -->
        <style>
            .bg{
                background-image: url(images/backgrounduck.png);
                /* min-height: 100vh; */
                min-height: calc(100vh - 8vh);
                background-repeat: no-repeat;
                background-size: cover;
                /* background-attachment:fixed; */
                background-position: center center
            }
            main{
                display:flex;
                min-height: calc(100vh - 8vh );
                flex-direction:column;
            }
        </style>

    </head>
    <body>
        @include('layouts.nav-index')
        <main class="bg" style="padding: 70px 0">
            <div  id="papera"></div>
        </main>

        @include('layouts.footer')
    </body>
</html>
