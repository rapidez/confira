@props(['required' => false])
<span {{ $attributes->class('text-muted text-sm') }}>
    {{ $slot }}
    @if ($required)
        <span>*</span>
    @endif
</span>
