@extends('layouts.app')
@section('title', 'Home')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/home.css') }}?v=20260728-7">
@endpush

@section('content')

    {{-- Slider area- --}}
    <section class="home-main-slider-area" aria-label="Featured technology">
        <div class="home-main-slider hero-slider-active-1">
            <div class="single-hero-slider single-animation-wrap home-main-slide">
                <a href="{{ url('/products/printer') }}" aria-label="Explore printer solutions">
                    <img src="{{ asset('assets/images/slider/printer-solutions.png') }}" width="1920" height="651"
                        fetchpriority="high" alt="Where every print begins - explore printer solutions">
                </a>
            </div>
            <div class="single-hero-slider single-animation-wrap home-main-slide">
                <a href="{{ url('/products/thin-client') }}" aria-label="Explore thin client solutions">
                    <img src="{{ asset('assets/images/slider/thin-client-solutions.png') }}" width="1920" height="651"
                        alt="Simplify every digital connection - explore thin client solutions">
                </a>
            </div>
            <div class="single-hero-slider single-animation-wrap home-main-slide">
                <a href="{{ url('/products/desktops') }}" aria-label="Explore desktop solutions">
                    <img src="{{ asset('assets/images/slider/desktop-solutions.png') }}" width="1920" height="651"
                        alt="Built to power every task - explore desktop solutions">
                </a>
            </div>
            <div class="single-hero-slider single-animation-wrap home-main-slide">
                <a href="{{ url('/products/scanner') }}" aria-label="Explore scanner solutions">
                    <img src="{{ asset('assets/images/slider/scanner-solutions.png') }}" width="1920" height="651"
                        alt="Where documents go digital - explore scanner solutions">
                </a>
            </div>
        </div>
    </section>
    {{-- Product Categories --}}
    <section class="product-categories-area home-category-section">
        <div class="container">
            <div class="home-category-layout">
                <div class="home-section-heading home-category-heading">
                    <div>
                        <span class="home-section-eyebrow">EXPLORE OUR COLLECTION</span>
                        <h2>Discover Technology Without Limits
                        </h2>
                        <p>Explore thoughtfully curated technology collections designed to simplify product discovery and
                            support confident decisions for every workspace.
                        </p>
                    </div>
                    <a class="home-outline-link" href="{{ url('/products') }}">
                        Explore Collection <i class="icon-arrow-right"></i>
                    </a>
                </div>

                <div class="home-category-grid">
                    @foreach ($homeCategories as $category)
                        @php
                            $categoryUrl = url('/products/' . $category->url);
                        @endphp
                        <article class="home-category-card">
                            <div class="home-category-media">
                                <div class="product-img">
                                    <a href="{{ $categoryUrl }}">
                                        <img src="{{ $category->category_image_url }}" alt="{{ $category->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="home-category-content">
                                <h3><a href="{{ $categoryUrl }}">{{ $category->name }}</a></h3>
                                <p>{{ $category->description }}</p>
                                <a class="home-category-link" href="{{ $categoryUrl }}">
                                    View {{ $category->name }} <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- Product Area--dynamics --}}
    <section class="product-area home-dynamic-products-area">
        <div class="container">
            <div class="home-products-topbar">
                <div class="home-products-heading">
                    <span class="home-section-eyebrow">BUILT AROUND BUSINESS</span>
                    <h2>Professional
                        Technology
                    </h2>
                    <p>Explore printers, scanners, desktops, and thin clients selected for focused work and dependable
                        everyday use.</p>
                </div>
                @php
                    $defaultProductTab = collect($productTabs)->search(
                        fn($tab) => strtolower(trim($tab['label'])) === 'printer',
                    );
                    $defaultProductTab =
                        $defaultProductTab !== false ? $defaultProductTab : array_key_first($productTabs);
                    $productTabDisplayNames = ['Office', 'Business', 'Professional', 'Essentials'];
                    $dynamicProductTabIndex = 0;
                @endphp
                <div class="tab-style-9 nav home-product-tabs">
                    @foreach ($productTabs as $tabKey => $tab)
                        @php
                            $productTabDisplayName =
                                $tabKey === 'featured'
                                    ? 'Featured'
                                    : $productTabDisplayNames[$dynamicProductTabIndex++] ??
                                        \Illuminate\Support\Str::title(str_replace(['-', '_'], ' ', $tab['label']));
                        @endphp
                        <a class="{{ $tabKey === $defaultProductTab ? 'active' : '' }}" href="#{{ $tabKey }}"
                            data-bs-toggle="tab">
                            {{ $productTabDisplayName }}
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="tab-content jump">
                @foreach ($productTabs as $tabKey => $tab)
                    <div id="{{ $tabKey }}" class="tab-pane {{ $tabKey === $defaultProductTab ? 'active' : '' }}">
                        <div class="home-needs-product-slider">
                            @forelse ($tab['products'] as $product)
                                @php
                                    $homeProductType = \Illuminate\Support\Str::slug($product->parent_cat ?: 'printer');
                                    $homeProductType =
                                        $homeProductType === 'thin-client' ? 'thin-client' : $homeProductType;
                                    $homeProductUrl = url("products/{$homeProductType}/details", $product->slug);
                                    $homeProductImages = collect($product->imagePaths());

                                    $homeProductImage = $homeProductImages->first();
                                @endphp
                                <div class="product-plr-1">
                                    <div class="single-product-wrap home-product-card">
                                        <div class="product-img product-img-zoom mb-20">
                                            <a href="{{ $homeProductUrl }}">
                                                @if ($homeProductImage)
                                                    <img class="home-product-gallery-img"
                                                        src="{{ asset($homeProductImage) }}" alt="{{ $product->name }}"
                                                        data-default-src="{{ asset($homeProductImage) }}"
                                                        data-gallery='@json($homeProductImages->map(fn($image) => asset($image))->values())'>
                                                @else
                                                    <span class="home-product-image-missing">{{ $product->name }}</span>
                                                @endif
                                            </a>

                                        </div>
                                        <div class="product-content-wrap-3">
                                            <div class="home-product-category">
                                                {{ $product->parent_cat }}
                                            </div>
                                            <h3 class="mrg-none">
                                                <a href="{{ $homeProductUrl }}">{{ $product->name }}</a>
                                            </h3>
                                            <div class="home-price-stock-row">
                                                <div class="product-price-4">
                                                    <span class="new-price">${{ number_format($product->price, 2) }}</span>
                                                </div>
                                                <div class="home-card-stock-wrap">
                                                    <span class="home-stock-badge">
                                                        {{ $product->stock_status === 'available' ? 'In Stock' : 'Out of Stock' }}
                                                    </span>
                                                </div>
                                            </div>
                                            <a class="home-product-details-link" href="{{ $homeProductUrl }}">
                                                <i class="icon-arrow-right-circle"></i>
                                                View Details
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="product-plr-1">
                                    <p>No products found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    {{-- Why Choose Us --}}
    <section class="home-why-section">
        <div class="container">
            <div class="home-why-layout">
                <div class="home-why-content">
                    {{-- <span class="home-section-eyebrow">Why XTechMart</span> --}}
                    <h2>Why Choose XTechMart
                    </h2>
                    <p class="home-why-intro">Technology decisions begin with trusted information. XTechMart brings
                        together thoughtfully organized product collections, meaningful insights, and personalized guidance
                        to simplify every stage of the product exploration process.</p>

                    <div class="home-why-features">
                        <article class="home-why-feature">
                            <span class="home-why-icon">
                                <img src="{{ asset('assets/images/icon-img/clear-product-information.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Curated Selection</h3>
                                <p>Explore curated technology solutions for modern workplaces, growing businesses, and
                                    everyday productivity.</p>
                            </div>
                        </article>
                        <article class="home-why-feature">
                            <span class="home-why-icon">
                                <img src="{{ asset('assets/images/icon-img/simple-category-browsing.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Insightful Guidance</h3>
                                <p>Access carefully presented product insights to support informed comparisons, confident
                                    decisions, and smarter technology choices.</p>
                            </div>
                        </article>
                        <article class="home-why-feature">
                            <span class="home-why-icon">
                                <img src="{{ asset('assets/images/icon-img/practical-product-comparisons.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Tailored Quotations
                                </h3>
                                <p>Request personalized pricing recommendations tailored to your requirements, project
                                    goals, and technology expectations.</p>
                            </div>
                        </article>
                        <article class="home-why-feature">
                            <span class="home-why-icon">
                                <img src="{{ asset('assets/images/icon-img/helpful-technology-resources.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Responsive Assistance</h3>
                                <p>Connect with experienced specialists for timely guidance, dependable support, and
                                    meaningful product recommendations.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="home-why-visual">
                    <span class="home-why-dots" aria-hidden="true"></span>
                    <div class="home-why-image-wrap">
                        <img src="{{ asset('assets/images/banner/why-choose-zerotechmart.png') }}"
                            alt="Modern scanner in an organized office workspace" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Featured Technology Tiles --}}
    <section class="home-feature-tiles" aria-label="Featured technology categories">
        <div class="container">
            <div class="home-feature-tiles-grid">
                <article class="home-feature-tile home-feature-tile--large">
                    <img src="{{ asset('assets/images/banner/featured-device-collection.png') }}" width="603"
                        height="356"
                        alt="Desktop, printer, and scanner technology collection" loading="lazy">
                    <div class="home-feature-tile-content">
                        <h2>Find Your
                            Perfect Device
                        </h2>
                        <p>Discover What's Possible.</p>
                        <a href="{{ url('/products') }}" aria-label="Explore products">
                            <i class="icon-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <div class="home-feature-tiles-stack">
                    <article class="home-feature-tile home-feature-tile--small">
                        <img src="{{ asset('assets/images/banner/featured-business-printer.png') }}" width="217"
                            height="256"
                            alt="Business printer" loading="lazy">
                        <div class="home-feature-tile-content">
                            <h3>Business Printers</h3>
                            <p>Designed for seamless everyday printing.
                            </p>
                            <a href="{{ url('/products/printer') }}" aria-label="Explore printers">
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </article>

                    <article class="home-feature-tile home-feature-tile--small">
                        <img src="{{ asset('assets/images/banner/featured-document-scanner.png') }}" width="217"
                            height="256"
                            alt="Document scanner" loading="lazy">
                        <div class="home-feature-tile-content">
                            <h3>Document Scanners
                            </h3>
                            <p>Transform paperwork into digital workflows.</p>
                            <a href="{{ url('/products/scanner') }}" aria-label="Explore scanners">
                                <i class="icon-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    {{-- Suggested products --}}
    <section class="product-area home-product-showcase home-suggested-products-area">
        <div class="container">
            <div class="home-showcase-topbar">
                <div class="home-showcase-heading">
                    <h2>Explore Product Possibilities</h2>
                    <p>Review selected technology for everyday work and evolving business needs.
                    </p>
                </div>
                <div class="more-product-btn">
                    <a href="{{ url('/products') }}">View Full Range
                        <i class="icon-arrow-right"></i></a>
                </div>
            </div>

            <div class="home-showcase-grid">

                @foreach ($suggestedProducts->take(10) as $product)
                    @php
                        $homeProductType = \Illuminate\Support\Str::slug($product->parent_cat ?: 'printer');
                        $homeProductType = $homeProductType === 'thin-client' ? 'thin-client' : $homeProductType;
                        $homeProductUrl = url("products/{$homeProductType}/details", $product->slug);
                        $homeProductImages = collect($product->imagePaths());

                        $homeProductImage = $homeProductImages->first();
                    @endphp
                    <div>
                        <article class="single-product-wrap home-product-card home-showcase-card">
                            <div class="product-img product-img-zoom">
                                <a href="{{ $homeProductUrl }}">
                                    @if ($homeProductImage)
                                        <img class="home-product-gallery-img" src="{{ asset($homeProductImage) }}"
                                            alt="{{ $product->name }}" data-default-src="{{ asset($homeProductImage) }}"
                                            data-gallery='@json($homeProductImages->map(fn($image) => asset($image))->values())'>
                                    @else
                                        <span class="home-product-image-missing">{{ $product->name }}</span>
                                    @endif
                                </a>

                            </div>

                            <div class="product-content-wrap-3">
                                <div class="home-product-category">
                                    {{ $product->parent_cat }}
                                </div>
                                <h3 class="mrg-none">
                                    <a class="blue" href="{{ $homeProductUrl }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>

                                <div class="home-price-stock-row">
                                    <div class="product-price-4">
                                        <span>${{ number_format($product->price, 2) }}</span>
                                    </div>

                                    <div class="home-card-stock-wrap">
                                        <span class="home-stock-badge">
                                            {{ $product->stock_status === 'available' ? 'In Stock' : 'Out of Stock' }}
                                        </span>
                                    </div>
                                </div>
                                <a class="home-product-details-link" href="{{ $homeProductUrl }}">
                                    <i class="icon-arrow-right-circle"></i>
                                    View Details
                                </a>
                            </div>

                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    {{-- Quick Category Guides --}}
    <section class="home-quick-guides" aria-label="Quick technology guides">
        <div class="container">
            <div class="home-quick-guides-grid">
                <article class="home-quick-guide">
                    <div class="home-quick-guide-image">
                        <img src="{{ asset('assets/images/icon-img/knowledge-unlocked.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </div>
                    <div class="home-quick-guide-content">
                        <h3>Knowledge Unlocked</h3>
                        <p>Clear product insights that support confident, informed technology decisions.</p>

                    </div>
                </article>

                <article class="home-quick-guide">
                    <div class="home-quick-guide-image">
                        <img src="{{ asset('assets/images/icon-img/beyond-comparison.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </div>
                    <div class="home-quick-guide-content">
                        <h3>Beyond Comparison</h3>
                        <p>Simplified product exploration tailored for evolving business requirements.
                        </p>

                    </div>
                </article>

                <article class="home-quick-guide">
                    <div class="home-quick-guide-image">
                        <img src="{{ asset('assets/images/icon-img/guided-connections.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </div>
                    <div class="home-quick-guide-content">
                        <h3>Guided Connections</h3>
                        <p>Personalized assistance helping identify technology solutions with confidence.</p>

                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- Deal Area --}}
    <section class="home-deal-image-banner" aria-label="Featured collection">
        <a href="{{ url('/products') }}" aria-label="Explore featured technology categories">
            <img src="{{ asset('assets/images/bg/featured-technology-collection.png') }}" width="1905" height="646"
                alt="Discover technology built for tomorrow - explore featured product categories">
        </a>
    </section>
    {{-- Technology Benefits Strip --}}
    <section class="home-benefits-strip" aria-label="XTechMart benefits">
        <div class="container">
            <div class="home-benefits-grid">
                <article class="home-benefit-item">
                    <span class="home-benefit-icon">
                        <img src="{{ asset('assets/images/icon-img/discovery-refined.png') }}" alt=""
                            aria-hidden="true">
                    </span>
                    <div>
                        <h3>Discovery, Refined</h3>
                        <p>Navigate thoughtfully organized technology collections with clarity, confidence, and purposeful
                            product exploration.
                        </p>
                    </div>
                </article>
                <article class="home-benefit-item">
                    <span class="home-benefit-icon">
                        <img src="{{ asset('assets/images/icon-img/knowledge-in-motion.png') }}" alt=""
                            aria-hidden="true">
                    </span>
                    <div>
                        <h3>Knowledge in Motion
                        </h3>
                        <p>Access meaningful product insights that simplify comparisons and inspire confident technology
                            decisions every time.</p>
                    </div>
                </article>
                <article class="home-benefit-item">
                    <span class="home-benefit-icon">
                        <img src="{{ asset('assets/images/icon-img/quotes-reimagined.png') }}" alt=""
                            aria-hidden="true">
                    </span>
                    <div>
                        <h3>Quotes, Reimagined
                        </h3>
                        <p>Receive personalized pricing guidance tailored to your requirements, objectives, and evolving
                            technology priorities.</p>
                    </div>
                </article>
                <article class="home-benefit-item">
                    <span class="home-benefit-icon">
                        <img src="{{ asset('assets/images/icon-img/confidence-connected.png') }}" alt=""
                            aria-hidden="true">
                    </span>
                    <div>
                        <h3>Confidence, Connected
                        </h3>
                        <p>Partner with knowledgeable specialists committed to supporting every stage of your technology
                            discovery journey.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    {{-- Insights and Blogs Area--dynamic --}}
    <section class="blog-area home-insights-section">
        <div class="container">
            <div class="home-insights-topbar">
                <div class="home-insights-heading">
                    {{-- <span class="home-insights-heading__line"></span> --}}
                    <h2>Tech Perspectives</h2>
                    {{-- <p>Explore perspectives, product highlights, and technology discussions shaping modern workplaces.</p> --}}
                </div>
                <div class="more-blogs-btn">
                    <a href="{{ url('/blogs') }}">Browse Blogs <i class="icon-arrow-right"></i></a>
                </div>
            </div>
            <div class="home-blog-section">
                <div class="home-blog-grid home-blog-card-slider">
                    @foreach ($blogPosts as $blogPost)
                        @php
                            $homeBlogImage = $blogPost->image1Path();
                        @endphp
                        <div>
                            <article class="blog-wrap home-blog-card">
                                <div class="blog-img">
                                    <a href="{{ url('/blogs', $blogPost->slug) }}">
                                        @if ($homeBlogImage)
                                            <img src="{{ asset($homeBlogImage) }}" alt="{{ $blogPost->heading }}">
                                        @else
                                            <span class="home-blog-image-missing">{{ $blogPost->heading }}</span>
                                        @endif
                                    </a>
                                </div>

                                <div class="blog-content">
                                    <h3>
                                        <a href="{{ url('/blogs', $blogPost->slug) }}">
                                            {{ $blogPost->heading }}
                                        </a>
                                    </h3>

                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($blogPost->content), 120, '...') }}</p>

                                    <a href="{{ url('/blogs', $blogPost->slug) }}" class="home-blog-read">
                                        Read More <i class="icon-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    {{-- Footer Banner Slider --}}
    <section class="home-footer-banner-section" aria-label="Featured solutions">
        <div class="home-footer-banner-slider">
            @foreach ($footerBanners as $banner)
                <div class="home-footer-banner-slide">
                    <a href="{{ $banner['url'] }}" aria-label="{{ $banner['alt'] }}">
                        <img src="{{ $banner['image'] }}" alt="{{ $banner['alt'] }}">
                    </a>
                </div>
            @endforeach
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        (function($) {
            var sliders = $('.home-needs-product-slider');
            var blogSlider = $('.home-blog-card-slider');
            var footerBannerSlider = $('.home-footer-banner-slider');

            sliders.not('.slick-initialized').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1400,
                speed: 450,
                arrows: false,
                dots: true,
                pauseOnHover: true,
                pauseOnFocus: true,
                adaptiveHeight: false,
                responsive: [{
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            sliders.each(function() {
                if (!$(this).closest('.tab-pane').hasClass('active')) {
                    $(this).slick('slickPause');
                }
            });

            blogSlider.not('.slick-initialized').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1300,
                speed: 400,
                arrows: false,
                dots: true,
                pauseOnHover: true,
                pauseOnFocus: true,
                adaptiveHeight: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.home-product-tabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function(event) {
                sliders.slick('slickPause');

                var activeSlider = $($(event.target).attr('href')).find('.home-needs-product-slider');
                activeSlider.slick('setPosition');
                activeSlider.slick('slickPlay');
            });

            footerBannerSlider.not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1600,
                speed: 500,
                fade: true,
                cssEase: 'ease-in-out',
                arrows: false,
                dots: true,
                pauseOnHover: true,
                pauseOnFocus: true,
                adaptiveHeight: false
            });
        })(jQuery);

        document.querySelectorAll('.home-product-card').forEach(function(card) {
            var image = card.querySelector('.home-product-gallery-img');

            if (!image) {
                return;
            }

            var gallery = [];

            try {
                gallery = JSON.parse(image.dataset.gallery || '[]');
            } catch (error) {
                gallery = [];
            }

            gallery = gallery.filter(Boolean);

            if (gallery.length < 2) {
                return;
            }

            var timer = null;
            var index = 0;
            var defaultSrc = image.dataset.defaultSrc || gallery[0];

            function showNextImage() {
                index = (index + 1) % gallery.length;
                image.src = gallery[index];
            }

            card.addEventListener('mouseenter', function() {
                clearInterval(timer);
                index = 0;
                showNextImage();
                timer = setInterval(showNextImage, 600);
            });

            card.addEventListener('mouseleave', function() {
                clearInterval(timer);
                timer = null;
                index = 0;
                image.src = defaultSrc;
            });
        });
    </script>
@endpush
