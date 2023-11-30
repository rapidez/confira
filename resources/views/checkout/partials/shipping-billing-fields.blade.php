<p class="flex flex-wrap gap-3 justify-between items-center mb-5 text-base text-ct-inactive font-medium">
    @if ($type == 'shipping')
        @lang('Shipping address')
    @else
        @lang('Billing address')
    @endif
</p>

<x-rapidez-ct::address-form :$type/>

@if ($type == 'shipping')
    <div class="mt-5">
        <x-rapidez-ct::input.checkbox v-model="checkout.hide_billing">
            @lang('My billing and shipping address are the same')
        </x-rapidez-ct::input.checkbox>
    </div>
@endif
