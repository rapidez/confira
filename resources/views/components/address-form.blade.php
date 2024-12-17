@props(['type' => 'shipping', 'address' => 'variables', 'countryKey' => 'country_code'])

<div class="grid gap-4 sm:gap-5 grid-cols-6">
    <x-rapidez-ct::input
        name="{{ $type }}_firstname"
        label="Firstname"
        v-model="{{ $address }}.firstname"
        @class([
            'max-sm:col-span-3 col-span-2',
            '!col-span-full sm:!col-span-3' => !Rapidez::config('customer/address/middlename_show', 0),
        ])
        required
        :placeholder="__('Firstname')"
    />

    @if (Rapidez::config('customer/address/middlename_show', 0))
        <x-rapidez-ct::input
            class="col-span-3 sm:col-span-2"
            name="{{ $type }}_middlename"
            label="Middlename"
            v-model="{{ $address }}.middlename"
            :placeholder="__('Middlename')"
        />
    @endif
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-2"
        name="{{ $type }}_lastname"
        label="Lastname"
        v-model="{{ $address }}.lastname"
        required
        :placeholder="__('Lastname')"
        @class([
            'col-span-full sm:col-span-2',
            'sm:!col-span-3' => !Rapidez::config('customer/address/middlename_show', 0),
        ])
    />
    @if (Rapidez::config('customer/address/telephone_show', 'req'))
        <x-rapidez-ct::input
            class="col-span-full sm:col-span-3"
            name="{{ $type }}_telephone"
            label="Telephone"
            v-model="{{ $address }}.telephone"
            :required="Rapidez::config('customer/address/telephone_show', 'req') == 'req'"
            :placeholder="__('Telephone')"
        />
    @endif

    <label class="col-span-full sm:col-span-3">
        <x-rapidez-ct::input.select.country
            :label="__('Country')"
            v-model="{{ $address }}.{{ $countryKey }}"
            required
            :placeholder="__('Country')"
            name="{{ $type }}_country"
        />
    </label>
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-2"
        name="{{ $type }}_postcode"
        label="Postcode"
        v-model="{{ $address }}.postcode"
        v-on:change="window.app.$emit('postcode-change', {{ $address }})"
        required
        :placeholder="__('Postcode')"
    />
    @if (Rapidez::config('customer/address/street_lines', 3) >= 2)
        <x-rapidez-ct::input
            class="col-span-3 sm:col-span-2"
            name="{{ $type }}_housenumber"
            label="Housenumber"
            v-model="{{ $address }}.street[1]"
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
            v-model="{{ $address }}.street[2]"
            :placeholder="__('Addition')"
        />
    @endif
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-3"
        name="{{ $type }}_street"
        label="Street"
        v-model="{{ $address }}.street[0]"
        required
        :placeholder="__('Street')"
    />
    <x-rapidez-ct::input
        class="col-span-full sm:col-span-3"
        name="{{ $type }}_city"
        label="City"
        v-model="{{ $address }}.city"
        required
        :placeholder="__('City')"
    />

    @if (Rapidez::config('customer/address/company_show', 0) || Rapidez::config('customer/address/taxvat_show', 0))
        @if (Rapidez::config('customer/address/company_show', 0))
            <x-rapidez-ct::input
                class="col-span-3"
                name="{{ $type }}_company"
                label="Company"
                v-model="{{ $address }}.company"
                :placeholder="__('Company')"
            />
        @endif

        @if(Rapidez::config('customer/address/taxvat_show', 0))
            <x-rapidez-ct::input
                class="col-span-3"
                name="{{ $type }}_vat_id"
                label="Tax ID"
                v-model="{{ $address }}.vat_id"
                :required="Rapidez::config('customer/address/taxvat_show', 0) == 'req'"
                :placeholder="__('Tax ID')"
            />
        @endif
    @endif
</div>
