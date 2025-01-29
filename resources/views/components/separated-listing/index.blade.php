@props(['tag' => 'ul'])
<x-rapidez::tag is="{{ $tag }}" {{ $attributes->class('flex flex-col text-sm *:py-1 first:*:pt-0 last:*:py-3 *:flex *:flex-wrap *:justify-between') }}>
    {{ $slot }}
</x-rapidez::tag>
