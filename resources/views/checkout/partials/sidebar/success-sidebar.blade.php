<x-rapidez-ct::title.xl class="mb-4">
    @lang('Overview')
</x-rapidez-ct::title.xl>

<x-rapidez-ct::summary type="order" />

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
@include('rapidez-ct::checkout.partials.sections.success.order-info')