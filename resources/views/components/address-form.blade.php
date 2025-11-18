@props(['type' => 'shipping', 'address' => 'variables', 'countryKey' => 'country_code', 'region' => 'region_id', 'showList' => false])
@php($prefix = $type ? $type.'_' : '')

<div class="grid gap-4 sm:gap-5 grid-cols-6">
    @if ($showList)
        <div class="col-span-full" v-if="window.app.config.globalProperties.loggedIn.value">
            <graphql query="{ customer { addresses { id firstname lastname street city postcode country_code } } }" v-slot="{ data }">
                <div v-if="data">
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

    <div class="contents" v-if="!window.app.config.globalProperties.loggedIn.value || !variables.customer_address_id">
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
                v-on:change="window.$emit('rapidez:postcode-change', {{ $address }})"
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
                    v-on:change="window.$emit('rapidez:postcode-change', {{ $address }})"
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

        @if ((Rapidez::config('customer/address/company_show')) || (Rapidez::config('customer/address/taxvat_show')))
            <div class="col-span-full">
                <div class="font-bold mb-2">@lang('Order type')</div>
                <x-rapidez::input.radio.base id="private-{{ $type }}" type="radio" name="order-type-{{ $type }}" class="peer/private hidden" v-bind:checked="!variables.company" />
                <x-rapidez::button.toggle for="private-{{ $type }}" class="peer-checked/private:ring-1 peer-checked/private:ring-primary peer-checked/private:bg-primary/10 peer-checked/private:border-primary">
                    <x-rapidez::label class="mb-0 inline">
                        @lang('Private')
                    </x-rapidez::label>
                </x-rapidez::button.toggle>

                <x-rapidez::input.radio.base id="business-{{ $type }}" type="radio" name="order-type-{{ $type }}" class="peer/business hidden" v-bind:checked="variables.company" />
                <x-rapidez::button.toggle for="business-{{ $type }}" class="peer-checked/business:ring-1 peer-checked/business:ring-primary peer-checked/business:bg-primary/10 peer-checked/business:border-primary">
                    <x-rapidez::label class="mb-0 inline">
                        @lang('Business')
                    </x-rapidez::label>
                </x-rapidez::button.toggle>

                <div class="grid p-1.5 -mx-1.5 col-span-12 grid-cols-12 gap-5 mt-3 transition-all duration-300 ease-in-out overflow-hidden opacity-100 h-auto peer-checked/private:opacity-0 peer-checked/private:h-0 peer-checked/private:invisible">
                    @if (Rapidez::config('customer/address/company_show'))
                        <div class="col-span-12 sm:col-span-6">
                            <x-rapidez-ct::label.animated>
                                <x-slot:label>@lang('Company')</x-slot:label>
                                <x-rapidez-ct::input.animated
                                    name="{{ $prefix }}company"
                                    v-model="variables.company"
                                    :required="Rapidez::config('customer/address/company_show') == 'req'"
                                    placeholder
                                />
                            </x-rapidez-ct::label.animated>
                        </div>
                    @endif
                    @if (Rapidez::config('customer/address/taxvat_show'))
                        <div class="col-span-12 sm:col-span-6">
                            <x-rapidez-ct::label.animated>
                                <x-slot:label>@lang('Tax ID')</x-slot:label>
                                <x-rapidez-ct::input.animated
                                    name="{{ $prefix }}vat_id"
                                    v-model="variables.vat_id"
                                    v-on:change="window.$emit('rapidez:vat-change', $event)"
                                    :required="Rapidez::config('customer/address/taxvat_show') == 'req'"
                                    placeholder
                                />
                            </x-rapidez-ct::label.animated>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
