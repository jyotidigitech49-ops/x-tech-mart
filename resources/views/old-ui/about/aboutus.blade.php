@extends('old-ui.layouts.app')
@section('title', 'About Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aboutus.css') }}?v=20260723-13">
@endpush

@section('content')

    {{-- Page Banner --}}
    <section class="about-page-banner" aria-label="About XTechMart">
        <img src="{{ asset('assets/images/banner/about-page-hero.png') }}"
            alt="About XTechMart and our technology solutions">
        <div class="about-page-banner__actions">
            <a class="about-page-banner__button about-page-banner__button--primary" href="{{ url('/products') }}">Discover</a>
            <a class="about-page-banner__button about-page-banner__button--outline"
                href="{{ url('/contact-us') }}">Connect</a>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="about-why-section">
        <div class="container">
            <div class="about-why-layout">
                <div class="about-why-content">
                    {{-- <span class="about-section-eyebrow">Why XTechMart</span> --}}
                    <h2>{{ $whyChoose['title'] }}</h2>
                    <p class="about-section-intro">{{ $whyChoose['description'] }}</p>

                    <div class="about-why-features">
                        <article class="about-why-feature">
                            <span class="about-icon about-why-icon">
                                <img src="{{ asset('assets/images/icon-img/about-curated-selection.png') }}" alt=""
                                    aria-hidden="true">
                            </span>
                            <div>
                                <h3>Curated Selection
                                </h3>
                                <p>Explore curated technology solutions for modern workplaces, growing businesses, and
                                    everyday productivity.
                                </p>
                            </div>
                        </article>
                        <article class="about-why-feature">
                            <span class="about-icon about-why-icon">
                                <img src="{{ asset('assets/images/icon-img/about-insightful-guidance.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Insightful Guidance</h3>
                                <p>Access carefully presented product insights to support informed comparisons, confident
                                    decisions, and smarter technology choices.
                                </p>
                            </div>
                        </article>
                        <article class="about-why-feature">
                            <span class="about-icon about-why-icon">
                                <img src="{{ asset('assets/images/icon-img/about-tailored-quotations.png') }}"
                                    alt="" aria-hidden="true">
                            </span>
                            <div>
                                <h3>Tailored Quotations</h3>
                                <p>Request personalized pricing recommendations tailored to your requirements, project
                                    goals, and technology expectations.
                                </p>
                            </div>
                        </article>
                        <article class="about-why-feature">
                            <span class="about-icon about-why-icon">
                                <img src="{{ asset('assets/images/icon-img/about-responsive-assistance.png') }}"
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

                <div class="about-why-visual">
                    <span class="about-dot-pattern" aria-hidden="true"></span>
                    <div class="about-why-image">
                        <img src="{{ asset('assets/images/banner/why-choose-zerotechmart.png') }}"
                            alt="Modern scanner in an organized office workspace" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technology Categories Strip --}}
    <section class="about-category-strip" aria-label="Explore technology categories">
        <div class="container">
            <div class="about-category-grid">
                <article class="about-category-item">
                    <a class="about-category-image" href="">
                        <img class="about-category-icon"
                            src="{{ asset('assets/images/icon-img/about-knowledge-unlocked.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </a>
                    <div>
                        <h3>Knowledge Unlocked</h3>
                        <p>Clear product insights that support confident, informed technology decisions.
                        </p>

                    </div>
                </article>
                <article class="about-category-item">
                    <a class="about-category-image" href="">
                        <img class="about-category-icon"
                            src="{{ asset('assets/images/icon-img/about-beyond-comparison.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </a>
                    <div>
                        <h3>Beyond Comparison
                        </h3>
                        <p>Simplified product exploration tailored for evolving business requirements.
                        </p>

                    </div>
                </article>
                <article class="about-category-item">
                    <a class="about-category-image" href="">
                        <img class="about-category-icon"
                            src="{{ asset('assets/images/icon-img/about-guided-connections.png') }}" alt=""
                            aria-hidden="true" loading="lazy">
                    </a>
                    <div>
                        <h3>Guided Connections</h3>
                        <p>Personalized assistance helping identify technology solutions with confidence.
                        </p>

                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- About Our Collection --}}
    <section class="about-story-section">
        <div class="container">
            <div class="about-story-layout">
                <div class="about-story-visual">
                    <span class="about-dot-pattern about-dot-pattern--story" aria-hidden="true"></span>
                    <div class="about-story-image about-story-image--main">
                        <img src="{{ asset('assets/images/banner/about-technology-collection.png') }}"
                            alt="Desktop, printer, and scanner collection in a modern office" loading="lazy">
                    </div>
                    <div class="about-story-image about-story-image--small">
                        <img src="{{ asset('assets/images/banner/about-compact-printer.png') }}"
                            alt="Compact printer in a modern workspace" loading="lazy">
                    </div>
                    <div class="about-story-image about-story-image--front">
                        <img src="{{ asset('assets/images/banner/about-office-printer.png') }}"
                            alt="Office multifunction printer" loading="lazy">
                    </div>
                </div>

                <div class="about-story-content">
                    {{-- <span class="about-section-eyebrow">About Our Platform</span> --}}
                    <h2>Helping You Discover Technology With Confidence
                    </h2>
                    <p>{{ $collection['description'] }}</p>
                    <ul class="about-story-points">
                        <li>Curated technology collections
                        </li>
                        <li>Detailed product information</li>
                        <li>Simplified product comparisons</li>
                        <li>Personalized quote assistance
                        </li>
                        <li>Business-focused solutions</li>
                        <li>Dependable customer guidance</li>
                    </ul>
                    <a class="about-primary-btn" href="{{ url('/products') }}">Explore<i class="icon-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Platform Benefits Strip --}}
    <section class="about-benefits-strip" aria-label="XTechMart platform benefits">
        <div class="container">
            <div class="about-benefits-grid">
                @php
                    $platformBenefitIcons = [
                        'about-discovery-refined.png',
                        'about-knowledge-in-motion.png',
                        'about-quotes-reimagined.png',
                        'about-confidence-connected.png',
                    ];
                @endphp
                @foreach ($features as $feature)
                    <article class="about-benefit-item">
                        <span class="about-icon">
                            <img src="{{ asset('assets/images/icon-img/' . $platformBenefitIcons[$loop->index]) }}"
                                alt="" aria-hidden="true">
                        </span>
                        <div>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['description'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA -banner-Section --}}
    <section class="about-cta-section" aria-label="Explore XTechMart solutions">
        <div class="about-cta-slider">
            <div class="about-cta-slide">
                <a href="{{ url('/contact-us') }}" aria-label="Contact us for personalized technology guidance">
                    <img src="{{ asset('assets/images/banner/smarter-technology-decisions.webp') }}"
                        alt="Turn better choices into smarter technology decisions">
                </a>
            </div>
            <div class="about-cta-slide">
                <a href="{{ url('/products') }}" aria-label="Start exploring technology products">
                    <img src="{{ asset('assets/images/banner/technology-product-guidance.webp') }}"
                        alt="Your next technology solution starts with the right information">
                </a>
            </div>
            <div class="about-cta-slide">
                <a href="{{ url('/products') }}" aria-label="Explore business technology products">
                    <img src="{{ asset('assets/images/banner/business-technology-solutions.webp') }}"
                        alt="Discover technology that moves your business forward">
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        (function($) {
            $('.about-cta-slider').not('.slick-initialized').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 1800,
                speed: 500,
                arrows: false,
                dots: true,
                pauseOnHover: true
            });
        })(jQuery);
    </script>
@endpush
