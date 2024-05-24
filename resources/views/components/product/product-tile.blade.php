@slots(['name', 'quantity'])

<div {{ $attributes->class('divide-y divide-dashed [&>:first-child]:pt-0') }}>
    <div v-for="(item, index) in cart.items" class="flex gap-y-5 py-5 lg:pb-4 lg:pt-5">
        @include('rapidez-ct::components.product.partials.image')
        <div class="flex flex-wrap items-start justify-between gap-x-2 gap-y-4 w-full ml-2">
            @isset($name)
                {{ $name }}
            @endisset
            @isset($quantity)
                {{ $quantity }}
            @endisset
        </div>
    </div>
</div>
