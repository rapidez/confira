@props(['name' => '', 'id' => uniqid('checkbox-')])
<label for="{{ $id }}" {{ $attributes->only('class')->class('text-muted relative flex items-center cursor-pointer select-none flex-wrap gap-x-3 text-sm [&>span]:flex-1') }}>
    <input
        class="peer h-6 w-6 cursor-pointer rounded-md border-default transition focus:outline-none focus:ring-0 focus:ring-offset-0 text"
        id="{{ $id }}"
        name="{{ $name }}"
        type="checkbox"
        {{ $attributes->except('class') }}
    />
    @isset($slot)
        <span {{ $slot->attributes ?? '' }}>{{ $slot }}</span>
    @endisset
</label>
