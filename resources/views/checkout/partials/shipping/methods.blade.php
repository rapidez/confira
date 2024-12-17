
<graphql-mutation
    :query="config.queries.setShippingMethodsOnCart"
    :variables="{
        cart_id: mask,
        method: cart.shipping_addresses[0]?.selected_shipping_method?.carrier_code+'/'+cart.shipping_addresses[0]?.selected_shipping_method?.method_code,
    }"
    group="shipping"
    :callback="updateCart"
    :error-callback="checkResponseForExpiredCart"
    :before-request="function (query, variables, options) {
        variables.carrier_code = variables.method.split('/')[0]
        variables.method_code = variables.method.split('/')[1]
        return [query, variables, options]
    }"
    mutate-event="setShippingMethodsOnCart"
    v-slot="{ mutate, variables }"
    v-if="!cart.is_virtual"
>
    <fieldset class="flex flex-col gap-2" partial-submit="mutate" v-on:change="window.app.$emit('setShippingAddressesOnCart')">
        <div v-for="(method, index) in cart.shipping_addresses[0]?.available_shipping_methods" class="flex flex-col gap-2">
            <x-rapidez-ct::input.radio
                name="shipping_method"
                v-model="variables.method"
                v-bind:value="method.carrier_code+'/'+method.method_code"
                v-bind:disabled="!method.available"
                v-bind:dusk="'shipping-method-'+index"
                v-on:change="mutate"
                class="!py-4"
                required
            >
                <div class="flex flex-col md:w-3/5">
                    <span class="font-medium text-base">@{{ method.carrier_title }}</span>
                    <span class="text-muted text-sm">@{{ method.method_title }}</span>
                </div>
                <div class="text-right text-sm font-medium shrink-0">
                    <img
                        width="32"
                        height="32"
                        class="max-h-8"
                        v-bind:alt="method.carrier_title"
                        v-bind:src="`/vendor/shipping-icons/${method.carrier_title}.svg`"
                        onerror="this.onerror=null; this.src='/vendor/shipping-icons/default.svg'"
                    />
                </div>
            </x-rapidez-ct::input.radio>
        </div>
    </fieldset>
</graphql-mutation>
