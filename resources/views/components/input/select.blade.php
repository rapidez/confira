@props(['label' => false])
<label {{ $attributes->only(['v-if', 'v-else', 'v-else-if', 'class'])->class('relative flex flex-col gap-y-1.5 md:gap-y-2 text-sm line-clamp-1 rounded-md ring !ring-ct-inactive-100') }}>
    <select {{ $attributes
        ->except(['v-if', 'v-else', 'v-else-if', 'class'])
        ->class('cursor-pointer border-ct-border bg-white pt-7 pb-2.5 px-5 text-sm font-medium focus:border-ct-border rounded-md border bg-white outline-none transition-all disabled:bg-ct-inactive-100') }}>
        @isset($slot)
            {{ $slot }}
        @endisset
    </select>
    @if ($label)
        <x-rapidez-ct::input.label :required="$attributes->get('required')" class="pointer-events-none transition-all absolute left-5 top-1/2 text-xs -translate-y-5">
            @lang($label)
        </x-rapidez-ct::input.label>
    @endif
</label>
