<div class="flex flex-wrap items-center gap-3 mt-5">
    <x-rapidez::button v-on:click.prevent="toggleEdit">
        @lang('Use a new address')
    </x-rapidez::button>
    <x-rapidez::button tag="label" for="popup" class="cursor-pointer" v-if="data?.customer?.addresses?.length">
        @lang('My addresses')
    </x-rapidez::button>
</div>