<div class="flex flex-col *:gap-x-4">
    <checkout-success-addresses :order="order" v-slot="{ hideBilling, shipping, billing }">
        <div class="flex flex-1 border-t border-dashed justify-between pt-5">
            <template v-if="hideBilling">
                <x-rapidez-ct::card.address-alt v-bind:address="shipping" shipping billing />
            </template>
            <x-rapidez-ct::card.address-alt v-if="!hideBilling && shipping" v-bind:address="shipping" shipping/>
            <x-rapidez-ct::card.address-alt v-if="!hideBilling && billing" v-bind:address="billing" billing/>
        </div>
    </checkout-success-addresses>
    <div class="flex flex-1 border-t border-dashed justify-between pt-5 mt-6">
        <div class="flex-1">
            <p class="text-base font-medium mb-2.5 pr-8">
                @lang('Payment method')
            </p>
            <div class="flex flex-1 flex-wrap justify-between">
                <ul class="flex flex-col gap-1">
                    <li v-for="method in order.payment_methods">
                        @{{ method.name || method.type }}
                    </li>
                </ul>
                @if (!empty($slot))
                    <div class="mt-auto flex flex-col self-end">
                        {{ $slot }}
                    </div>
                @endif
            </div>
        </div>
        <div class="flex-1">
            <p class="text-base font-medium mb-2.5 pr-8">
                @lang('Delivery method')
            </p>
            <div class="flex flex-1 flex-wrap justify-between">
                <ul class="flex flex-col gap-1">
                    <li v-text="order.shipping_method"></li>
                </ul>
                @if (!empty($slot))
                    <div class="mt-auto flex flex-col self-end">
                        {{ $slot }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
