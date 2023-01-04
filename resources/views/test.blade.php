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
    <div class="container">

        {{-- <x-ui.button /> --}}
        {{-- <x-icon src="logo.svg" /> --}}
        {{-- @php
            // $title = json_encode(['red', 'yellow']);
            $icon = 'logo.svg';
            @endphp --}}
        {{-- <x-icon :src="$icon" /> --}}
        {{-- <x-alert type="warning" /> --}}

        {{-- <x-alert type="danger" id="my-alert" class="mt-4" role='flash' /> --}}
        {{-- <x-alert type="success" dismissible class="my-4" /> --}}
        {{-- <x-alert type="success" dismissible>
            <h4 class="alert-heading">Success</h4>
            <p class="mb-0">Data has been set. <a href="#" class="alert-link">details</a></p>
        </x-alert> --}}
        {{-- <x-alert type="success" dismissible>
            <!-- <x-slot name="title"> -->
            <x-slot:title>
                Success
                </x-slot>
                <p class="mb-0">Data has been set. <a href="#" class="alert-link">details</a></p>
        </x-alert> --}}
        {{-- <x-alert type="success" dismissible>
            <x-slot name="title">
                Success
            </x-slot>
            <p class="mb-0">Data has been set. <a href="#" class="alert-link">details</a></p>
        </x-alert> --}}
        {{-- <x-alert type="success" dismissible> --}}
        {{-- <x-alert type="warning" class="mt-4"> --}}
        <x-alert type="warning" dismissible class="mt-4">
            {{-- {{ $component->icon(asset('icons/heart.svg')) }} --}}
            {{ $component->icon() }}
            <p class="mb-0">Data has been removed. {{ $component->link('Undo') }}</p>
        </x-alert>
    </div>
</body>

</html>
