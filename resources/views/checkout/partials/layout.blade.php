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