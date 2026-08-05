<div class="slider-area product-hero-slider-area">
    <div class="swiper product-hero-swiper">
        <div class="swiper-wrapper">
            @foreach (($heroBanners ?? []) as $banner)
                <div class="swiper-slide product-hero-slide">
                    <a href="{{ $banner['url'] }}" class="product-hero-banner-link"
                        aria-label="{{ $typeName }} banner {{ $loop->iteration }}">
                        <img src="{{ $banner['image'] }}" alt="{{ $typeName }} banner {{ $loop->iteration }}"
                            @if (! $loop->first) loading="lazy" @endif>
                    </a>
                </div>
            @endforeach
        </div>

        @if (count($heroBanners ?? []) > 1)
            <div class="swiper-pagination product-hero-pagination"></div>
        @endif
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.product-hero-swiper').forEach(function (slider) {
                    if (slider.swiper) return;

                    const slideCount = slider.querySelectorAll('.swiper-slide').length;

                    new Swiper(slider, {
                        slidesPerView: 1,
                        loop: slideCount > 1,
                        speed: 700,
                        autoplay: slideCount > 1 ? {
                            delay: 3500,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true
                        } : false,
                        pagination: slideCount > 1 ? {
                            el: slider.querySelector('.product-hero-pagination'),
                            clickable: true
                        } : false,
                        keyboard: {
                            enabled: true
                        },
                        a11y: {
                            enabled: true
                        }
                    });
                });
            });
        </script>
    @endpush
@endonce
