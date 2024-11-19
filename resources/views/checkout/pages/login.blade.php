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
                    @lang('Credentials')
                </x-rapidez-ct::title-progress-bar>

                <form
                    v-if="hasCart"
                    v-on:submit.prevent="(e) => {
                        submitPartials(e.target?.form ?? e.target)
                            .then((result) =>
                                window.Turbo.visit(window.url('{{ route('checkout', ['step' => 'credentials']) }}'))
                            ).catch();
                    }"
                    class="max-w-md mx-auto"
                    v-cloak
                >
                    @include('rapidez-ct::checkout.steps.login')
                    <x-rapidez-ct::toolbar>
                        <x-rapidez-ct::button.outline :href="route('cart')">
                            @lang('Back to cart')
                        </x-rapidez-ct::button.outline>

                        <x-rapidez-ct::button.enhanced loader type="submit" dusk="continue" >
                            @lang('Next')
                        </x-rapidez-ct::button.enhanced>
                    </x-rapidez-ct::toolbar>
                </form>
            </x-rapidez-ct::layout.checkout>
        </div>
    </div>
@endsection
