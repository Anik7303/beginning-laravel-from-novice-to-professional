<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0j">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    @yield('stylesheets')
    <title>@yield('title')</title>
</head>

<body>
    <main>
        @yield('content')
    </main>

    @yield('scripts')
</body>

</html>
