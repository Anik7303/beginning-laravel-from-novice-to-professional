@extends('layouts.main')

@section('title', 'Larapics')

@section('content')
    <h1>All Images</h1>
    <a href="{{ route('images.create') }}">Upload Image</a>
    <div>
        @if ($message = session('message'))
            {{ $message }}
        @endif
    </div>
    @foreach ($images as $image)
        <div>
            <a href="{{ $image->parmalink() }}">
                <img src="{{ $image->fileUrl() }}" alt="{{ $image['title'] }}" width="300" />
            </a>
            <div>
                <a href="{{ $image->route('edit') }}">Edit</a>
                <a href="#"
                    onclick="event.preventDefault();if(confirm('Are you sure?')) document.getElementById('delete-form').submit();">Delete</a>
                <form id="delete-form" action="{{ $image->route('destroy') }}" method="POST" style="display:none">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    @endforeach
@endsection
