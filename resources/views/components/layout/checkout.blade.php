@slots(['header', 'sidebar'])
<div class="fixed -top-px h-1.5 inset-x-0 w-full bg-ct-primary z-20"></div>
<div {{ $attributes->class('text-ct-neutral flex flex-wrap gap-x-20 text-sm max-md:flex-col') }}>
    <div class="flex flex-wrap max-lg:flex-col flex-1 max-md:mb-10 max-md:pt-6">
        {{ $header }}
        <div class="flex-1 pt-6 md:pt-12 md:pb-28">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar class="sticky top-0 flex flex-col justify-start pt-10 max-md:hidden md:ml-20 md:h-screen lg:pt-12">
        <div class="flex flex-1 md:pb-6">
            <div class="sticky flex flex-col flex-1 top-12">
                {{ $sidebar }}
            </div>
        </div>
    </x-rapidez-ct::layout.sidebar>
    <div class="md:hidden">
        @include('rapidez-ct::checkout.partials.sidebar.bottom-links')
    </div>
</div>

<div class="fixed inset-0 overflow-hidden -z-10 pointer-events-none max-md:hidden">
    <div class="container flex justify-end">
        <x-rapidez-ct::layout.sidebar class="h-screen relative">
            <div class="absolute -left-20 bg-ct-primary-100 w-screen inset-y-0"></div>
        </x-rapidez-ct::layout.sidebar>
    </div>
</div>
