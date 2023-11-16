@props(['tag' => 'ul'])
<x-tag is="{{ $tag }}" {{ $attributes->class('flex flex-col text-sm text-ct-inactive [&>*]:py-1 [&>*:first-child]:pt-0 [&>*:last-child]:py-3.5 [&>*]:flex [&>*]:flex-wrap [&>*]:justify-between') }}>
    {{ $slot }}
</x-tag>
