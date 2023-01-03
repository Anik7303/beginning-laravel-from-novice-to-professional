@extends('layouts.main')

@section('title', 'Larapics | Upload Image')

@section('content')
    <h1>Upload new image</h1>
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="file">Image</label>
            <input type="file" name="file" id="file" accept="image/*">
            @error('file')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Upload</button>
    </form>

@endsection
