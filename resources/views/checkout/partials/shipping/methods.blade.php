<div v-for="(method, index) in checkout.shipping_methods" class="mt-5 flex flex-col gap-2">
    <x-rapidez-ct::input.radio
        v-bind:value="method.carrier_code+'_'+method.method_code"
        v-bind:dusk="'method-'+index"
        v-model="checkout.shipping_method"
        name="shipping_method"
        class="!py-4"
        required
    >
        <div class="flex flex-col sm:w-3/5">
            <span class="text-ct-neutral font-medium text-base">@{{ method.carrier_title }}</span>
            <span class="text-ct-inactive text-sm">@{{ method.method_title }}</span>
        </div>
        <div class="text-right text-sm font-medium">
            <img
                width="32"
                height="32"
                class="max-h-8"
                v-bind:alt="method.carrier_title"
                v-bind:src="`/vendor/shipping-icons/${method.carrier_title}.svg`"
                onerror="this.onerror=null; this.src='/vendor/shipping-icons/envelope.svg'"
            />
        </div>
    </x-rapidez-ct::input.radio>
</div>