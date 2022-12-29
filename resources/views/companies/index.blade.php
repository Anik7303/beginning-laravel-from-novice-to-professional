@extends('layouts.main')

@section('title', 'Contacts App | All companies')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">{{ __('All Companies') }}</h2>
                            <div class="ml-auto">
                                <a href="{{ route('companies.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>{{ __(' Add New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('companies._filter')
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('#') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Website') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($message = session('message'))
                                    <div class="alert alert-success">{{ $message }}</div>
                                @endif
                                @if ($companies->count() > 0)
                                    @foreach ($companies as $index => $company)
                                        <tr>
                                            <th scope="row">{{ $index + $companies->firstItem() }}</th>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->website }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td width="150">
                                                <a href="{{ route('companies.show', $company->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('companies.edit', $company->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('companies.destroy', $company->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-danger btn-delete"
                                                    title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                @include('_delete_form')
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- pagination -->
                        {{ $companies->appends(request()->only('search'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
