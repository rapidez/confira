<label {{ $attributes->only('class')->class('relative flex w-full cursor-pointer items-center justify-start gap-x-3 rounded-xl px-5 sm:px-7 py-7 text-ct-neutral') }}>
    <span class="flex aspect-square h-6 w-6 items-center justify-center rounded-full border bg-white">
        <input type="radio" {{ $attributes->except('class') }} class="peer h-3 w-3 border-none text-ct-primary transition bg-none focus:ring-0 focus:ring-offset-0" />
        <span class="overflow-hidden rounded-xl -z-10 absolute inset-0 bg-ct-inactive-100 peer-checked:border-y peer-checked:border-r peer-checked:bg-white peer-checked:shadow before:absolute before:-inset-y-px before:w-1 before:rounded-l before:bg-ct-primary before:opacity-0 before:transition-all before:peer-checked:opacity-100"></span>
    </span>
    @isset($slot)
        <span class="flex w-full flex-wrap items-center justify-between gap-x-3">
            {{ $slot }}
        </span>
    @endisset
</label>
