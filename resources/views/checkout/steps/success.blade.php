@php($checkoutSteps = config('rapidez.frontend.checkout_steps.' . config('rapidez.store_code')) ?: config('rapidez.frontend.checkout_steps.default'))
<checkout-success>
    <div slot-scope="{ order, refreshOrder, hideBilling, shipping, billing, items }" dusk="checkout-success" class="container">
        <x-rapidez-ct::layout class="mt-4 sm:mt-12">
            <x-rapidez-ct::title>
                @lang('Thank you for your order')
            </x-rapidez-ct::title>

            <x-rapidez-ct::sections>
                <x-rapidez-ct::card.inactive class="!bg-ct-primary-100 py-8 px-6 rounded-xl border-b border-black/5">
                    @include('rapidez-ct::checkout.partials.sections.success.order-completed-note')
                </x-rapidez-ct::card.inactive>
            </x-rapidez-ct::sections>

            <x-rapidez-ct::sections>
                @include('rapidez-ct::checkout.partials.sections.success.products')

                <x-rapidez-ct::card.inactive>
                    @include('rapidez-ct::checkout.partials.sections.success.newsletter')
                </x-rapidez-ct::card.inactive>
                
                @if (config('rapidez.checkout-theme.checkout.success.register'))
                    <x-rapidez-ct::card.inactive>
                        @include('rapidez-ct::checkout.partials.sections.success.create-account')
                    </x-rapidez-ct::card.inactive>
                @endif
                
            </x-rapidez-ct::sections>
            <x-slot:sidebar class="max-lg:border-t max-lg:border-dashed max-lg:mt-1 max-lg:pt-6">
                @include('rapidez-ct::checkout.partials.sidebar.success-sidebar')
            </x-slot:sidebar>
        </x-rapidez-ct::layout>
    </div>
</checkout-success>
