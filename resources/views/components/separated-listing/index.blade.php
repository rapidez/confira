@props(['tag' => 'ul'])
<x-tag is="{{ $tag }}" {{ $attributes->class('flex flex-col text-sm text-ct-inactive !mt-2.5 [&>*]:py-1 [&>*>dd]:text-ct-neutral [&>*:first-child]:pt-0 [&>*:last-child]:pt-2.5 [&>*]:flex [&>*]:flex-wrap [&>*]:justify-between') }}>
    {{ $slot }}
</x-tag>
