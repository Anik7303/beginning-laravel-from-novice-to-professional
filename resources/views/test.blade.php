<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Blade Components</title>
</head>

<body>
    {{-- <x-ui.button /> --}}
    {{-- <x-icon src="logo.svg" /> --}}
    {{-- @php
        // $title = json_encode(['red', 'yellow']);
        $icon = 'logo.svg';
    @endphp --}}
    {{-- <x-icon :src="$icon" /> --}}
    {{-- <x-alert type="warning" /> --}}

    <x-alert type="danger" id="my-alert" class="mt-4" role='flash' />
    <x-alert type="success" dismissible class="my-4" />

</body>

</html>
