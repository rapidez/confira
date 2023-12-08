<x-rapidez-ct::separated-listing>
    <li>
        <toggler open>
            <div class="flex flex-col w-full" slot-scope="{ isOpen, toggle }" >
                <div @click="toggle" class="flex w-full justify-between">
                    <div class="flex gap-x-1">
                        <span>@lang('Total products') (@{{ Math.round(cart.items_qty) }})</span>
                        <x-heroicon-o-chevron-down class="text-inactive w-3 stroke-2 transition-all" ::class="{ 'rotate-180': isOpen }" />
                    </div>
                    <div class="font-medium text-ct-neutral">@{{ cart.subtotal | price }}</div>
                </div>
                <div v-show="isOpen" v-for="item in cart.items" class="text-ct-inactive">
                    <span class="text-ct-neutral">@{{ item.qty }}x</span>
                    @{{ item.name }}
                </div>
            </div>
        </toggler>
    </li>
    <li v-if="cart.tax > 0">
        <div>@lang('Tax')</div>
        <div class="font-medium text-ct-neutral">@{{ cart.tax | price }}</div>
    </li>
    <li v-if="cart.discount_name">
        <div>@lang('Discount') (@{{ cart.discount_name }})</div>
        <div class="text-ct-primary font-medium">@{{ cart.discount_amount | price }}</div>
    </li>
    <li v-if="cart.shipping_method">
        <div>@lang('Shipping')</div>
        <div v-if="cart.shipping_amount > 0 " class="font-medium text-ct-neutral">
            @{{ cart.shipping_amount | price }}
        </div>
        <div v-else class="font-medium text-ct-neutral">
            @lang('Free')
        </div>
    </li>
    <li class="border-t border-dashed mt-2">
        <div class="text-base text-ct-neutral font-medium">@lang('Total price')</div>
        <div class="font-bold text-xl text-ct-neutral">@{{ cart.total | price }}</div>
    </li>
</x-rapidez-ct::separated-listing>
