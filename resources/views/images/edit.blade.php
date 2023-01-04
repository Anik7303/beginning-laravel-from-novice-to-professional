<x-layout title="Update image">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Update image</div>
                    <div class="card-body">
                        <x-form action="{{ $image->route('update') }}" method="PUT">
                            <div class="mb-3">
                                <img src="{{ $image->fileUrl() }}" alt="{{ $image['title'] }}" class="img-fluid">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">{{ __('Photo Title') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" value="{{ old('title', $image['title']) }}">
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
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
