<form v-on:submit.prevent="mutate" class="relative flex gap-3 flex-wrap max-md:flex-col w-full z-10">
    <div class="flex-1" data-testid="masked">
        <x-rapidez-ct::label.animated>
            <x-slot:label>
                @lang('Email')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="email"
                type="email"
                required
                v-model="variables.email"
                placeholder
            />
        </x-rapidez-ct::label.animated>
    </div>
    <x-rapidez::button.secondary
        class="relative whitespace-nowrap"
        type="submit"
        v-bind:disabled="mutating && !error"
    >
        <div :class="{ 'opacity-0': (mutated || mutating) && !error }">
            @lang('Subscribe to newsletter')
        </div>
        <div class="absolute inset-0 p-3.5" v-if="(mutated || mutating) && !error">
            <x-heroicon-o-arrow-path class="mx-auto h-full animate-spin" v-if="mutating" />
            <x-heroicon-o-check class="mx-auto h-full" v-else="" stroke-width="2.5" />
        </div>
    </x-rapidez::button.secondary>
</form>
