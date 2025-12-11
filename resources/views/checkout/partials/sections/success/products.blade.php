<div class="!pt-0">
    <p class="text-base font-medium text-muted mb-4">@lang('You ordered this'):</p>
    <ul class="flex flex-col divide-y divide-dashed first:*:pt-0 last:*:pb-0">
        <li v-for="(item, productId, index) in order.items" class="flex py-5">
            <div class="flex w-full flex-wrap gap-y-3 gap-x-3 text-sm md:gap-x-6 lg:items-start">
                <div class="flex size-24 items-center justify-center">
                    <img
                        v-if="item.configured_variant?.image"
                        class="object-contain"
                        :alt="item.product.name"
                        :src="resizedPath(item.configured_variant?.image.url + '.webp', '200')"
                    />
                    <img
                        v-else-if="item.product.image"
                        class="object-contain"
                        :alt="item.product.name"
                        :src="resizedPath(item.product.image.url + '.webp', '200')"
                    />
                    <x-rapidez::no-image v-else="" class="size-24"/>
                </div>
                <div class="flex flex-1 flex-wrap justify-between gap-x-6 items-start">
                    <div class="flex-1">
                        <a class="font-medium" :href="item.url">@{{ item.product_name }}</a>
                        <div v-for="option in item.selected_options" class="text-muted">
                            @{{ option.label }}: @{{ option.value }}
                        </div>
                        <div v-for="option in item.entered_options" class="text-muted">
                            @{{ option.label }}: @{{ option.value }}
                        </div>
                    </div>

                    @include('rapidez-ct::checkout.partials.sections.success.product-quantity')
                </div>
            </div>
        </li>
    </ul>
</div>
