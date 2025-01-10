<toggler>
    <div slot-scope="{ toggle, isOpen }" class="*:pt-2.5 first:*:pt-0 mb-2.5 flex w-full flex-col gap-2.5 divide-y divide-dashed border-b border-dashed pb-2.5 bg-ct-primary-100">
        <div v-for="(item, index) in cart.items" v-show="isOpen || index < 2" class="flex gap-3">
            <img v-if="item.product.image" class="max-h-20 w-20 shrink-0 object-contain mix-blend-darken" :alt="item.product.name" :src="'/storage/{{ config('rapidez.store') }}/resizes/200/magento' + item.product.image.url.replace(config.media_url, '') + '.webp'">
            <div class="flex flex-col">
                <span class="line-clamp-1 text-sm font-semibold text-ct-neutral">
                    @{{ item.product.name }}
                </span>
                <div class="*:border-r last:*:border-r-0 last:*:pr-0 *:pr-2 flex flex-wrap gap-x-2 text-xs text-ct-inactive">
                    <div class="*:border-r *:px-2 *:mb-2 *:leading-3 last:*:border-r-0 -mx-2 mt-2 flex flex-wrap text-xs text-inactive subpixel-antialiased">
                        <div v-for="option in item.configurable_options">
                            @{{ option.value_label }}
                        </div>
                        <div v-for="option in item.customizable_options">
                            @{{ option.label }}: @{{ option.values[0].label || option.values[0].value }}
                        </div>
                        <div v-for="option in config.cart_attributes" v-if="item.product.attribute_values?.[option] && typeof item.product.attribute_values[option] === 'object'">
                            <p class="normal-case first-letter:uppercase">@{{ option.replace(/_/g, ' ') }}: <span v-html="item.product.attribute_values[option]?.join(', ')"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button v-if="cart.items.length > 2" class="mt-2 flex items-center pb-1 gap-1 text-ct-inactive font-medium" @click="toggle">
            <template v-if="isOpen">
                @lang('Show less products')
            </template>
            <template v-else>
                @lang('Show all products')
            </template>
            <x-heroicon-o-chevron-down stroke-width="2.5" v-bind:class="{'rotate-180': isOpen}" class="size-3.5 transition-all" />
        </button>
    </div>
</toggler>
