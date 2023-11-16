<div {{ $attributes->class('flex items-center font-medium') }}>
    <div class="flex items-center justify-end gap-x-7">
        <button v-on:click="remove(item)" class="text-ct-inactive mt-1 text-xs hover:underline" :dusk="'item-delete-' + index">
            <x-heroicon-o-trash class="text-inactive w-5"/>
        </button>
        <x-rapidez-ct::input.quantity />
    </div>
    <div class="flex flex-col w-20 pl-2 ml-auto">
        <div class="text-right" :class="{ 'line-through text-xs text-ct-inactive font-normal': item.specialPrice }">
            @{{ item.total | price }}
        </div>
        <div class="text-right" v-if="item.specialPrice">
            @{{ item.specialPrice | price }}
        </div>
    </div>
</div>