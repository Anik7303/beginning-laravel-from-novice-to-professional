@extends('layouts.main')

@section('title', 'Contacts App | Settings | Edit Profile')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Settings
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('settings.profile.edit') }}"
                                class="list-group-item list-group-item-action active">{{ __('Profile') }}</span></a>
                            <a href="#" class="list-group-item list-group-item-action">{{ __('Account') }}</span></a>
                            <a href="#"
                                class="list-group-item list-group-item-action">{{ __('Import & Export') }}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    @include('layouts._message')
                    <form action="{{ route('settings.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>Edit Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="first_name">{{ __('First Name') }}</label>
                                            <input type="text" name="first_name" id="first_name"
                                                value="{{ old('first_name', $user['first_name']) }}"
                                                class="form-control @error('first_name') is-invalid @enderror">
                                            @error('first_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">{{ __('Last Name') }}</label>
                                            <input type="text" name="last_name" id="last_name"
                                                value="{{ old('last_name', $user['last_name']) }}"
                                                class="form-control @error('last_name') is-invalid @enderror">
                                            @error('last_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="company">{{ __('Company') }}</label>
                                            <input type="text" name="company" id="company"
                                                value="{{ old('company', $user['company']) }}"
                                                class="form-control @error('company') is-invalid @enderror">
                                            @error('company')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bio">{{ __('Bio') }}</label>
                                            <textarea name="bio" id="bio" rows="3" class="form-control @error('bio') is-invalid @enderror">{{ old('bio', $user['bio']) }}</textarea>
                                            @error('bio')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="offset-md-1 col-md-3">
                                        <div class="form-group">
                                            <label for="bio">{{ __('Profile picture') }}</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new img-thumbnail"
                                                    style="width: 150px; height: 150px;">
                                                    <img src="{{ $user->profileImageUrl() }}"
                                                        alt="Profile picture of {{ $user->fullName() }}">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                                    style="max-width: 150px; max-height: 150px;"></div>
                                                <div class="mt-2">
                                                    <span class="btn btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">{{ __('Select image') }}</span>
                                                        <span class="fileinput-exists">{{ __('Change') }}</span>
                                                        <input type="file" name="profile_picture" accept="image/*">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                        data-dismiss="fileinput">{{ __('Remove') }}</a>
                                                </div>
                                            </div>
                                            @error('profile_picture')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <button type="submit"
                                                    class="btn btn-success">{{ __('Update Profile') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/jasny-bootstrap.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
@endsection
