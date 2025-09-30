@if ($type == 'shipping')
    <x-rapidez-ct::title.lg class="mb-5">
        @lang('Shipping address')
    </x-rapidez-ct::title.lg>
@else
    <x-rapidez-ct::title.lg class="mb-5 mt-9 pt-7 border-t border-dashed" v-if="!variables.same_as_shipping" v-cloak>
        @lang('Billing address')
    </x-rapidez-ct::title.lg>
@endif

<template @if($type == 'billing') v-if="!variables.same_as_shipping" @endif >
    <x-rapidez-ct::address-form :$type/>
</template>

@if ($type == 'billing')
    <div class="mt-5" v-if="!cart.is_virtual">
        <x-rapidez::input.checkbox v-model="variables.same_as_shipping">
            @lang('My billing and shipping address are the same')
        </x-rapidez::input.checkbox>
    </div>
@endif
