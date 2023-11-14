@props(['required' => false])
<span {{ $attributes->class('text-ct-inactive text-sm') }}>
    {{ $slot }}
    @if ($required)
        <span>*</span>
    @endif
</span>
