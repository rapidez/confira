<checkout-success>
    <div slot-scope="{ order }" dusk="checkout-success" class="mt-4">
        <x-rapidez-ct::layout>
            <x-rapidez-ct::title-progress-bar>
                @lang('Thank you for your order')
            </x-rapidez-ct::title-progress-bar>
            <x-rapidez-ct::sections>
                @include('rapidez-ct::checkout.partials.sections.success.order-completed-note')
            </x-rapidez-ct::sections>
            <x-rapidez-ct::sections class="!pb-0">
                @include('rapidez-ct::checkout.partials.sections.success.products')
                @includeWhen(
                    config('rapidez.checkout-theme.checkout.success.register'),
                    'rapidez-ct::checkout.partials.sections.success.create-account'
                )
            </x-rapidez-ct::sections>

            <x-slot:sidebar>
                <x-rapidez-ct::title class="uppercase mb-4">
                    @lang('Overview')
                </x-rapidez-ct::title>
                @include('rapidez-ct::checkout.partials.sections.success.summary')
                @include('rapidez-ct::cart.partials.sidebar.payment')
                @include('rapidez-ct::cart.partials.sidebar.usps')
                @include('rapidez-ct::checkout.partials.sections.success.order-info')
            </x-slot:sidebar>
        </x-rapidez-ct::layout>
    </div>
</checkout-success>