<x-rapidez-ct::slide-in>
    <label
        for="slide-in"
        class="absolute z-10 w-7 h-7 right-3 top-5 peer-checked:text-primary"
    >
        <x-heroicon-o-x-mark class="text-muted w-7 h-7" />
    </label>
    <x-rapidez-ct::title class="mb-4">
        @lang('Overview')
    </x-rapidez-ct::title>
    <x-rapidez-ct::summary />
    @include('rapidez-ct::cart.partials.sidebar.payment')
    @include('rapidez-ct::cart.partials.sidebar.usps')
    <x-rapidez-ct::slide-in.partials.drawer-border class="bg-primary/20 bottom-2 inset-x-0"/>
</x-rapidez-ct::slide-in>