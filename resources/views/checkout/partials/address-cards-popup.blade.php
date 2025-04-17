<input type="checkbox" id="popup" class="peer hidden"/>
<div class="fixed inset-0 opacity-0 transition z-50 flex justify-center items-center pointer-events-none peer-checked:opacity-100 peer-checked:pointer-events-auto">
    <x-rapidez-ct::sections class="relative z-10 bg-white p-6 md:px-9 md:pt-7 md:pb-9 rounded-xl">
        <x-rapidez-ct::card.inactive class="!pb-0 !mb-0 !border-b-0">
            <x-rapidez-ct::title class="mb-5">@lang('My addresses')</x-rapidez-ct::title>
            <label class="absolute cursor-pointer top-7 right-7 w-5 h-5" for="popup">
                <x-heroicon-o-x-mark/>
            </label>
            @include('rapidez-ct::checkout.partials.address-card')
        </x-rapidez-ct::card.inactive>
    </x-rapidez-ct::sections>
    <label class="absolute cursor-pointer inset-0 bg-backdrop" for="popup"></label>
</div>
