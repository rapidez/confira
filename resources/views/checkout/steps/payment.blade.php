<x-rapidez-ct::title-progress-bar>
    @lang('Payment')
</x-rapidez-ct::title-progress-bar>

<x-rapidez-ct::sections>
    @include('rapidez-ct::checkout.partials.sections.payment')
</x-rapidez-ct::sections>

<x-rapidez-ct::toolbar>
    <x-rapidez-ct::button.outline v-on:click.prevent="goToStep(1)" class="flex justify-center items-center !p-0 w-12 h-12 max-lg:hidden">
        <x-heroicon-o-arrow-long-left class="w-6 h-6"/>
    </x-rapidez-ct::button.outline>

    <x-rapidez-ct::button.enhanced class="relative w-full lg:w-1/2" form="payment" type="submit" dusk="continue" loader>
        @lang('Place order')
    </x-rapidez-ct::button.enhanced>
</x-rapidez-ct::toolbar>
