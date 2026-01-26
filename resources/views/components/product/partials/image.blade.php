<div class="flex shrink-0 size-20 !p-0 sm:size-28">
    <img
        v-if="item.configured_variant?.image"
        class="object-contain"
        :alt="item.product.name"
        :src="resizedPath(item.configured_variant?.image.url + '.webp', '200')"
    />
    <img
        v-else-if="item.product.image"
        class="object-contain"
        :alt="item.product.name"
        :src="resizedPath(item.product.image.url + '.webp', '200')"
    />
    <x-rapidez::no-image v-else="" />
</div>
