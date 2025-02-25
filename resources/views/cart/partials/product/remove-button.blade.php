<graphql-mutation
    :query="'mutation ($cart_id: String!, $cart_item_id: Int) { removeItemFromCart(input: { cart_id: $cart_id, cart_item_id: $cart_item_id }) { cart { ...cart } } } ' + config.fragments.cart"
    :variables="{ cart_id: mask, cart_item_id: item.id }"
    :notify="{ message: item.product.name+' '+config.translations.cart.remove }"
    :callback="updateCart"
    :error-callback="checkResponseForExpiredCart"
    v-slot="{ mutate }"
>
    <button v-on:click="mutate" class="mt-1 text-xs" :dusk="'item-delete-' + index" title="{{ __('Remove') }}">
        <x-heroicon-o-trash class="text-muted w-5"/>
    </button>
</graphql-mutation>
