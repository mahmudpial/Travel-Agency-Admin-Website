<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Travel Agency Admin') }}</title>

        @vite(['resources/js/app.js', "resources/sass/app.scss"])
        @inertiaHead
    </head>
    <body class="bg-light">
        @inertia
    </body>
</html>
