<div {{ $attributes->merge(['class' => 'carousel']) }}>
    <div class="carousel-inner">
        {{ $slot }}
    </div>
    <div class="dots">
    </div>
</div>