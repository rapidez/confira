<div {{ $attributes->class('flex items-center font-medium') }}>
    <div class="flex items-center justify-end gap-x-7">
        @include('rapidez-ct::cart.partials.product.remove-button')
        <x-rapidez-ct::input.quantity />
    </div>
    <div class="flex flex-col w-24 pl-2 ml-auto">
        @include('rapidez-ct::components.product.partials.price')
    </div>
</div>
