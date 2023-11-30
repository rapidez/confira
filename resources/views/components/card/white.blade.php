@props(['check' => false])
<div {{ $attributes->class('relative flex-1 rounded-xl border bg-white px-5 py-6 overflow-hidden shadow-sm') }}>
    @if ($check)
        <template v-if="{{ $check }}">
            <x-heroicon-s-check class="absolute right-7 top-7 w-5 text-ct-accent" />
        </template>
    @endif
    {{ $slot }}
</div>
