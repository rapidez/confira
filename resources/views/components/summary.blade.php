<x-rapidez-ct::separated-listing tag="dl">
    <toggler>
        <div class="flex flex-col" slot-scope="{ isOpen, toggle }" >
            <div @click="toggle" class="flex w-full justify-between">
                <dt class="flex gap-x-1">
                    <span>@lang('Total products') (@{{ Math.round(cart.items_qty) }})</span>
                    <x-heroicon-o-chevron-down class="text-inactive w-3 stroke-2 transition-all" ::class="{ 'rotate-180': isOpen }" />
                </dt>
                <dd class="font-medium text-neutral">@{{ cart.subtotal | price }}</dd>
            </div>
            <div v-show="isOpen" v-for="item in cart.items" class="text-ct-inactive">
                <span class="text-ct-neutral">@{{ item.qty }}x</span>
                @{{ item.name }}
            </div>
        </div>
    </toggler>
    <div v-if="cart.tax > 0">
        <dt>@lang('Tax')</dt>
        <dd class="font-medium text-ct-neutral">@{{ cart.tax | price }}</dd>
    </div>
    <div v-if="cart.discount_name">
        <dt>@lang('Discount') (@{{ cart.discount_name }})</dt>
        <dd class="text-ct-primary font-medium">@{{ cart.discount_amount | price }}</dd>
    </div>
    <div v-if="cart.shipping_method">
        <dt>@lang('Shipping')</dt>
        <dd v-if="cart.shipping_amount_excl_tax > 0 " class="font-medium">
            @{{ cart.shipping_amount_excl_tax | price }}
        </dd>
        <dd v-else class="font-medium text-ct-neutral">
            @lang('Free')
        </dd>
    </div>
    <div class="border-t border-dashed mt-2">
        <dt class="text-base text-neutral font-medium">@lang('Total price')</dt>
        <dd class="font-bold text-xl text-ct-neutral">@{{ cart.total | price }}</dd>
    </div>
</x-rapidez-ct::separated-listing>
