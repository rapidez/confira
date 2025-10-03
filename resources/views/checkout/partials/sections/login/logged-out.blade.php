<checkout-login v-slot="checkoutLogin">
    <fieldset partial-submit="go" class="grid gap-4 sm:gap-5 md:items-end md:grid-cols-2">
        <x-rapidez-ct::label.animated>
            <x-slot:label>
                @lang('Email')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="email"
                type="email"
                v-model="checkoutLogin.email"
                v-bind:disabled="loggedIn"
                class="justify-center"
                required
                placeholder
            />
        </x-rapidez-ct::label.animated>
    </fieldset>
</checkout-login>
