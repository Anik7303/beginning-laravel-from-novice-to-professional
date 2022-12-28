@extends('layouts.main')

@section('title', 'Contacts App | All contacts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-title">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">{{ __('All Contacts') }}</h2>
                            <div class="ml-auto">
                                <a href="{{ route('contacts.create') }}" class="btn btn-success">
                                    <i class="fa fa-plus-circle"></i>{{ __(' Add New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('contacts._filter')
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('#') }}</th>
                                    <th scope="col">{{ __('First Name') }}</th>
                                    <th scope="col">{{ __('Last Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Company') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($message = session('message'))
                                    <div class="alert alert-success">{{ $message }}</div>
                                @endif
                                @if ($contacts->count() > 0)
                                    @foreach ($contacts as $index => $contact)
                                        <tr>
                                            <th scope="row">{{ $index + $contacts->firstItem() }}</th>
                                            <td>{{ $contact->first_name }}</td>
                                            <td>{{ $contact->last_name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->company->name }}</td>
                                            <td width="150">
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('contacts.destroy', $contact->id) }}"
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
                        {{ $contacts->appends(request()->only('company_id', 'search'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
