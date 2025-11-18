<checkout-login v-slot="checkoutLogin">
    <fieldset partial-submit v-on:partial-submit="async () => await checkoutLogin.go()" class="grid gap-4 sm:gap-5 md:items-end md:grid-cols-2">
        <x-rapidez-ct::label.animated class="col-span-full">
            <x-slot:label>
                @lang('Email')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="email"
                type="email"
                v-model.lazy="checkoutLogin.email"
                v-bind:disabled="window.app.config.globalProperties.loggedIn.value"
                class="justify-center"
                required
                placeholder
            />
        </x-rapidez-ct::label.animated>
    </fieldset>
    <p v-if="checkoutLogin.isEmailAvailable" class="self-end text-muted">
        @lang('We will only use your information to communicate with you about your order.')
    </p>
</checkout-login>
