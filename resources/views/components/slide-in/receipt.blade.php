<x-rapidez-ct::slide-in>
    <label for="slide-in" class="absolute z-10 w-7 h-7 right-3 top-5 peer-checked:text-primary">
        <x-heroicon-o-x-mark class="text-muted size-7" />
    </label>
    <x-rapidez-ct::title class="mb-4">
        @lang('Overview')
    </x-rapidez-ct::title>
    <x-rapidez-ct::separated-listing tag="dl">
        <div>
            <dt>@lang('Subtotal')</dt>
            <dd v-if="showTax">@{{ window.price(cart.value.prices.subtotal_including_tax.value) }}</dd>
            <dd v-else="">@{{ window.price(cart.value.prices.subtotal_excluding_tax.value) }}</dd>
        </div>
        <template v-if="cart.value.prices?.applied_taxes?.length">
            <div v-for="tax in cart.value.prices.applied_taxes">
                <dt>@lang('Tax')</dt>
                <dd>@{{ window.price(tax.amount.value) }}</dd>
            </div>
        </template>
        <template v-if="cart.value.prices?.discounts?.length">
            <div v-for="discount in cart.value.fixed_product_taxes">
                <dt>@{{ discount.label }}</dt>
                <dd>-@{{ window.price(discount.amount.value) }}</dd>
            </div>
        </template>
        <div class="font-medium">
            <dt>@lang('Total')</dt>
            <dd v-if="showTax">@{{ window.price(cart.value.prices.grand_total.value) }}</dd>
            <dd v-else>@{{ window.price(cart.value.prices.grand_total.value - cart.value.taxTotal) }}</dd>
        </div>
    </x-rapidez-ct::separated-listing>
    @include('rapidez-ct::cart.partials.sidebar.payment')
    @include('rapidez-ct::cart.partials.sidebar.usps')
    <x-rapidez-ct::slide-in.partials.drawer-border class="bg-primary/20 bottom-2 inset-x-0"/>
</x-rapidez-ct::slide-in>
