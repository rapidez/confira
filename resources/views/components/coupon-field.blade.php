<graphql-mutation
    :query="'mutation ($cart_id: String!, $coupon_code: String!) { applyCouponToCart(input: { cart_id: $cart_id, coupon_code: $coupon_code }) { cart { ' + config.queries.cart + ' } } }'"
    :variables="{ cart_id: mask, coupon_code: '' }"
    :notify="{ message: config.translations.cart.coupon.applied }"
    :clear="true"
    :watch="false"
    :callback="updateCart"
    :error-callback="checkResponseForExpiredCart"
    v-slot="{ mutate, variables }"
>
    <form v-on:submit.prevent="mutate" class="flex w-full gap-x-3 gap-y-5 max-sm:flex-col confira-coupon">
        <x-rapidez-ct::input
            :label="false"
            class="w-60 max-sm:w-full"
            name="couponCode"
            :placeholder="__('Enter code') . '...'"
            v-model="variables.coupon_code"
            v-bind:disabled="$root.loading"
            required
        />
        <x-rapidez-ct::button type="submit" class="w-full">
            @lang('Apply')
        </x-rapidez-ct::button>
    </form>
</graphql-mutation>
