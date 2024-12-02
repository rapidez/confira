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
                'aspect-square w-3 rounded',
                'bg-ct-primary cursor-pointer' => $currentStepKey < $checkoutStepKey,
                'bg-ct-border pointer-events-none' => $checkoutStepKey > $currentStepKey,
                'outline-4 outline outline-ct-primary/20' => $checkoutStepKey === $currentStepKey
            ])
        ></a>
    @endforeach
</div>
