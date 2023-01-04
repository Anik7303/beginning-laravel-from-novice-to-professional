<x-layout title="Show image">
    <h1>{{ $image['title'] }}</h1>
    <div>
        <img src="{{ $image->fileUrl() }}" alt="{{ $image['title'] }}">
    </div>
</x-layout>
