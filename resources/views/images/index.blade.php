<x-layout title="Discover free images">
    <div class="container-fluid mt-4">
        @if ($message = session('message'))
            <x-alert type="success" dismissible>
                {{ $message }}
            </x-alert>
        @endif
        <div class="row" data-masonry='{"percentPosition": true }'>
            @foreach ($images as $image)
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <a href="{{ $image->permalink() }}">
                            <img src="{{ $image->fileUrl() }}" alt="{{ $image['title'] }}" class="card-img-top" />
                        </a>
                        <div class="photo-buttons">
                            <a href="{{ $image->route('edit') }}"
                                class="btn btn-sm btn-info me-2">{{ __('Edit') }}</a>
                            <x-form id="delete-form" action="{{ $image->route('destroy') }}" method="DELETE">
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?');">{{ __('Delete') }}</button>
                            </x-form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $images->links() }}
    </div>
</x-layout>
