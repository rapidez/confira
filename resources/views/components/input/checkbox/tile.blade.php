@props(['name' => '', 'id' => uniqid('checkbox-')])
<label for="{{ $id }}" {{ $attributes->only('class')->class('relative flex cursor-pointer select-none gap-x-3 text-sm ring ring-muted') }}>
    <x-rapidez::input.checkbox.base
        class="size-6 text-primary peer"
        id="{{ $id }}"
        name="{{ $name }}"
        {{ $attributes->except('class') }}
    />
    @isset($slot)
        <span {{ $slot->attributes->class('mt-0.5') ?? '' }}>{{ $slot }}</span>
    @endisset
    <div class="absolute -inset-y-px -left-px w-1 rounded-l bg-primary opacity-0 transition-all peer-checked:opacity-100"></div>
</label>
