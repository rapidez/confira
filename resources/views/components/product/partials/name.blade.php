<div {{ $attributes->class('flex flex-col items-start') }}>
    <a :href="item.url | url">
        <div class="font-medium text-base" dusk="cart-item-name">@{{ item.name }}</div>
        <div class="text-inactive text-sm" v-for="(optionValue, option) in item.options">
            @{{ option }}: @{{ optionValue }}
        </div>
        <div class="text-inactive text-sm" v-for="option in cart?.items2?.find((item) => item.item_id == itemId).options.filter((option) => !['info_buyRequest', 'option_ids'].includes(option.code) && option.label)">
            @{{ option.label }}: @{{ option.value.title || option.value }}
        </div>
    </a>
</div>