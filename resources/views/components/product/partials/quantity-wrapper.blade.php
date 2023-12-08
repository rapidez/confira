<div {{ $attributes->class('flex items-center font-medium') }}>
    <div class="flex items-center justify-end gap-x-7">
        <button v-on:click="remove(item)" class="text-ct-inactive mt-1 text-xs hover:underline" :dusk="'item-delete-' + index" title="{{ __('Remove') }}">
            <x-heroicon-o-trash class="text-inactive w-5"/>
        </button>
        <x-rapidez-ct::input.quantity />
    </div>
    <div class="flex flex-col w-20 pl-2 ml-auto">
        @include('rapidez-ct::components.product.partials.price')
    </div>
</div>
