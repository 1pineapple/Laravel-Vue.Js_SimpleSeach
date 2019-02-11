<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="/css/app.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>

            <div  id="app">
            <example-component/>

            </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
