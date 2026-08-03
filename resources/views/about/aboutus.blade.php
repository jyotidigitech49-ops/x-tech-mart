@extends('layouts.app')
@section('title', 'About Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aboutus.css') }}?v=20260803-5">
@endpush

@section('content')

    {{-- Page Banner --}}
    <section class="about-page-banner" aria-label="About XTechMart">
        <img src="{{ asset('assets/images/banner/about-page-hero.png') }}" alt="About XTechMart and our technology solutions">
        <div class="about-page-banner__actions">
            <a class="about-page-banner__button about-page-banner__button--primary"
                href="{{ url('/products') }}">Discover</a>
            <a class="about-page-banner__button about-page-banner__button--outline"
                href="{{ url('/contact-us') }}">Connect</a>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="about-why-section">
        <div class="container">
            <div class="about-why-layout">
                <div class="about-why-gallery" aria-label="XTechMart technology solutions">
                    <img class="about-why-gallery__image about-why-gallery__image--wide"
                        src="{{ asset('assets/images/banner/about-technology-collection.png') }}"
                        alt="Technology products for a modern workspace" loading="lazy">
                    <img class="about-why-gallery__image about-why-gallery__image--tall"
                        src="{{ asset('assets/images/banner/about-office-printer.png') }}" alt="Modern office printer"
                        loading="lazy">
                    <img class="about-why-gallery__image about-why-gallery__image--small"
                        src="{{ asset('assets/images/banner/about-compact-printer.png') }}" alt="Compact workplace printer"
                        loading="lazy">
                    <img class="about-why-gallery__image about-why-gallery__image--large"
                        src="{{ asset('assets/images/banner/why-choose-zerotechmart.png') }}"
                        alt="Technology solution in a modern office" loading="lazy">
                </div>

                <div class="about-why-content">
                    <h2>{{ $whyChoose['title'] }}</h2>
                    <p>{{ $whyChoose['description'] }}</p>
                    <div class="about-why-features">
                        <article class="about-why-feature">
                            <img src="{{ asset('assets/images/icon-img/about-curated-selection.png') }}" alt=""
                                aria-hidden="true">
                            <div>
                                <h3>Product Clarity</h3>
                                <p>Relevant information for thoughtful product comparisons.</p>
                            </div>
                        </article>
                        <article class="about-why-feature">
                            <img src="{{ asset('assets/images/icon-img/about-responsive-assistance.png') }}" alt=""
                                aria-hidden="true">
                            <div>
                                <h3>Quote Guidance
                                </h3>
                                <p>Personalized assistance for specific technology requirements.
                                </p>
                            </div>
                        </article>
                    </div>
                    <a class="about-why-button" href="{{ url('/contact-us') }}">Contact Us <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Technology Categories Strip --}}
    <section class="about-category-strip" aria-label="XTechMart achievements">
        <div class="container">
            <div class="about-stats-panel">
                <article class="about-stat-item">
                    <i class="far fa-star" aria-hidden="true"></i>
                    <div><strong>04</strong><span>Core Categories</span></div>
                </article>
                <article class="about-stat-item">
                    <i class="fas fa-cube" aria-hidden="true"></i>
                    <div><strong>08</strong><span>Product Sections
                        </span></div>
                </article>
                <article class="about-stat-item">
                    <i class="far fa-heart" aria-hidden="true"></i>
                    <div><strong>01</strong><span>Simple Quote Process
                        </span></div>
                </article>
                <article class="about-stat-item">
                    <i class="far fa-check-circle" aria-hidden="true"></i>
                    <div><strong>100%</strong><span>Product-Focused Experience</span></div>
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

    {{-- Frequently Asked Questions --}}
    <section class="about-faq-section" aria-labelledby="about-faq-title">
        <div class="container">
            <div class="about-faq-heading">
                <span>FAQ</span>
                <h2 id="about-faq-title">Your Concerns, Answered</h2>
            </div>

            <div class="about-faq-grid">
                <article class="about-faq-item">
                    <h3>How do I find the right technology product?</h3>
                    <p>Browse our organized categories and detailed product information to compare suitable options.</p>
                </article>
                <article class="about-faq-item">
                    <h3>Can I request a personalized quotation?</h3>
                    <p>Yes. Share your requirements with us and our team will prepare a quotation for your needs.</p>
                </article>
                <article class="about-faq-item">
                    <h3>Does XTechMart support business requirements?</h3>
                    <p>Yes. We help businesses explore technology for workplaces, teams, and growing operations.</p>
                </article>
                <article class="about-faq-item">
                    <h3>How can I get product guidance?</h3>
                    <p>Contact our specialists for clear information, comparisons, and relevant recommendations.</p>
                </article>
                <article class="about-faq-item">
                    <h3>Are product specifications available?</h3>
                    <p>Each listing provides key specifications and useful details to support informed decisions.</p>
                </article>
                <article class="about-faq-item">
                    <h3>How quickly will your team respond?</h3>
                    <p>We aim to respond promptly with the information and assistance needed for your enquiry.</p>
                </article>
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
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script>
        jQuery(function($) {
            const $ctaSlider = $('.about-cta-slider');

            if ($ctaSlider.length && $.fn.slick) {
                $ctaSlider.not('.slick-initialized').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 1800,
                    speed: 500,
                    adaptiveHeight: false,
                    arrows: false,
                    dots: true,
                    pauseOnHover: true,
                    pauseOnFocus: true,
                    swipe: true,
                    touchMove: true
                });
            }
        });
    </script>
@endpush
