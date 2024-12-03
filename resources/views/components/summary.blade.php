@props(['type' => 'cart'])
<x-rapidez-ct::separated-listing>
    <li>
        <div class="flex w-full justify-between items-center">
            <span>
                @lang('Total products')
                (<span v-text="Math.round({{ $type }}.items.length)"></span>)
            </span>
            <div class="font-medium text-ct-neutral text-base" v-text="$options.filters.price({{ $type }}.prices?.subtotal_including_tax?.value ?? {{ $type }}.total?.subtotal?.value)"></div>
        </div>
    </li>
    <li v-if="{{ $type }}.tax > 0">
        <div>@lang('Tax')</div>
        <div class="font-medium text-ct-neutral" v-text="$options.filters.price({{ $type }}.prices.applied_taxes[0].amount.value)"></div>
    </li>
    <li v-for="discount in {{ $type }}?.prices?.discounts">
        <div>@{{ discount.label }}</div>
        <div class="text-ct-primary font-medium">@{{ discount.amount.value | price }}</div>
    </li>
    <li v-if="{{ $type }}?.shipping_method">
        <div>@lang('Shipping')</div>
        <div v-if="{{ $type }}?.total?.total_shipping.value > 0 || {{ $type }}?.shipping_addresses[0]?.selected_shipping_method?.amount?.value > 0" class="font-medium text-ct-neutral">
            <span v-text="$options.filters.price({{ $type }}?.total?.total_shipping?.value ?? {{ $type }}?.shipping_addresses[0]?.selected_shipping_method?.amount?.value)"></span>
        </div>
        <div v-else class="font-medium text-ct-neutral">
            @lang('Free')
        </div>
    </li>
    <li class="border-t border-dashed mt-2.5">
        <div class="text-base text-ct-neutral">@lang('Total price')</div>
        <div class="font-semibold text-lg text-ct-neutral" v-text="$options.filters.price({{ $type }}?.prices?.grand_total?.value || {{ $type }}?.total?.grand_total?.value)"></div>
    </li>
</x-rapidez-ct::separated-listing>
