@aware(['checkoutSteps', 'currentStep', 'currentStepKey'])
@php($steps = config('rapidez.frontend.checkout_steps.' . config('rapidez.store_code'), config('rapidez.checkout_steps.' . config('rapidez.store_code'), config('rapidez.checkout_steps.default'))))
<div class="flex items-center space-x-3.5 md:space-x-4 text-xs" v-cloak>
    {{-- <span class="whitespace-nowrap font-medium text-ct-inactive">
        @lang('Step :step / :total', [
            'step' => $currentStepKey + 1,
            'total' => count($steps) - 1,
        ])
    </span>
    @foreach (array_slice($steps, 0, -1) as $stepTitle)
        <div
            class="aspect-square w-3 rounded"
            v-on:click="goToStep({{ $stepTitle == 'Credentials' ? 3 : $loop->index }})"
            :class="{
                'bg-ct-primary cursor-pointer': {{ $loop->index + 1 }} <= $currentStepKey + 1,
                'bg-ct-border pointer-events-none': {{ $loop->index + 1 }} > $currentStepKey + 1,
                'outline-4 outline outline-ct-primary/20': {{ $loop->index + 1 }} === $currentStepKey + 1
            }"
        ></div>
    @endforeach --}}
</div>
