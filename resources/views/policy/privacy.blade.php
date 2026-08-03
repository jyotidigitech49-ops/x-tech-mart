@extends('layouts.app')
@section('title', $policy['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/privacy-policy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260803-1">
@endpush

@section('content')
    <section class="privacy-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="privacy-banner__overlay"></div>
        <div class="privacy-banner__content">
            <h1>{{ $policy['title'] }}</h1>
            <div class="privacy-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>PRIVACY POLICY</span>
            </div>
        </div>
    </section>

    <main class="privacy-document policy-document">
        @include('policy.partials.navigation')
        <div class="privacy-document__inner policy-document__content">
            <h1>{{ $policy['title'] }}</h1>
            <p class="privacy-document__date">Date: {{ $policy['date'] }}</p>

            <section class="privacy-document__section">
                <h2>Introduction</h2>
                @foreach ($policy['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($policy['sections'] as $section)
                <section class="privacy-document__section">
                    <h2>{{ $section['title'] }}</h2>

                    @foreach (($section['body'] ?? []) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($section['groups']))
                        @foreach ($section['groups'] as $group)
                            <div class="privacy-document__group">
                                <h3>{{ $group['title'] }}</h3>

                                @if (!empty($group['description']))
                                    <p>{{ $group['description'] }}</p>
                                @endif

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

                    @if (!empty($section['contact']))
                        <div class="privacy-document__contact">
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
