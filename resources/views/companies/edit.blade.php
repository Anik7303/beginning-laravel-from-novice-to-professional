@extends('layouts.main')

@section('title', 'Contacts App | Edit company details')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>{{ __('Edit Company Details') }}</strong>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('companies.update', $company->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('companies._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
