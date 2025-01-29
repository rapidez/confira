@slots(['header', 'sidebar'])
<div class="fixed -top-px h-1.5 inset-x-0 w-full bg-primary z-20"></div>
<div {{ $attributes->class('flex flex-wrap gap-x-20 text-sm max-lg:flex-col min-h-dvh') }}>
    <div class="flex flex-wrap max-xl:flex-col flex-1 max-lg:mb-10 max-lg:pt-6 max-lg:container">
        {{ $header }}
        <div class="flex-1 pt-6 lg:pt-3 xl:pt-12 lg:pb-28">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar class="sticky top-0 flex flex-col justify-start max-lg:hidden lg:ml-20 lg:h-screen !space-y-0">
        <div class="absolute -left-20 inset-y-0 bg-primary/10 w-screen"></div>
        <div class="overflow-y-auto overflow-x-hidden flex flex-1 scrollbar-hide lg:pt-20 xl:pt-10">
            <div class="flex flex-1">
                <div class="sticky flex flex-col flex-1 top-12">
                    {{ $sidebar }}
                </div>
            </div>
        </div>
    </x-rapidez-ct::layout.sidebar>
    <div class="lg:hidden">
        @include('rapidez-ct::checkout.partials.sidebar.bottom-links')
    </div>
</div>