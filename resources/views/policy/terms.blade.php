@extends('layouts.app')
@section('title', $terms['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/terms-conditions.css') }}?v=20260723-2">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260803-1">
@endpush

@section('content')
    <section class="terms-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="terms-banner__overlay"></div>
        <div class="terms-banner__content">
            <h1>{{ $terms['title'] }}</h1>
            <div class="terms-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>TERMS AND CONDITIONS</span>
            </div>
        </div>
    </section>

    <main class="terms-document policy-document">
        @include('policy.partials.navigation')
        <div class="terms-document__inner policy-document__content">
            <h1>{{ $terms['title'] }}</h1>
            <p class="terms-document__date">
                <span>Date:</span>
                <span>{{ $terms['date'] }}</span>
            </p>

            <section class="terms-document__section">
                <h2>Introduction</h2>
                @foreach ($terms['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($terms['sections'] as $section)
                <section class="terms-document__section">
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

                    @if (!empty($section['note']))
                        <p>{{ $section['note'] }}</p>
                    @endif

                    @foreach (($section['notes'] ?? []) as $note)
                        <p>{{ $note }}</p>
                    @endforeach

                    @if (!empty($section['link']))
                        <p>
                            <a href="{{ $section['link']['url'] }}">{{ $section['link']['label'] }}</a>
                        </p>
                    @endif

                    @if (!empty($section['contact']))
                        <div class="terms-document__contact">
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
