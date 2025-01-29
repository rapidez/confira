@slots(['label'])

<label {{ $attributes->twMerge('relative block') }}>
    {{ $slot }}
    <span {{ $label->attributes->twMerge("pointer-events-none mt-0.5 transition-all absolute left-5 top-7 text-xs -translate-y-5 peer-focus:text-xs peer-focus:-translate-y-5 peer-placeholder-shown:text-sm peer-placeholder-shown:-translate-y-1/2 peer-[&:user-invalid]:text-red-500 group-has-[:required]:after:content-['*']") }}>
        {{ $label }}
    </span>
</label>