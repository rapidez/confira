<x-rapidez-ct::title class="uppercase max-md:hidden">
    @lang('Overview')
</x-rapidez-ct::title>

<x-rapidez-ct::summary />

<x-rapidez-ct::button.enhanced :href="route('checkout')" class="flex w-full items-center justify-center gap-1 mt-6" dusk="checkout">
    @lang('To checkout')
</x-rapidez-ct::button.enhanced>
@include('rapidez-ct::cart.coupon')
@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')