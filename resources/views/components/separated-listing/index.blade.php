@props(['tag' => 'ul'])
<x-rapidez::tag is="{{ $tag }}" {{ $attributes->class('flex flex-col text-base *:py-1 first:*:pt-0 last:*:py-3 last:*:border-t last:*:border-dashed last:*:mt-2.5 *:flex *:flex-wrap *:justify-between') }}>
    {{ $slot }}
</x-rapidez::tag>
