<ul class="mt-4 flex flex-col gap-1 text-sm *:flex *:gap-x-2">
    @foreach (['Ordered before 7:00 PM, delivered tomorrow', 'Free shipping from €65', 'Free and easy returns', 'Rated 8.7/10'] as $usp)
        <li>
            <x-heroicon-o-check stroke-width="3.2" class="mt-0.5 h-4 shrink-0 text-primary" />
            <span>@lang($usp)</span>
        </li>
    @endforeach
</ul>
