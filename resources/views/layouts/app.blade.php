<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
<div id="app">
    @include('components.header')
    @include('components.content')
    <script src="{{ mix('js/app.js') }}" defer></script>
    @yield('script')
</div>
</body>
</html>
