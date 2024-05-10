<x-rapidez-ct::separated-listing>
    <li>
        <toggler open>
            <div class="flex flex-col w-full" slot-scope="{ isOpen, toggle }" >
                <div @click="toggle" class="flex w-full justify-between">
                    <div class="flex gap-x-1">
                        <span>@lang('Total products') (@{{ Math.round(cart.total_quantity) }})</span>
                        <x-heroicon-o-chevron-down class="text-inactive w-3 stroke-2 transition-all" ::class="{ 'rotate-180': isOpen }" />
                    </div>
                    <div class="font-medium text-ct-neutral">@{{ cart.prices.subtotal_including_tax.value | price }}</div>
                </div>
                <div v-show="isOpen" v-for="item in cart.items" class="text-ct-inactive">
                    <span class="text-ct-neutral">@{{ item.quantity }}x</span>
                    @{{ item.product.name }}
                </div>
            </div>
        </toggler>
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
    <li class="border-t border-dashed mt-2">
        <div class="text-base text-ct-neutral font-medium">@lang('Total price')</div>
        <div class="font-bold text-xl text-ct-neutral">@{{ cart.prices.grand_total.value | price }}</div>
    </li>
</x-rapidez-ct::separated-listing>
