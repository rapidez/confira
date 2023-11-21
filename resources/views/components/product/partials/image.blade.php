<div class="flex shrink-0 h-28 w-28 !p-0">
    <img v-if="item.image" class="object-contain" :alt="item.name" :src="'/storage/{{ config('rapidez.store') }}/resizes/200/magento/catalog/product' + item.image + '.webp'">
    <x-rapidez::no-image v-else />
</div>