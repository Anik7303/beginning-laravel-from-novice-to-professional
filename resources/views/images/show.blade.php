@extends('layouts.main')

@section('title', 'Larapics')

@section('content')
    <h1>{{ $image['title'] }}</h1>
    <div>
        <img src="{{ $image->fileUrl() }}" alt="{{ $image['title'] }}">
    </div>
@endsection
