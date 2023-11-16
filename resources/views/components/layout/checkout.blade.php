@slots(['header', 'sidebar'])
<div class="fixed -top-px h-1.5 inset-x-0 w-full bg-primary z-20"></div>
<div {{ $attributes->class('text-ct-primary flex flex-wrap gap-x-20 text-sm max-md:flex-col') }}>
    <div class="flex flex-wrap max-lg:flex-col flex-1 max-lg:pt-6">
        {{ $header }}
        <div class="flex-1 pt-6 lg:pt-12 lg:pb-28">
            {{ $slot }}
        </div>
    </div>
    <x-rapidez-ct::layout.sidebar class="md:h-screen sticky top-0 flex flex-col justify-start md:ml-20 pt-10 lg:pt-12">
        <div class="flex flex-1 pb-6">
            <div class="sticky flex flex-col flex-1 top-12">
                {{ $sidebar }}
            </div>
        </div>
    </x-rapidez-ct::layout.sidebar>
</div>

<div class="fixed inset-0 overflow-hidden -z-10 pointer-events-none max-md:hidden">
    <div class="container flex justify-end">
        <x-rapidez-ct::layout.sidebar class="h-screen relative">
            <div class="absolute -left-20 bg-primary-100 w-screen inset-y-0"></div>
        </x-rapidez-ct::layout.sidebar>
    </div>
</div>
