@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        @foreach ($errors->all() as $error)
            <p class="text-left mt-2 text-danger small d-inline">{{ $error }}</p>
        @endforeach
    </div>
@endif
