@props(['check' => false])
<div {{ $attributes->twMerge('relative flex-1 rounded-md border bg-white px-6 py-5 overflow-hidden ring ring-muted') }}>
    @if ($check)
        <template v-if="{{ $check }}">
            <x-heroicon-o-check class="absolute right-5 top-6 w-5 text-primary" stroke-width="2.5" />
            <div class="w-1 bg-primary absolute left-0 inset-y-0"></div>
        </template>
    @endif
    {{ $slot }}
</div>
