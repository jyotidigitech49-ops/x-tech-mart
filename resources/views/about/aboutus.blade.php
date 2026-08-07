@extends('layouts.app')
@section('title', 'About Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/aboutus.css') }}?v=20260807-2">
@endpush

@section('content')

    {{-- Page Banner --}}
    <section class="about-page-banner" style="background-image: url('{{ $bannerImage }}');" aria-label="About Us">
        <div class="about-page-banner__overlay"></div>
        <div class="about-page-banner__content">
            <h1>About Us</h1>
            <nav class="about-page-banner__breadcrumb" aria-label="Breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span aria-hidden="true">//</span>
                <span aria-current="page">ABOUT US</span>
            </nav>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="about-why-section">
        <div class="container">
            <div class="about-why-layout">
                <div class="about-why-gallery" aria-label="XTechMart technology solutions">
                    <img class="about-why-gallery__image" src="{{ asset('assets/images/banner/choose.png') }}"
                        alt="Why choose XTechMart" loading="lazy">
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
                    <img src="{{ asset('assets/images/icon-img/Categories.png') }}" alt="" aria-hidden="true">
                    <div><strong>04</strong><span>Core Categories</span></div>
                </article>
                <article class="about-stat-item">
                    <img src="{{ asset('assets/images/icon-img/Printer.png') }}" alt="" aria-hidden="true">
                    <div><strong>08</strong><span>Product Sections
                        </span></div>
                </article>
                <article class="about-stat-item">
                    <img src="{{ asset('assets/images/icon-img/light.png') }}" alt="" aria-hidden="true">
                    <div><strong>01</strong><span>Simple Quote Process
                        </span></div>
                </article>
                <article class="about-stat-item">
                    <img src="{{ asset('assets/images/icon-img/FAQs.png') }}" alt="" aria-hidden="true">
                    <div><strong>100%</strong><span>Product-Focused Experience</span></div>
                </article>
            </div>
        </div>
    </section>

    {{-- About Our Collection --}}
    <section class="about-story-banner-section" aria-label="About our technology collection">
        <div class="container">
            <img src="{{ asset('assets/images/banner/about-banner.png') }}" alt="About XTechMart technology collection"
                loading="lazy">
        </div>
    </section>

    {{-- Frequently Asked Questions --}}
    <section class="about-faq-section" aria-labelledby="about-faq-title">
        <div class="container">
            <div class="about-faq-heading">
                <span>FAQ</span>
                <h2 id="about-faq-title">Clarity for Every Question</h2>
            </div>

            <div class="about-faq-grid">
                <article class="about-faq-item">
                    <h3>What is XTech Mart?
                    </h3>
                    <p>XTech Mart is an independent technology information and product discovery platform featuring
                        printers, scanners, desktops, and thin clients for home, office, and professional use.
                    </p>
                </article>
                <article class="about-faq-item">
                    <h3>Can I purchase products directly from the website?
                    </h3>
                    <p>No. XTech Mart does not offer direct checkout or online purchasing. Visitors can review product
                        information and submit a quote request for pricing and availability.
                    </p>
                </article>
                <article class="about-faq-item">
                    <h3>Which product categories are available?
                    </h3>
                    <p>The website includes printers, scanners, desktops, and thin clients. Printer listings may also appear
                        under OfficeJet, LaserJet, Inkjet, and DeskJet categories.</p>
                </article>
                <article class="about-faq-item">
                    <h3>How do I request a product quote?
                    </h3>
                    <p>Open the relevant product page, select the quote option, and provide the requested details. The
                        submitted information helps the team respond according to your product requirements.</p>
                </article>
                <article class="about-faq-item">
                    <h3> What information is included on product pages?
                    </h3>
                    <p>Product pages may include descriptions, specifications, key features, intended applications,
                        connectivity details, and other practical information to support product research.
                    </p>
                </article>
                <article class="about-faq-item">
                    <h3> How can I choose a suitable product?
                    </h3>
                    <p>Consider your workload, available space, connectivity needs, preferred features, and intended use.
                        Reviewing several listings can make product comparison more focused and useful.
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- CTA -banner-Section --}}
    <section class="about-cta-section" aria-label="Explore XTechMart solutions">
        <div class="about-cta-slider">
            <div class="about-cta-slide">
                <a href="{{ url('/contact-us') }}" aria-label="Contact us for personalized technology guidance">
                    <img src="{{ asset('assets/images/banner/smarter-technology-decisions.png') }}"
                        alt="Turn better choices into smarter technology decisions">
                </a>
            </div>
            <div class="about-cta-slide">
                <a href="{{ url('/products') }}" aria-label="Start exploring technology products">
                    <img src="{{ asset('assets/images/banner/business-technology-solutions.png') }}"
                        alt="Your next technology solution starts with the right information">
                </a>
            </div>
            <div class="about-cta-slide">
                <a href="{{ url('/products') }}" aria-label="Explore business technology products">
                    <img src="{{ asset('assets/images/banner/technology-product-guidance.png') }}"
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
