@props(['label' => null, 'heading', 'subheading' => null, 'centered' => true])

<div class="{{ $centered ? 'text-center' : '' }} mb-12">
    @if($label)
        <span class="inline-block bg-accent/10 text-accent font-semibold text-xs uppercase tracking-widest rounded-full px-4 py-1.5 mb-4">
            {{ $label }}
        </span>
    @endif
    <h2 class="font-display text-3xl lg:text-4xl font-bold text-primary leading-tight">
        {{ $heading }}
    </h2>
    @if($subheading)
        <p class="text-gray-500 mt-4 text-base lg:text-lg leading-relaxed {{ $centered ? 'max-w-2xl mx-auto' : 'max-w-2xl' }}">
            {{ $subheading }}
        </p>
    @endif
</div>
