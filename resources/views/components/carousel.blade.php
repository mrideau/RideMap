<div {{ $attributes->merge(['class' => 'carousel']) }}>
    <div class="carousel-inner">
        {{ $slot }}
    </div>
    <div class="dots">
    </div>
</div>

{{--Import js--}}
{{--Init carousel--}}
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/carousel.js') }}" defer></script>
    <script>
        const carousels = document.querySelectorAll('.carousel');
        carousels.forEach(carousel => {
            const car = new Carousel(carousel);
        });
    </script>
@endpush
