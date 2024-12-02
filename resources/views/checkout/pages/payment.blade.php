@extends('rapidez::layouts.app')

@section('title', __('Checkout'))

@section('robots', 'NOINDEX,NOFOLLOW')

@section('content')
    <div class="overflow-clip">
        <div class="container">
            <x-rapidez-ct::layout.checkout>
                <x-slot:header>
                    @include('rapidez-ct::checkout.partials.header', ['href' => route('cart')])
                </x-slot:header>

                <x-rapidez-ct::title-progress-bar :$checkoutSteps :$currentStep :$currentStepKey>
                    @lang('Payment')
                </x-rapidez-ct::title-progress-bar>
                
                <form
                    class="contents"
                    v-on:submit.prevent="(e) => {
                        submitPartials(e.target?.form ?? e.target)
                            .then((result) =>
                                window.app.$emit('checkout-payment-saved')
                                && window.app.$emit('placeOrder')
                            ).catch();
                    }"
                >
                    @include('rapidez::checkout.steps.payment_method')
                    <x-rapidez-ct::toolbar>
                        <x-rapidez-ct::button.outline :href="route('checkout', ['step' => 'credentials'])">
                            @lang('Back to credentials')
                        </x-rapidez-ct::button.outline>
                        <graphql-mutation
                            :query="config.queries.placeOrder"
                            :variables="{ cart_id: mask }"
                            :before-request="handleBeforePlaceOrderHandlers"
                            :callback="handlePlaceOrder"
                            mutate-event="placeOrder"
                            redirect="{{ route('checkout.success') }}"
                            v-slot="{ mutate, variables }"
                        >
                            <fieldset>
                                <x-rapidez-ct::button.enhanced class="relative" type="submit" dusk="continue" loader>
                                    @lang('Place order')
                                </x-rapidez-ct::button.enhanced>
                            </fieldset>
                        </graphql-mutation>
                    </x-rapidez-ct::toolbar>
                </form>
                <x-slot:sidebar>
                    @include('rapidez-ct::checkout.partials.sidebar.sidebar')
                </x-slot:sidebar>
            </x-rapidez-ct::layout.checkout>
        </div>
    </div>
@endsection
