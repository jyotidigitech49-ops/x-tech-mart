@extends('layouts.app')
@section('title', $disclaimer['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/disclaimer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260805-2">
@endpush

@section('content')
    <section class="disclaimer-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="disclaimer-banner__overlay"></div>
        <div class="disclaimer-banner__content">
            <h1>{{ $disclaimer['title'] }}</h1>
            <div class="disclaimer-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>DISCLAIMER</span>
            </div>
        </div>
    </section>

    <main class="disclaimer-document policy-document">
        @include('policy.partials.navigation')
        <div class="disclaimer-document__inner policy-document__content">
            <h1>{{ $disclaimer['title'] }}</h1>
            <p class="disclaimer-document__date">Date: {{ $disclaimer['date'] }}</p>

            <section class="disclaimer-document__section">
                <h2>Introduction</h2>
                @foreach ($disclaimer['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($disclaimer['sections'] as $section)
                <section class="disclaimer-document__section">
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
                        <div class="disclaimer-document__contact">
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
