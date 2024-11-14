<p class="text-base font-medium text-inactive !border-b-0 !pb-0 !mb-4">@lang('You ordered this'):</p>
<ul class="flex flex-col divide-y !pb-0 [&>:first-child]:pt-0 [&>:first-child]:border-t-0">
    <li v-for="(item, productId, index) in order.items" class="flex py-5">
        <div class="flex w-full flex-wrap gap-y-3 gap-x-3 text-sm md:gap-x-6 md:pr-6 lg:items-start">
            <div class="flex h-24 items-center justify-center">
                <img
                    class="max-h-24"
                    :alt="item.product_name"
                    :src="`/storage/{{ config('rapidez.store') }}/resizes/200/sku/${item.product_sku}`"
                    height="100"
                    v-if="item.product_sku"
                >
                <x-rapidez::no-image v-else class="h-24 w-24"/>
            </div>
            <div class="flex w-36 flex-1 flex-col items-start">
                <a :href="item.url" dusk="cart-item-name">@{{ item.product_name }}</a>
                <div v-for="option in item.selected_options">
                    @{{ option.label }}: @{{ option.value }}
                </div>
                <div v-for="option in item.entered_options">
                    @{{ option.label }}: @{{ option.value }}
                </div>
            </div>
            @include('rapidez-ct::checkout.partials.sections.success.product-quantity')
        </div>
    </li>
</ul>
