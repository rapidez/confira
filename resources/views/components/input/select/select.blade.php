@props(['label' => false])
<label {{ $attributes->only(['v-if', 'v-else', 'v-else-if', 'class'])->class('relative block') }}>
    <select {{ $attributes
        ->except(['v-if', 'v-else', 'v-else-if', 'class'])
        ->class('w-full cursor-pointer border border-default focus:border-emphasis bg-white pt-7 pb-2.5 px-5 text-sm font-medium rounded-m bg-white outline-none transition-all disabled:bg-emphasis !ring !ring-background focus:!ring-background-emphasis rounded-md') }}>
        @isset($slot)
            {{ $slot }}
        @endisset
    </select>
    @if ($label)
        <x-rapidez::label :required="$attributes->get('required')" class="pointer-events-none transition-all absolute left-5 top-1/2 text-xs -translate-y-5">
            @lang($label)
        </x-rapidez::label>
    @endif
</label>