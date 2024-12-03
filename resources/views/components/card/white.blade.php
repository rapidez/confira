@props(['check' => false])
<div {{ $attributes->class('relative flex-1 rounded-md border bg-white px-5 py-6 overflow-hidden ring ring-ct-inactive-100') }}>
    @if ($check)
        <template v-if="{{ $check }}">
            <x-heroicon-o-check class="absolute right-7 top-7 w-5 text-ct-accent" stroke-width="2.5" />
            <div class="w-1 bg-ct-accent absolute left-0 inset-y-0"></div>
        </template>
    @endif
    {{ $slot }}
</div>
