<toggler>
    <div slot-scope="{ isOpen, toggle }">
        <coupon v-show="isOpen" v-slot="{ cart, removeCoupon, couponCode, inputEvents, applyCoupon, submitError }">
            <form class="text-sm" @submit.prevent="applyCoupon">
                <div class="flex w-full gap-x-3 gap-y-5 max-sm:flex-col">
                    <x-rapidez-ct::input
                        class="w-60 max-sm:w-full"
                        name="couponCode"
                        label="Apply discount code"
                        :placeholder="__('Enter code') . '...'"
                        v-on="inputEvents"
                        v-bind:value="couponCode"
                        v-bind:disabled="$root.loading"
                        required
                    />
                    <x-rapidez-ct::button.outline type="submit" class="w-full" loader>
                        @lang('Apply')
                    </x-rapidez-ct::button.outline>
                </div>
                <div v-if="cart.discount_name && cart.discount_amount < 0" class="text-ct-inactive mt-1 flex items-center gap-x-2">
                    <button v-on:click="removeCoupon">
                        <x-heroicon-s-x-mark class="h-4 w-4" />
                    </button>
                    @lang('Discount'): @{{ cart.discount_name }}
                </div>
                <div v-if="submitError" class="text-ct-error mt-1 italic">
                    @{{ submitError }}
                </div>
            </form>
        </coupon>
        <x-rapidez-ct::button.outline v-show="!isOpen" @click="toggle" class="w-full">
            @lang('Apply discount code')
        </x-rapidez-ct::button.outline>
    </div>
</toggler>
