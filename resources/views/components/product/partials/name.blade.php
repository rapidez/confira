<div {{ $attributes->class('flex flex-col items-start') }}>
    <a :href="item.product.url_key + item.product.url_suffix | url">
        <div class="font-medium text-base" dusk="cart-item-name">@{{ item.product.name }}</div>
        <div class="text-inactive text-sm" v-for="option in item.configurable_options">
            @{{ option.option_label }}: @{{ option.value_label }}
        </div>
        <div class="text-inactive text-sm" v-for="option in item.customizable_options">
            @{{ option.label }}: @{{ option.values[0].label || option.values[0].value }}
        </div>
        <div v-for="option in config.cart_attributes">
            <template v-if="item.product.attribute_values?.[option] && typeof item.product.attribute_values[option] === 'object'">
                @{{ option }}: <span v-html="item.product.attribute_values[option]?.join(', ')"></span>
            </template>
        </div>
    </a>
</div>
