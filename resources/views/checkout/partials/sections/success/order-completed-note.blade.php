<p class="text-base font-medium">
    @lang('We will get to work for you right away')
</p>
<p class="mt-2 text-sm">
    @lang('We will send a confirmation of your order :orderid to :email', ['orderid' => '@{{ order.number }}', 'email' => '<strong>@{{ order.email }}</strong>'])
</p>
