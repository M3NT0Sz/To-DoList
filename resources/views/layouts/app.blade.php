<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite('resources/scss/app.scss')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    @include('parts.sidebar')
    @yield('js')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>