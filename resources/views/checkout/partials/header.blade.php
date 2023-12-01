@include('rapidez-ct::components.slide-in.receipt')
<div class="flex flex-wrap gap-y-3 max-lg:-mt-5 lg:mr-20">
    <x-rapidez-ct::button.outline v-if="checkout.step == 2" class="flex items-center justify-center !p-0 w-12 h-12 md:hidden" :href="route('cart')">
        <x-heroicon-o-arrow-long-left class="w-6 h-6"/>
    </x-rapidez-ct::button.outline>
    <x-rapidez-ct::button.outline v-else class="flex items-center justify-center !p-0 w-12 h-12 md:hidden" v-on:click.prevent="goToStep(1)">
        <x-heroicon-o-arrow-long-left class="w-6 h-6"/>
    </x-rapidez-ct::button.outline>

    <div class="flex md:w-24 [&>*]:w-auto [&>*]:h-auto max-md:flex-1 max-md:h-12">
        <a href="{{ url('/') }}" class="sticky top-0 max-md:mx-5 flex items-center md:self-start max-md:flex-1 md:pt-4">
            <div class="w-inherit flex-1">
                <x-rapidez-ct::logo />
            </div>
        </a>
    </div>
    <x-rapidez-ct::button.inactive for="slide-in" class="md:hidden">
        <span class="relative">
            <span class="absolute flex items-center justify-center w-4 h-4 -right-2 -top-1.5 rounded-full bg-ct-primary text-white text-xs">
                @{{ Math.round(cart.items_qty) }}
            </span>
            <x-heroicon-o-shopping-cart class="w-6 h-6"/>
        </span>
        @lang('My order')
    </x-rapidez-ct::button.inactive>
</div>
