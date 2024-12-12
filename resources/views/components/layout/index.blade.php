@slots(['header', 'sidebar'])

<div {{ $attributes->class('text-ct-neutral flex flex-wrap gap-x-20 text-sm max-lg:flex-col xl:gap-x-28') }}>
    <div class="flex flex-wrap max-xl:flex-col flex-1">
        {{ $header }}
        <div class="flex-1">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar :attributes="$sidebar->attributes">
        {{ $sidebar }}
    </x-rapidez-ct::layout.sidebar>
</div>
