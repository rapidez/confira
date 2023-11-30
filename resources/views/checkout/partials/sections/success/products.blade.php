<p class="text-base font-medium text-inactive !border-b-0 !pb-0 !mb-4">@lang('You ordered this'):</p>
<ul class="flex flex-col divide-y !pb-0 [&>:first-child]:pt-0 [&>:first-child]:border-t-0">
    <li v-for="(item, productId, index) in order.sales_order_items" class="flex py-5">
        <div class="flex w-full flex-wrap gap-y-3 gap-x-3 text-sm sm:gap-x-6 sm:pr-6 md:items-start">
            <div class="flex h-[100px] items-center justify-center">
                <img
                    class="max-h-[100px]"
                    :alt="item.name"
                    :src="`/storage/{{ config('rapidez.store') }}/resizes/200/sku/${item.sku}`"
                    height="100"
                    v-if="item.sku"
                >
                <x-rapidez::no-image v-else class="h-[100px] w-[100px]"/>
            </div>
            <div class="flex w-[150px] flex-1 flex-col items-start">
                <a :href="item.url" class="text-neutral text-base font-medium" dusk="cart-item-name">@{{ item.name }}</a>
                <div class="text-sm text-inactive" v-for="(optionValue, option) in item.options">
                    @{{ option }}: @{{ optionValue }}
                </div>
            </div>
            @include('rapidez-ct::checkout.partials.sections.success.product-quantity')
        </div>
    </li>
</ul>
