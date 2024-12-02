@aware(['checkoutSteps', 'currentStep', 'currentStepKey'])
<div class="flex items-center space-x-3.5 md:space-x-4 text-xs" v-cloak>
    <span class="whitespace-nowrap font-medium text-ct-inactive">
        @lang('Step :step / :total', [
            'step' => $currentStepKey + 1,
            'total' => count($checkoutSteps),
        ])
    </span>
    @foreach ($checkoutSteps as $checkoutStepKey => $checkoutStep)
        <a
            href="{{ route('checkout', $checkoutStep) }}"
            @class([
                'bg-ct-accent aspect-square w-3 rounded',
                '!bg-ct-disabled pointer-events-none' => $currentStepKey < $checkoutStepKey,
                'outline-4 outline outline-ct-accent/20' => $checkoutStepKey === $currentStepKey
            ])
        ></a>
    @endforeach
</div>
