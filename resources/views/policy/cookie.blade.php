@extends('layouts.app')
@section('title', $cookiePolicy['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/cookie-policy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260725-1">
@endpush

@section('content')
    <section class="cookie-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="cookie-banner__overlay"></div>
        <div class="cookie-banner__content">
            <h1>{{ $cookiePolicy['title'] }}</h1>
            <div class="cookie-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>COOKIE POLICY</span>
            </div>
        </div>
    </section>

    <main class="cookie-document policy-document">
        @include('policy.partials.navigation')
        <div class="cookie-document__inner policy-document__content">
            <h1>{{ $cookiePolicy['title'] }}</h1>
            <p class="cookie-document__date">Date: {{ $cookiePolicy['date'] }}</p>

            <section class="cookie-document__section">
                <h2>Introduction</h2>
                @foreach ($cookiePolicy['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($cookiePolicy['sections'] as $section)
                <section class="cookie-document__section">
                    <h2>{{ $section['title'] }}</h2>

                    @foreach (($section['body'] ?? []) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($section['groups']))
                        @foreach ($section['groups'] as $group)
                            <div class="cookie-document__group">
                                <h3>{{ $group['title'] }}</h3>
                                <p>{{ $group['description'] }}</p>

                                @if (!empty($group['items']))
                                    <ul>
                                        @foreach ($group['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if (!empty($group['note']))
                                    <p>{{ $group['note'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    @endif

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

                    @if (!empty($section['contact']))
                        <div class="cookie-document__contact">
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
