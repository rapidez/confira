@extends('rapidez::layouts.app')

@section('title', __('Checkout'))

@section('robots', 'NOINDEX,NOFOLLOW')

@section('content')
    <div class="overflow-clip">
        <div class="lg:container xl:max-w-screen-xl">
            <x-rapidez-ct::layout.checkout>
                <x-slot:header>
                    @include('rapidez-ct::checkout.partials.header', ['href' => route('cart')])
                </x-slot:header>
                <x-rapidez-ct::title-progress-bar :$checkoutSteps :$currentStep :$currentStepKey>
                    @lang('Credentials')
                </x-rapidez-ct::title-progress-bar>

                <form
                    class="contents"
                    v-on:submit.prevent="(e) => {
                        submitPartials(e.target?.form ?? e.target)
                            .then((result) =>
                                window.app.$emit('checkout-credentials-saved')
                                && window.Turbo.visit(window.url('{{ route('checkout', ['step' => 'payment']) }}'))
                            ).catch();
                    }"
                >
                    @include('rapidez-ct::checkout.steps.credentials')
                    <x-rapidez-ct::toolbar>
                        <x-rapidez::button.outline :href="route('cart')" class="grid-span-1">
                            @lang('Back to cart')
                        </x-rapidez::button.outline>

                        <x-rapidez::button.conversion loader>
                            @lang('Next')
                        </x-rapidez::button.conversion>
                    </x-rapidez-ct::toolbar>
                </form>
                <x-slot:sidebar>
                    @include('rapidez-ct::checkout.partials.sidebar.sidebar')
                </x-slot:sidebar>
            </x-rapidez-ct::layout.checkout>
        </div>
    </div>
@endsection
