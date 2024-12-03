@slots(['header', 'sidebar'])
<div class="fixed -top-px h-1.5 inset-x-0 w-full bg-ct-primary z-20"></div>
<div {{ $attributes->class('text-ct-neutral flex flex-wrap gap-x-20 text-sm max-lg:flex-col') }}>
    <div class="flex flex-wrap max-xl:flex-col flex-1 max-lg:mb-10 max-lg:pt-6">
        {{ $header }}
        <div class="flex-1 pt-6 lg:pt-12 lg:pb-28">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar class="sticky top-0 flex flex-col justify-start pt-10 max-lg:hidden lg:ml-20 lg:h-screen xl:pt-12">
        <div class="absolute -left-20 inset-y-0 bg-ct-primary-100 w-screen"></div>
        <div class="overflow-y-auto overflow-x-hidden flex flex-1 scrollbar-hide">
            <div class="flex flex-1 lg:pb-6">
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