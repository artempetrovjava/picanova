<html>
    <head>
        <title>Pizzashop</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>

    <body>
        <div id="app" class="container">
            @yield('content')
        </div>
        
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>