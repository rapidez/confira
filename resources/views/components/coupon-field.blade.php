<graphql-mutation
    :query="'mutation ($cart_id: String!, $coupon_code: String!) { applyCouponToCart(input: { cart_id: $cart_id, coupon_code: $coupon_code })  { cart { ...cart } } } ' + config.fragments.cart"
    :variables="{ cart_id: mask, coupon_code: '' }"
    :notify="{ message: config.translations.cart.coupon.applied }"
    :clear="true"
    :watch="false"
    :callback="updateCart"
    v-slot="{ mutate, variables }"
>
    <form v-on:submit.prevent="mutate" class="flex w-full gap-y-3 flex-col">
        <x-rapidez-ct::label.animated class="flex-1 max-md:w-full">
            <x-slot:label>
                @lang('Enter code')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="couponCode"
                placeholder
                v-model="variables.coupon_code"
                v-bind:disabled="$root.loading"
                required
            />
        </x-rapidez-ct::label.animated>

        <x-rapidez::button.outline type="submit" class="w-full self-center" data-testid="apply-coupon">
            @lang('Apply')
        </x-rapidez::button.outline>
    </form>
</graphql-mutation>
