@props(['label' => false])
<label {{ $attributes->only(['v-if', 'v-else', 'v-else-if', 'v-cloak', 'class'])->merge(['class' => 'block relative group']) }}>
    <input {{ $attributes->merge([
        'id' => $attributes->get('name'),
        'placeholder' => $attributes->get('placeholder'),
        'type' => 'text',
        'dusk' => $attributes->get('v-bind:dusk') ? null : $attributes->get('name'),
        'class' => 'w-full rounded-md peer border border-default !bg-white pt-7 pb-2.5 px-5 text-sm outline-none !ring !ring-background transition-all placeholder-transparent focus:border-emphasis focus:!ring-background-emphasis disabled:bg-emphasis disabled:text-muted [&:input:-internal-autofill-selected]:bg-white font-medium disabled:pr-12 [&:user-invalid]:border-red-300 appearance-none [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none',
    ]) }}>
    @if ($label)
        <x-rapidez::label :required="$attributes->get('required')" class="pointer-events-none mt-0.5 transition-all absolute left-5 top-7 text-xs -translate-y-5 peer-focus:text-xs peer-focus:-translate-y-5 peer-placeholder-shown:text-sm peer-placeholder-shown:-translate-y-1/2 peer-[&:user-invalid]:text-red-500 group-has-[:required]:after:content-['*']">
            @lang($label)
        </x-rapidez::label>
    @endif
    {{ $slot }}
</label>
