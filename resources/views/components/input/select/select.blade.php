<select {{ $attributes
    ->except(['v-if', 'v-else', 'v-else-if', 'class'])
    ->class('w-full cursor-pointer border border-default focus:border-emphasis bg-white pt-7 pb-2.5 px-5 text-sm font-medium rounded-m bg-white outline-none transition-all disabled:bg-emphasis !ring !ring-background focus:!ring-background-emphasis rounded-md') }}>
    @isset($slot)
        {{ $slot }}
    @endisset
</select>