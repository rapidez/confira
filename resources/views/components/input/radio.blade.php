<label {{ $attributes->only('class')->class('relative flex w-full cursor-pointer items-center justify-start gap-x-3 rounded-md px-5 md:px-7 py-4 ring !ring-background') }}>
    <span class="flex aspect-square h-6 w-6 items-center justify-center rounded-full border bg-white">
        <input type="radio" {{ $attributes->except('class') }} class="peer h-3 w-3 border-none text-primary transition checked:bg-none focus:ring-0 focus:ring-offset-0" />
        <span class="overflow-hidden rounded-md -z-10 absolute inset-0 bg-ct-inactive-100 peer-checked:border-y peer-checked:border-r peer-checked:bg-white before:absolute before:-inset-y-px before:w-1 before:rounded-l before:bg-primary before:opacity-0 before:transition-all before:peer-checked:opacity-100"></span>
    </span>
    @isset($slot)
        <span class="flex w-full items-center justify-between gap-x-3">
            {{ $slot }}
        </span>
    @endisset
</label>
