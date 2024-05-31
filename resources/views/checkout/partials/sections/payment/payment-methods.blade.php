<x-rapidez-ct::input.radio
    name="payment_method"
    class="!py-7"
    v-bind:value="method.code"
    v-bind:dusk="'method-'+index"
    v-model="checkout.payment_method"
    required
>
    <div class="text-ct-neutral font-medium">@{{ method.title }}</div>
    <img
        class="max-h-6"
        v-bind:alt="method.code"
        v-bind:src="`/vendor/payment-icons/${method.code}.svg`"
        onerror="this.onerror=null; this.src='/vendor/payment-icons/default.svg'"
    />
</x-rapidez-ct::input.radio>
