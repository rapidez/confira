<div class="flex flex-col">
    <span class="text-ct-inactive">@lang('Total products')</span>
    <div v-for="(item, productId, index) in order.sales_order_items">
        <div class="flex w-full justify-between">
            <dt class="flex gap-x-1 text-inactive">
                <div class="text-ct-inactive">
                    <span class="text-ct-neutral">@{{ Math.round(item.qty_ordered) }}x</span>
                    @{{ item.name }}
                </div>
            </dt>
            <dd class="text-ct-neutral">@{{ item.base_price_incl_tax | price }}</dd>
        </div>
    </div>
</div>

<div class="flex flex-col !mt-0">
    <div v-if="order.tax_amount" class="flex justify-between order-first mt-2">
        <dt class="text-inactive">@lang('Tax')</dt>
        <dd class="font-medium text-ct-neutral">@{{ order.tax_amount | price }}</dd>
    </div>
    <div v-if="order.shipping_amount" class="flex justify-between mt-2">
        <dt class="text-inactive">@lang('Shipping')</dt>
        <dd v-if="order.shipping_amount > 0" class="font-medium text-ct-neutral">
            @{{ order.shipping_amount | price }}
        </dd>
        <dd v-else class="font-medium text-ct-neutral">
            @lang('Free')
        </dd>
    </div>
    <div v-if="order.grand_total" class="flex items-center order-last justify-between border-t border-dashed pt-3 mt-4">
        <dt class="text-base text-ct-neutral font-medium">@lang('Total price')</dt>
        <dd class="font-bold text-xl text-ct-neutral">@{{ order.grand_total | price }}</dd>
    </div>
</div>
