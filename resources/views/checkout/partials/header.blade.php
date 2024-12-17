<div class="lg:hidden">
    @include('rapidez-ct::components.slide-in.receipt')
</div>
<div class="flex flex-wrap gap-y-3 xl:mr-20 max-xl:justify-center">
    @isset($href)
        <x-rapidez::button.outline class="flex items-center justify-center !p-0 size-12 lg:hidden" :$href>
            <x-heroicon-o-arrow-long-left class="size-6"/>
        </x-rapidez::button.outline>
    @endif

    <div class="flex lg:w-16 xl:w-24 *:w-auto *:h-auto max-lg:flex-1 max-lg:h-12">
        <a href="{{ url('/') }}" class="sticky top-0 max-lg:mx-5 flex items-center lg:self-start max-lg:flex-1 lg:pt-4 max-w-full">
            <div class="w-inherit flex-1 *:w-auto *:h-auto *:max-w-full max-w-full h-full *:max-h-full">
                <x-rapidez-ct::logo />
            </div>
        </a>
    </div>
    <x-rapidez::button for="slide-in" class="gap-x-2.5 lg:hidden cursor-pointer">
        <span class="relative">
            <span class="absolute flex items-center font-bold justify-center size-4 -right-2 -top-1.5 rounded-full bg-primary text-white text-xs">
                @{{ Math.round(cart.total_quantity) }}
            </span>
            <x-heroicon-o-shopping-cart class="size-6"/>
        </span>
        @lang('My order')
    </x-rapidez::button>
</div>
