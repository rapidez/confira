@props(['type' => 'cart'])
<x-rapidez-ct::separated-listing>
    <li>
        <div class="flex w-full justify-between items-center">
            <span>
                @lang('Total products')
                (<span v-text="Math.round({{ $type }}.items.length)"></span>)
            </span>
            <div class="font-medium text-base" v-text="$options.filters.price({{ $type }}.prices?.subtotal_including_tax?.value ?? {{ $type }}.total?.subtotal?.value)"></div>
        </div>
    </li>
    <li v-if="{{ $type }}.tax > 0">
        <div>@lang('Tax')</div>
        <div class="font-medium" v-text="$options.filters.price({{ $type }}.prices.applied_taxes[0].amount.value)"></div>
    </li>
    <li v-for="discount in {{ $type }}?.prices?.discounts">
        <div>@{{ discount.label }}</div>
        <div class="text-green-700 font-semibold">@{{ discount.amount.value | price }}</div>
    </li>
    <li v-if="{{ $type }}?.shipping_method">
        <div>@lang('Shipping')</div>
        <div v-if="{{ $type }}?.total?.total_shipping.value > 0 || {{ $type }}?.shipping_addresses[0]?.selected_shipping_method?.amount?.value > 0" class="font-medium">
            <span v-text="$options.filters.price({{ $type }}?.total?.total_shipping?.value ?? {{ $type }}?.shipping_addresses[0]?.selected_shipping_method?.amount?.value)"></span>
        </div>
        <div v-else class="font-medium">
            @lang('Free')
        </div>
    </li>
    <li class="border-t border-dashed mt-2.5 flex items-center">
        <div class="font-semibold text-base">@lang('Total price')</div>
        <div class="font-semibold text-lg" v-text="$options.filters.price({{ $type }}?.prices?.grand_total?.value || {{ $type }}?.total?.grand_total?.value)"></div>
    </li>
</x-rapidez-ct::separated-listing>
