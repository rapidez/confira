<div class="flex flex-wrap items-center gap-3 mt-5">
    <x-rapidez-ct::button.inactive v-on:click.prevent="toggleEdit">
        @lang('Use a new address')
    </x-rapidez-ct::button.inactive>
    <x-rapidez-ct::button.inactive tag="label" for="popup" class="cursor-pointer" v-if="$root.user.addresses.length">
        @lang('My addresses')
    </x-rapidez-ct::button.inactive>
</div>