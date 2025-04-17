@props(['type' => 'shipping', 'address' => 'checkout.'.$type.'_address', 'countryKey' => 'country_id'])

<div class="grid gap-4 sm:gap-5 grid-cols-6">
    <x-rapidez-ct::input
        name="{{ $type }}_firstname"
        label="Firstname"
        v-model.lazy="{{ $address }}.firstname"
        @class([
            'max-sm:col-span-3 col-span-2',
            'sm:!col-span-3' => !Rapidez::config('customer/address/middlename_show', 0),
        ])
        required
        :placeholder="__('Firstname')"
    />

    @if (Rapidez::config('customer/address/middlename_show', 0))
        <x-rapidez-ct::input
            class="col-span-3 sm:col-span-2"
            name="{{ $type }}_middlename"
            label="Middlename"
            v-model.lazy="{{ $address }}.middlename"
            :placeholder="__('Middlename')"
        />
    @endif
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-2"
        name="{{ $type }}_lastname"
        label="Lastname"
        v-model.lazy="{{ $address }}.lastname"
        required
        :placeholder="__('Lastname')"
    />
    @if (Rapidez::config('customer/address/telephone_show', 'req'))
        <x-rapidez-ct::input
            class="col-span-full sm:col-span-3"
            name="{{ $type }}_telephone"
            label="Telephone"
            v-model.lazy="{{ $address }}.telephone"
            :required="Rapidez::config('customer/address/telephone_show', 'req') == 'req'"
            :placeholder="__('Telephone')"
        />
    @endif
    <x-rapidez-ct::input.country-select
        class="col-span-full sm:col-span-3"
        name="{{ $type }}_country"
        label="{{ __('Country') }}"
        v-model="{{ $address }}.{{ $countryKey }}"
        required
        :placeholder="__('Country')"
    />
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-2"
        name="{{ $type }}_postcode"
        label="Postcode"
        v-model.lazy="{{ $address }}.postcode"
        v-on:change="window.app.$emit('postcode-change', {{ $address }})"
        required
        :placeholder="__('Postcode')"
    />
    @if (Rapidez::config('customer/address/street_lines', 3) >= 2)
        <x-rapidez-ct::input
            class="col-span-3 sm:col-span-2"
            name="{{ $type }}_housenumber"
            label="Housenumber"
            v-model.lazy="{{ $address }}.street[1]"
            v-on:change="window.app.$emit('postcode-change', {{ $address }})"
            type="{{ Rapidez::config('customer/address/street_lines', 3) == 3 ? 'number' : 'text' }}"
            required
            :placeholder="__('Housenumber')"
        />
    @endif
    @if (Rapidez::config('customer/address/street_lines', 3) >= 3)
        <x-rapidez-ct::input
            class="col-span-3 sm:col-span-2"
            name="{{ $type }}_addition"
            label="Addition"
            v-model.lazy="{{ $address }}.street[2]"
            :placeholder="__('Addition')"
        />
    @endif
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-3"
        name="{{ $type }}_street"
        label="Street"
        v-model.lazy="{{ $address }}.street[0]"
        required
        :placeholder="__('Street')"
    />
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-3"
        name="{{ $type }}_city"
        label="City"
        v-model.lazy="{{ $address }}.city"
        required
        :placeholder="__('City')"
    />

    @if (Rapidez::config('customer/address/company_show', 'opt') || Rapidez::config('customer/address/taxvat_show', 0))
        @if (Rapidez::config('customer/address/company_show', 'opt'))
            <x-rapidez-ct::input
                class="col-span-3"
                name="{{ $type }}_company"
                label="Company"
                v-model.lazy="{{ $address }}.company"
                :placeholder="__('Company')"
            />
        @endif

        @if(Rapidez::config('customer/address/taxvat_show', 0))
            <x-rapidez-ct::input
                class="col-span-3"
                name="{{ $type }}_vat_id"
                label="Tax ID"
                v-model.lazy="{{ $address }}.vat_id"
                :required="Rapidez::config('customer/address/taxvat_show', 0) == 'req'"
                :placeholder="__('Tax ID')"
            />
        @endif
    @endif
</div>
