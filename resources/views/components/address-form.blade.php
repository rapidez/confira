@props(['type' => 'shipping', 'address' => 'variables', 'countryKey' => 'country_code', 'region' => 'region_id'])

<div class="grid gap-4 sm:gap-5 grid-cols-6">
    <x-rapidez-ct::label.animated
        @class([
            'sm:col-span-2 col-span-3' => Rapidez::config('customer/address/middlename_show', 0),
            'col-span-full sm:col-span-3' => !Rapidez::config('customer/address/middlename_show', 0),
        ])
    >
        <x-slot:label>
            @lang('Firstname')
        </x-slot:label>
        <x-rapidez-ct::input.animated
            name="{{ $type }}_firstname"
            v-model="{{ $address }}.firstname"
            required
            placeholder
        />
    </x-rapidez-ct::label.animated>

    @if (Rapidez::config('customer/address/middlename_show', 0))
        <x-rapidez-ct::label.animated class="col-span-3 sm:col-span-2">
            <x-slot:label>
                @lang('Middlename')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="{{ $type }}_middlename"
                v-model="{{ $address }}.middlename"
                placeholder
            />
        </x-rapidez-ct::label.animated>
    @endif

    <x-rapidez-ct::label.animated
        @class([
            'col-span-full',
            'sm:col-span-2' => Rapidez::config('customer/address/middlename_show', 0),
            'sm:col-span-3' => !Rapidez::config('customer/address/middlename_show', 0),
        ])
    >
        <x-slot:label>
            @lang('Lastname')
        </x-slot:label>
        <x-rapidez-ct::input.animated
            name="{{ $type }}_lastname"
            v-model="{{ $address }}.lastname"
            required
            placeholder
        />
    </x-rapidez-ct::label.animated>

    @if (Rapidez::config('customer/address/telephone_show', 'req'))
        <x-rapidez-ct::label.animated class="col-span-full sm:col-span-3">
            <x-slot:label>
                @lang('Telephone')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="{{ $type }}_telephone"
                v-model="{{ $address }}.telephone"
                placeholder
                :required="Rapidez::config('customer/address/telephone_show', 'req') == 'req'"
            />
        </x-rapidez-ct::label.animated>
    @endif

    <x-rapidez-ct::label.animated class="col-span-full sm:col-span-3">
        <x-slot:label>
            @lang('Country')
        </x-slot:label>
        <x-rapidez-ct::input.select.country
            v-model="{{ $address }}.{{ $countryKey }}"
            required
            placeholder
            name="{{ $type }}_country"
        />
    </x-rapidez-ct::label.animated>

    <x-rapidez-ct::label.animated class="col-span-full sm:col-span-2">
        <x-slot:label>
            @lang('Postcode')
        </x-slot:label>
        <x-rapidez-ct::input.animated
            name="{{ $type }}_postcode"
            v-model="{{ $address }}.postcode"
            v-on:change="window.app.$emit('postcode-change', {{ $address }})"
            required
            placeholder
        />
    </x-rapidez-ct::label.animated>


    @if (Rapidez::config('customer/address/street_lines', 3) >= 2)
        <x-rapidez-ct::label.animated class="col-span-3 sm:col-span-2">
            <x-slot:label>
                @lang('Housenumber')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="{{ $type }}_housenumber"
                v-model="{{ $address }}.street[1]"
                v-on:change="window.app.$emit('postcode-change', {{ $address }})"
                type="{{ Rapidez::config('customer/address/street_lines', 3) == 3 ? 'number' : 'text' }}"
                required
                placeholder
            />
        </x-rapidez-ct::label.animated>
    @endif

    @if (Rapidez::config('customer/address/street_lines', 3) >= 3)
        <x-rapidez-ct::label.animated class="col-span-3 sm:col-span-2">
            <x-slot:label>
                @lang('Addition')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="{{ $type }}_addition"
                v-model="{{ $address }}.street[2]"
                placeholder
            />
        </x-rapidez-ct::label.animated>
    @endif

    <x-rapidez-ct::label.animated class="col-span-full sm:col-span-3">
        <x-slot:label>
            @lang('Street')
        </x-slot:label>
        <x-rapidez-ct::input.animated
            name="{{ $type }}_street"
            v-model="{{ $address }}.street[0]"
            required
            placeholder
        />
    </x-rapidez-ct::label.animated>

    <x-rapidez-ct::label.animated class="col-span-full sm:col-span-3">
        <x-slot:label>
            @lang('City')
        </x-slot:label>
        <x-rapidez-ct::input.animated
            name="{{ $type }}_city"
            v-model="{{ $address }}.city"
            required
            placeholder
        />
    </x-rapidez-ct::label.animated>

    @if (Rapidez::config('customer/address/company_show', 0) || Rapidez::config('customer/address/taxvat_show', 0))
        @if (Rapidez::config('customer/address/company_show', 0))
            <x-rapidez-ct::label.animated class="col-span-3">
                <x-slot:label>
                    @lang('Company')
                </x-slot:label>
                <x-rapidez-ct::input.animated
                    name="{{ $type }}_company"
                    v-model="{{ $address }}.company"
                    placeholder
                />
            </x-rapidez-ct::label.animated>
        @endif

        @if(Rapidez::config('customer/address/taxvat_show', 0))
            <x-rapidez-ct::label.animated class="col-span-3">
                <x-slot:label>
                    @lang('Tax ID')
                </x-slot:label>
                <x-rapidez-ct::input.animated
                    name="{{ $type }}_vat_id"
                    v-model="{{ $address }}.vat_id"
                    :required="Rapidez::config('customer/address/taxvat_show', 0) == 'req'"
                    placeholder
                />
            </x-rapidez-ct::label.animated>
        @endif
    @endif
</div>
