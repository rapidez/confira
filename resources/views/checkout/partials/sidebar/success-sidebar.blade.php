<x-rapidez-ct::title.xl class="mb-4">
    @lang('Overview')
</x-rapidez-ct::title.xl>

<x-rapidez-ct::separated-listing tag="dl">
    <div>
        <dt>@lang('Subtotal')</dt>
        <dd v-if="showTax">@{{ window.price(order.total.subtotal.value) }}</dd>
        <dd v-else>@{{ window.price(order.total.subtotal.value - order.total.total_tax.value) }}</dd>
    </div>
    <template v-if="order.shipping_method">
        <div>
            <dt class="flex flex-col">
                @lang('Shipping')
                <small class="text-muted">@{{ order.shipping_method }}</small>
            </dt>
            <dd>@{{ window.price(order.total.total_shipping.value) }}</dd>
        </template>
        <template v-else>
            <dt>@lang('Shipping')</dt>
            <dd class="font-medium text-primary">
                @lang('Free')
            </dd>
        </div>
    </template>
    <template v-if="order.prices?.applied_taxes?.length">
        <div v-for="tax in order.prices.applied_taxes">
            <dt>@lang('Tax')</dt>
            <dd>@{{ window.price(tax.amount.value) }}</dd>
        </div>
    </template>
    <template v-if="order.prices?.discounts?.length">
        <div v-for="discount in order.fixed_product_taxes">
            <dt>@{{ discount.label }}</dt>
            <dd>-@{{ window.price(discount.amount.value) }}</dd>
        </div>
    </template>
    <div class="font-bold">
        <dt>@lang('Total')</dt>
        <dd v-if="showTax">@{{ window.price(order.total.grand_total.value) }}</dd>
        <dd v-else>@{{ window.price(order.total.grand_total.value - order.total.total_tax.value) }}</dd>
    </div>
</x-rapidez-ct::separated-listing>

@include('rapidez-ct::cart.partials.sidebar.payment')
@include('rapidez-ct::cart.partials.sidebar.usps')
@include('rapidez-ct::checkout.partials.sections.success.order-info')