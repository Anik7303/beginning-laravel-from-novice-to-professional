<div {{ $attributes->merge(['class' => $getClasses, 'role' => $attributes->prepends('alert')]) }}>
    @isset($title)
        <h4 class="alert-heading">{{ $title }}</h4>
    @endisset
    {{ $slot }}
    @if ($dismissible)
        <button type="button" class="btn btn-close" aria-bs-dismiss="alert" aria-label="close"></button>
    @endif
</div>
