@props(['customTitle' => null])

<x-rapidez-ct::card.white class="border-0 shadow-none p-0 ring-0" {{ $attributes->only('v-if') }}>
    <x-rapidez-ct::address {{ $attributes }} :$customTitle>
        {{ $slot }}
        <x-slot:empty>
            {{ $empty ?? '' }}
        </x-slot>
    </x-rapidez-ct::address>
</x-rapidez-ct::card.white>
