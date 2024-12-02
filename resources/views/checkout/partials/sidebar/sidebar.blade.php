<x-rapidez-ct::title.xl class="mb-4">
    @lang('Overview')
</x-rapidez-ct::title.xl>

@include('rapidez-ct::checkout.partials.sidebar.products')

<x-rapidez-ct::summary />

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
<div class="mt-5 flex flex-wrap justify-between border-y border-dashed py-5 empty:hidden">
    @include('rapidez-ct::checkout.partials.sidebar.user-info')
</div>
@include('rapidez-ct::checkout.partials.sidebar.bottom-links')
