<div class="flex flex-col">
    <span class="text-muted">@lang('Total products')</span>
    <div v-for="(item, productId, index) in order.sales_order_items">
        <div class="flex w-full justify-between">
            <dt class="flex gap-x-1 text-muted">
                <div>
                    <span>@{{ Math.round(item.qty_ordered) }}x</span>
                    <span class="text-muted">@{{ item.name }}</span>
                </div>
            </dt>
            <dd>@{{ item.base_price_incl_tax | price }}</dd>
        </div>
    </div>
</div>

<div class="flex flex-col !mt-0">
    <dl v-if="order.tax_amount" class="flex justify-between order-first mt-2">
        <dt class="text-muted">@lang('Tax')</dt>
        <dd class="font-medium">@{{ order.tax_amount | price }}</dd>
    </dl>
    <dl v-if="order.shipping_amount" class="flex justify-between mt-2">
        <dt class="text-muted">@lang('Shipping')</dt>
        <dd v-if="order.shipping_amount > 0" class="font-medium">
            @{{ order.shipping_amount | price }}
        </dd>
        <dd v-else class="font-medium">
            @lang('Free')
        </dd>
    </dl>
    <dl v-if="order.grand_total" class="flex items-center order-last justify-between border-t border-dashed pt-3 mt-4">
        <dt class="text-base font-medium">@lang('Total price')</dt>
        <dd class="font-bold text-xl">@{{ order.grand_total | price }}</dd>
    </dl>
</div>
