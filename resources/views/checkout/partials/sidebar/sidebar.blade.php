<x-rapidez-ct::title class="uppercase max-md:hidden">
    @lang('Overview')
</x-rapidez-ct::title>

<x-rapidez-ct::summary />

<x-rapidez-ct::button.enhanced v-if="checkout.step != 3" form="credentials" class="flex w-full items-center justify-center gap-1 mt-6" loader dusk="continue">
    @lang('Next')
</x-rapidez-ct::button.enhanced>
<x-rapidez-ct::button.enhanced v-else form="payment" type="submit" class="flex w-full items-center justify-center gap-1 mt-6" loader dusk="continue">
    @lang('Place order')
</x-rapidez-ct::button.enhanced>
@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
@include('rapidez-ct::checkout.partials.sidebar.user-info')
@include('rapidez-ct::checkout.partials.sidebar.bottom-links')
