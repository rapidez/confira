@include('rapidez-ct::components.slide-in.receipt')
<div class="flex flex-wrap gap-y-3 max-xl:-mt-5 xl:mr-20">
    @isset($href)
        <x-rapidez-ct::button.outline class="flex items-center justify-center !p-0 size-12 lg:hidden" :$href>
            <x-heroicon-o-arrow-long-left class="size-6"/>
        </x-rapidez-ct::button.outline>
    @endif

    <div class="flex lg:w-24 *:w-auto *:h-auto max-lg:flex-1 max-lg:h-12">
        <a href="{{ url('/') }}" class="sticky top-0 max-lg:mx-5 flex items-center lg:self-start max-lg:flex-1 lg:pt-4">
            <div class="w-inherit flex-1">
                <x-rapidez-ct::logo />
            </div>
        </a>
    </div>
    <x-rapidez-ct::button.inactive for="slide-in" class="lg:hidden">
        <span class="relative">
            <span class="absolute flex items-center justify-center size-4 -right-2 -top-1.5 rounded-full bg-ct-primary text-white text-xs">
                @{{ Math.round(cart.total_quantity) }}
            </span>
            <x-heroicon-o-shopping-cart class="size-6"/>
        </span>
        @lang('My order')
    </x-rapidez-ct::button.inactive>
</div>
