@slots(['header', 'sidebar'])

<div {{ $attributes->class('text-ct-neutral flex flex-wrap gap-x-20 text-sm max-md:flex-col lg:gap-x-28') }}>
    <div class="flex flex-wrap max-lg:flex-col flex-1">
        {{ $header }}
        <div class="flex-1">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar>
        {{ $sidebar }}
    </x-rapidez-ct::layout.sidebar>
</div>
