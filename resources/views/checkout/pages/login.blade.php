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
                    <x-rapidez-ct::toolbar class="*:flex-1 max-sm:flex-col-reverse">
                        <x-rapidez::button.outline :href="route('cart')">
                            @lang('Back to cart')
                        </x-rapidez::button.outline>

                        <x-rapidez::button.conversion loader type="submit" dusk="continue" >
                            @lang('Next')
                        </x-rapidez::button.conversion>
                    </x-rapidez-ct::toolbar>
                </form>
            </x-rapidez-ct::layout.checkout>
        </div>
    </div>
@endsection
