@extends('rapidez::layouts.app')

@section('title', __('Checkout'))

@section('robots', 'NOINDEX,NOFOLLOW')

@section('content')
    <checkout v-slot="{ checkout, cart, hasItems, save, goToStep }" :set="checkout.step = Math.max(checkout.step, 2)" v-cloak>
        <div class="relative">
            <div class="container">
                <template v-if="checkout.step !== 4">
                    <x-rapidez-ct::layout.checkout>
                        <x-slot:header>
                            @include('rapidez-ct::checkout.partials.header')
                        </x-slot:header>

                        <template v-if="checkout.step == 2 && hasItems">
                            @include('rapidez-ct::checkout.steps.credentials')
                        </template>

                        <template v-if="checkout.step == 3">
                            @include('rapidez-ct::checkout.steps.payment')
                        </template>

                        <x-slot:sidebar>
                            @include('rapidez-ct::checkout.partials.sidebar.sidebar')
                        </x-slot:sidebar>
                    </x-rapidez-ct::layout.checkout>
                </template>

                <template v-if="checkout.step == 4">
                    @include('rapidez-ct::checkout.steps.success')
                </template>
            </div>
        </div>
    </checkout>
@endsection
