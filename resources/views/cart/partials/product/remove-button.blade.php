<graphql-mutation
    :query="'mutation ($cart_id: String!, $cart_item_uid: ID) { removeItemFromCart(input: { cart_id: $cart_id, cart_item_uid: $cart_item_uid }) { cart { ...cart } } } ' + config.fragments.cart"
    :variables="{ cart_id: mask.value, cart_item_uid: item.uid }"
    :notify="{ message: item.product.name+' '+config.translations.cart.remove }"
    :callback="updateCart"
    :error-callback="checkResponseForExpiredCart"
    v-slot="{ mutate }"
>
    <button
        v-on:click="mutate"
        class="mt-1 text-xs"
        title="{{ __('Remove') }}"
        data-testid="cart-item-remove"
    >
        <x-heroicon-o-trash class="text-muted w-5"/>
    </button>
</graphql-mutation>
