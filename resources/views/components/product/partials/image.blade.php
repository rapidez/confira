<div class="flex shrink-0 h-28 w-28 !p-0">
    <img v-if="item.product.image" class="object-contain" :alt="item.product.name" :src="'/storage/{{ config('rapidez.store') }}/resizes/200/magento' + item.product.image.url.replace(config.media_url, '') + '.webp'">
    <x-rapidez::no-image v-else />
</div>
