<div class="flex w-full gap-x-3 gap-y-5 max-sm:flex-col confira-coupon">
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
