@aware(['checkoutSteps', 'currentStep', 'currentStepKey'])

<div class="flex flex-wrap items-baseline justify-between gap-1 mb-4">
    <x-rapidez-ct::title {{ $attributes->except(['checkoutSteps', 'currentStep', 'currentStepKey']) }}>
        {{ $slot }}
    </x-rapidez-ct::title>
    <x-rapidez-ct::progress-bar />
</div>
