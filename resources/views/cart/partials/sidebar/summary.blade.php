<x-rapidez-ct::title.xl class="max-lg:hidden -mb-1.5">
    @lang('Overview')
</x-rapidez-ct::title.xl>

<x-rapidez-ct::separated-listing tag="dl">
    <div>
        <dt>@lang('Subtotal')</dt>
        <dd v-if="showTax">@{{ window.price(cart.value.prices.subtotal_including_tax.value) }}</dd>
        <dd v-else>@{{ window.price(cart.value.prices.subtotal_excluding_tax.value) }}</dd>
    </div>
    <template v-if="cart.value.shipping_addresses?.length">
        <div v-for="address in cart.value.shipping_addresses">
            <template v-if="address?.selected_shipping_method">
                <dt>
                    @lang('Shipping')
                    <small class="text-muted">@{{ address.selected_shipping_method.carrier_title }} - @{{ address.selected_shipping_method.method_title }}</small>
                </dt>
                <dd v-if="showTax">@{{ window.price(address.selected_shipping_method.price_incl_tax.value) }}</dd>
                <dd v-else>@{{ window.price(address.selected_shipping_method.price_excl_tax.value) }}</dd>
            </template>
            <template v-else>
                <dt>@lang('Shipping')</dt>
                <dd class="font-medium text-primary">
                    @lang('Free')
                </dd>
            </template>
        </div>
    </template>
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
    <div class="font-bold">
        <dt>@lang('Total')</dt>
        <dd v-if="showTax">@{{ window.price(cart.value.prices.grand_total.value) }}</dd>
        <dd v-else>@{{ window.price(cart.value.prices.grand_total.value - cart.value.taxTotal) }}</dd>
    </div>
</x-rapidez-ct::separated-listing>

<x-rapidez::button.conversion :href="route('checkout')" class="flex w-full items-center justify-center gap-1 !mt-0">
    @lang('To checkout')
</x-rapidez::button.conversion>

@include('rapidez-ct::cart.coupon')

<x-rapidez::button.outline href="/" class="lg:hidden w-full">
    @lang('Continue shopping')
</x-rapidez::button.outline>

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')