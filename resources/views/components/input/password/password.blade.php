<div>
    <toggler v-slot="{ isOpen, toggle }">
        <div class="relative">
            <x-rapidez-ct::label.animated>
                <x-slot:label>
                    @lang('Password')
                </x-slot:label>
                <x-rapidez-ct::input.animated
                    type="password"
                    v-bind:type="isOpen ? 'text' : 'password'"
                    placeholder
                    {{ $attributes }}
                />
            </x-rapidez-ct::label.animated>

            @if (!$attributes['disabled'] ?? false)
                <div v-on:click="toggle" class="absolute right-5 top-1/2 -translate-y-1/2 cursor-pointer">
                    <x-heroicon-o-eye-slash v-if="isOpen" class="h-5"/>
                    <x-heroicon-o-eye v-else="" class="h-5" v-cloak/>
                </div>
            @endif
        </div>
    </toggler>
</div>