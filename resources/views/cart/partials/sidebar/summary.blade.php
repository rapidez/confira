<x-rapidez-ct::title.xl class="max-lg:hidden -mb-1.5">
    @lang('Overview')
</x-rapidez-ct::title.xl>

<x-rapidez-ct::summary />

<x-rapidez::button.conversion :href="route('checkout')" class="flex w-full items-center justify-center gap-1 !mt-0">
    @lang('To checkout')
</x-rapidez::button.conversion>

@include('rapidez-ct::cart.coupon')

<x-rapidez::button.outline href="/" class="lg:hidden w-full">
    @lang('Continue shopping')
</x-rapidez::button.outline>

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
