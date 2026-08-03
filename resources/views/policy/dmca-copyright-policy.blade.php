@extends('layouts.app')
@section('title', $dmcaPolicy['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dmca-copyright-policy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260803-1">
@endpush

@section('content')
    <section class="dmca-policy-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="dmca-policy-banner__overlay"></div>
        <div class="dmca-policy-banner__content">
            <h1>{{ $dmcaPolicy['title'] }}</h1>
            <div class="dmca-policy-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>DMCA COPYRIGHT POLICY</span>
            </div>
        </div>
    </section>

    <main class="dmca-document policy-document">
        @include('policy.partials.navigation')
        <div class="dmca-document__inner policy-document__content">
            <h1>{{ $dmcaPolicy['title'] }}</h1>
            <p class="dmca-document__date">Date: {{ $dmcaPolicy['date'] }}</p>

            <section class="dmca-document__section">
                <h2>Introduction</h2>
                @foreach ($dmcaPolicy['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($dmcaPolicy['sections'] as $section)
                <section class="dmca-document__section">
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

                    @if (!empty($section['contact']))
                        <div class="dmca-document__contact">
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
