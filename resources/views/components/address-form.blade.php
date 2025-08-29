@props(['type' => 'shipping', 'address' => 'variables', 'countryKey' => 'country_code', 'region' => 'region_id', 'showList' => false])

<div class="grid gap-4 sm:gap-5 grid-cols-6">
    @if ($showList)
        <div class="col-span-full" v-if="$root.loggedIn">
            <graphql query="{ customer { addresses { id firstname lastname street city postcode country_code } } }">
                <div v-if="data" slot-scope="{ data }">
                    <x-rapidez-ct::input.select v-model="variables.customer_address_id">
                        <option v-for="address in data.customer.addresses" :value="address.id">
                            @{{ address.firstname }} @{{ address.lastname }}
                            - @{{ address.street[0] }} @{{ address.street[1] }} @{{ address.street[2] }}
                            - @{{ address.postcode }}
                            - @{{ address.city }}
                            - @{{ address.country_code }}
                        </option>
                        <option :value="null">@lang('New address')</option>
                    </x-rapidez-ct::input.select>
                </div>
            </graphql>
        </div>
    @endif

    <div class="contents" v-if="!$root.loggedIn || !variables.customer_address_id">
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
                v-model.lazy="{{ $address }}.firstname"
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
                    v-model.lazy="{{ $address }}.middlename"
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
                v-model.lazy="{{ $address }}.lastname"
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
                    v-model.lazy="{{ $address }}.telephone"
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
        <x-rapidez-ct::label.animated class="col-span-full sm:col-span-3 has-[.exists]:block hidden">
            <x-slot:label>
                @lang('Region')
            </x-slot:label>
            <x-rapidez::input.select.region
                class="exists"
                name="{{ $type }}_region"
                v-model="{{ $address }}.{{ $region }}"
                country="{{ $address }}.{{ $countryKey }}"
            />
        </x-rapidez-ct::label.animated>

        <x-rapidez-ct::label.animated class="col-span-full sm:col-span-2">
            <x-slot:label>
                @lang('Postcode')
            </x-slot:label>
            <x-rapidez-ct::input.animated
                name="{{ $type }}_postcode"
                v-model.lazy="{{ $address }}.postcode"
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
                    v-model.lazy="{{ $address }}.street[1]"
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
                    v-model.lazy="{{ $address }}.street[2]"
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
                v-model.lazy="{{ $address }}.street[0]"
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
                v-model.lazy="{{ $address }}.city"
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
                        v-model.lazy="{{ $address }}.company"
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
                        v-model.lazy="{{ $address }}.vat_id"
                        :required="Rapidez::config('customer/address/taxvat_show', 0) == 'req'"
                        placeholder
                    />
                </x-rapidez-ct::label.animated>
            @endif
        @endif
    </div>
</div>
