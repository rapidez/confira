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

        <p v-if="checkoutLogin.isEmailAvailable" class="self-end text-muted md:min-h-14 flex items-center">
            @lang('We\'ll email your order confirmation and check if you have an account for faster checkout.')
        </p>

        <template v-if="!loggedIn && (!checkoutLogin.isEmailAvailable || checkoutLogin.createAccount)">
            <x-rapidez-ct::input.password
                name="password"
                v-model="checkoutLogin.password"
                required
            />
        </template>
        <p v-if="!loggedIn && !checkoutLogin.isEmailAvailable" class="self-end text-muted">
            @lang('You already have an account with this e-mail address. Please log in to continue.')
            <a href="{{ route('account.forgotpassword') }}" class="underline hover:no-underline">@lang('Forgot your password?')</a>
        </p>
        @if (App::providerIsLoaded('Rapidez\Account\AccountServiceProvider'))
            <a href="{{ route('account.forgotpassword') }}" class="inline-block text-sm hover:underline mt-5" v-if="!checkoutLogin.isEmailAvailable">
                @lang('Forgot your password?')
            </a>
        @endif
        <template v-if="!loggedIn && checkoutLogin.createAccount">
            <x-rapidez-ct::input.password
                name="password_repeat"
                v-model="checkoutLogin.password_repeat"
                required
            />

            <x-rapidez-ct::label.animated>
                <x-slot:label>
                    @lang('Firstname')
                </x-slot:label>
                <x-rapidez-ct::input.animated
                    name="firstname"
                    type="text"
                    v-model="checkoutLogin.firstname"
                    required
                    placeholder
                />
            </x-rapidez-ct::label.animated>

            <x-rapidez-ct::label.animated>
                <x-slot:label>
                    @lang('Lastname')
                </x-slot:label>
                <x-rapidez-ct::input.animated
                    name="lastname"
                    type="text"
                    v-model="checkoutLogin.lastname"
                    required
                    placeholder
                />
            </x-rapidez-ct::label.animated>
        </template>

        <template v-if="!loggedIn && checkoutLogin.isEmailAvailable">
            <div class="col-span-full">
                <x-rapidez::input.checkbox v-model="checkoutLogin.createAccount" dusk="create_account">
                    @lang('Create an account')
                </x-rapidez::input.checkbox>
            </div>
        </template>

        <x-rapidez::button.primary type="button" v-on:click="checkoutLogin.go" v-if="checkoutLogin.isEmailAvailable && checkoutLogin.createAccount" dusk="register">
            @lang('Register')
        </x-rapidez::button.primary>
        <x-rapidez::button.primary type="button" v-on:click="checkoutLogin.go" v-if="!checkoutLogin.isEmailAvailable" dusk="register">
            @lang('Login')
        </x-rapidez::button.primary>
    </fieldset>
</checkout-login>
