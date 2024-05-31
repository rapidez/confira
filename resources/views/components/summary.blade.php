<x-rapidez-ct::separated-listing>
    <li>
        <div class="flex w-full justify-between items-center">
            <span>@lang('Total products') (@{{ Math.round(cart.total_quantity) }})</span>
            <div class="font-medium text-ct-neutral text-base">@{{ cart.prices.subtotal_including_tax.value | price }}</div>
        </div>
    </li>
    <li v-if="cart.tax > 0">
        <div>@lang('Tax')</div>
        <div class="font-medium text-ct-neutral">@{{ cart.prices.applied_taxes[0].amount.value | price }}</div>
    </li>
    <li v-for="discount in cart.prices.discounts">
        <div>@{{ discount.label }}</div>
        <div class="text-ct-primary font-medium">@{{ discount.amount.value | price }}</div>
    </li>
    <li v-if="cart.shipping_method">
        <div>@lang('Shipping')</div>
        <div v-if="cart.shipping_addresses[0].selected_shipping_method.amount.value > 0 " class="font-medium text-ct-neutral">
            @{{ cart.shipping_addresses[0].selected_shipping_method.amount.value | price }}
        </div>
        <div v-else class="font-medium text-ct-neutral">
            @lang('Free')
        </div>
    </li>
    <li class="border-t border-dashed mt-2.5">
        <div class="text-base text-ct-neutral">@lang('Total price')</div>
        <div class="font-bold text-lg text-ct-neutral">@{{ cart.prices.grand_total.value | price }}</div>
    </li>
</x-rapidez-ct::separated-listing>
