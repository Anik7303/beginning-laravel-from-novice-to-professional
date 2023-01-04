<x-layout title="Upload new image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Upload your photo</div>
                    <div class="card-body">
                        <x-form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label" for="file">{{ __('Photo') }}</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file"
                                    id="file" name="file" accept="image/jpg,png">
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @else
                                    <div class="form-text">
                                        You can only upload your photo in following types: jpg & png
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Photo Title') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="tags">{{ __('Photo Tags') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="tags" name="tags" value="{{ old('tags') }}">
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                                <a href="{{ route('images.index') }}"
                                    class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
                            </div>
                        </x-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
