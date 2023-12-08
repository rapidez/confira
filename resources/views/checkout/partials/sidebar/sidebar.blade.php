<x-rapidez-ct::title class="uppercase mb-4">
    @lang('Overview')
</x-rapidez-ct::title>

<x-rapidez-ct::summary />

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
<div class="flex flex-wrap justify-between border-y border-dashed mt-5 py-5">
    @include('rapidez-ct::checkout.partials.sidebar.user-info')
</div>
@include('rapidez-ct::checkout.partials.sidebar.bottom-links')
