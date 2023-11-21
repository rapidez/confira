<x-rapidez-ct::slide-in>
    <div class="absolute top-0 inset-x-0 h-1.5 bg-primary"></div>
    <label
        for="slide-in"
        class="absolute z-10 w-7 h-7 right-3 top-5 peer-checked:text-ct-primary"
    >
        <x-heroicon-o-x-mark class="text-ct-inactive w-7 h-7" />
    </label>
    <x-rapidez-ct::title class="uppercase mb-4">
        @lang('Overview')
    </x-rapidez-ct::title>
    <x-rapidez-ct::summary />
    @include('rapidez-ct::cart.partials.sidebar.payment')
    @include('rapidez-ct::cart.partials.sidebar.usps')
    <x-rapidez-ct::slide-in.partials.drawer-border class="bg-ct-primary/10 bottom-2 inset-x-0"/>
</x-rapidez-ct::slide-in>