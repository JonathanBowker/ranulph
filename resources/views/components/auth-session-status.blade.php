@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'auth-status font-medium text-sm']) }}>
        {{ $status }}
    </div>
@endif
