<label {{ $attributes->only('class')->class('relative flex w-full overflow-hidden cursor-pointer items-center shadow-sm justify-start gap-x-3 rounded-md border bg-white px-5 sm:px-7 py-7 text-ct-neutral') }}>
    <span class="flex aspect-square h-6 w-6 items-center justify-center rounded-full border bg-ct-white">
        <input type="radio" {{ $attributes->except('class') }} class="peer h-3 w-3 border-none text-ct-primary transition bg-none focus:ring-0 focus:ring-offset-0" />
        <span class="absolute -inset-y-px -left-px w-1 rounded-l bg-ct-primary opacity-0 transition-all peer-checked:opacity-100"></span>
    </span>
    @isset($slot)
        <span class="flex w-full flex-wrap items-center justify-between gap-x-3">
            {{ $slot }}
        </span>
    @endisset
</label>
