<label {{ $attributes->only('class')->class('relative flex w-full cursor-pointer items-center justify-start gap-x-3 rounded-md px-5 md:px-7 py-4 ring border') }}>
    <x-rapidez::input.radio.base class="size-6 text-primary peer" {{ $attributes->except('class') }} />
    <div class="absolute -inset-y-px -left-px w-1 rounded-l bg-primary opacity-0 transition-all peer-checked:opacity-100"></div>
    @isset($slot)
        <span class="flex w-full items-center justify-between gap-x-3">
            {{ $slot }}
        </span>
    @endisset
</label>
