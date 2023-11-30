<x-rapidez-ct::card.inactive class="!bg-ct-primary-100 py-8 px-6 rounded-xl !border-b-0">
    <p class="text-base text-neutral font-medium">
        @lang('We will get to work for you right away')
    </p>
    <p class="mt-4 text-sm">
        @lang('We will send a confirmation of your order :orderid to <strong>:email</strong>', ['orderid' => '@{{ order.increment_id }}', 'email' => '@{{ order.customer_email }}'])
    </p>
</x-rapidez-ct::card.inactive>
