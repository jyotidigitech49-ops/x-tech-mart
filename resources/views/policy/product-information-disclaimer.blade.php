@extends('layouts.app')
@section('title', $productDisclaimer['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/product-information-disclaimer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260803-1">
@endpush

@section('content')
    <section class="product-info-policy-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="product-info-policy-banner__overlay"></div>
        <div class="product-info-policy-banner__content">
            <h1>{{ $productDisclaimer['title'] }}</h1>
            <div class="product-info-policy-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>PRODUCT INFORMATION DISCLAIMER</span>
            </div>
        </div>
    </section>

    <main class="product-info-document policy-document">
        @include('policy.partials.navigation')
        <div class="product-info-document__inner policy-document__content">
            <h1>{{ $productDisclaimer['title'] }}</h1>
            <p class="product-info-document__date">Date: {{ $productDisclaimer['date'] }}</p>

            <section class="product-info-document__section">
                <h2>Introduction</h2>
                @foreach ($productDisclaimer['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($productDisclaimer['sections'] as $section)
                <section class="product-info-document__section">
                    <h2>{{ $section['title'] }}</h2>

                    @foreach (($section['body'] ?? []) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($section['items']))
                        <ul>
                            @foreach ($section['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($section['secondary_description']))
                        <p>{{ $section['secondary_description'] }}</p>
                    @endif

                    @if (!empty($section['secondary_items']))
                        <ul>
                            @foreach ($section['secondary_items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($section['note']))
                        <p>{{ $section['note'] }}</p>
                    @endif

                    @foreach (($section['notes'] ?? []) as $note)
                        <p>{{ $note }}</p>
                    @endforeach

                    @if (!empty($section['contact']))
                        <div class="product-info-document__contact">
                            @foreach ($section['contact'] as $label => $value)
                                <p>
                                    <strong>{{ $label }}</strong>
                                    <span>{{ $value }}</span>
                                </p>
                            @endforeach
                        </div>
                    @endif
                </section>
            @endforeach
        </div>
    </main>
@endsection
