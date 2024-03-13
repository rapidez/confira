<x-rapidez-ct::title-progress-bar>
    @lang('Credentials')
</x-rapidez-ct::title-progress-bar>

<form id="credentials" v-on:submit.prevent="save(['credentials'], 3)">
    <x-rapidez-ct::sections>
        @include('rapidez-ct::checkout.partials.sections.login')
        @include('rapidez-ct::checkout.partials.sections.address')
        @include('rapidez-ct::checkout.partials.sections.newsletter')
        @include('rapidez-ct::checkout.partials.sections.shipping')
    </x-rapidez-ct::sections>
</form>

<x-rapidez-ct::toolbar>
    <x-rapidez-ct::button.outline :href="route('cart')" class="flex justify-center items-center !p-0 w-12 h-12 max-md:hidden">
        <x-heroicon-o-arrow-long-left class="w-6 h-6"/>
    </x-rapidez-ct::button.outline>

    <x-rapidez-ct::button.enhanced class="relative w-full md:w-1/2" form="credentials" loader>
        @lang('Continue')
    </x-rapidez-ct::button.enhanced>
</x-rapidez-ct::toolbar>
