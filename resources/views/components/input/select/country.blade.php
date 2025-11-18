<graphql query="{ countries { two_letter_abbreviation full_name_locale } }" cache="countries" v-slot="{ data }">
    <div v-if="data">
        <x-rapidez-ct::input.select :$attributes :label="__('Country')">
            <option v-for="country in data.countries.toSorted((a, b) => a.full_name_locale?.localeCompare(b.full_name_locale))" :value="country.two_letter_abbreviation.toUpperCase()">
                @{{ country.full_name_locale || country.two_letter_abbreviation }}
            </option>
        </x-rapidez-ct::input.select>
    </div>
</graphql>
