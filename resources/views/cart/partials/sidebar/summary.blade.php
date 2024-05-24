<x-rapidez-ct::title.xl class="max-lg:hidden -mb-1.5">
    @lang('Overview')
</x-rapidez-ct::title.xl>

<x-rapidez-ct::summary />

<x-rapidez-ct::button.enhanced :href="route('checkout')" class="flex w-full items-center justify-center gap-1 !mt-0" dusk="checkout">
    @lang('To checkout')
</x-rapidez-ct::button.enhanced>

@include('rapidez-ct::cart.coupon')

<x-rapidez-ct::button.outline href="/" class="lg:hidden w-full">
    @lang('Continue shopping')
</x-rapidez-ct::button.outline>

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
