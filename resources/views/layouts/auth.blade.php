<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite('resources/scss/app.scss')
</head>

<body class="@yield('body-class') bg-body-secondary">
    @yield('content')
    @vite('resources/js/app.js')
</body>

</html>