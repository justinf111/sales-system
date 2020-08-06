<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{url('/css/app.css')}}">
        <title>Laravel</title>

    </head>
    <body>
        <div id="app">
            <navbar></navbar>
            <div class="container mx-auto">
                @yield('content')
            </div>
        </div>
    </body>
    <script src="{{ url('/js/app.js') }}"></script>
</html>
