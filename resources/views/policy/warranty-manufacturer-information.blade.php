@extends('layouts.app')
@section('title', $warrantyPolicy['title'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/warranty-manufacturer-information.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/policy-layout.css') }}?v=20260803-1">
@endpush

@section('content')
    <section class="warranty-policy-banner policy-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="warranty-policy-banner__overlay"></div>
        <div class="warranty-policy-banner__content">
            <h1>{{ $warrantyPolicy['title'] }}</h1>
            <div class="warranty-policy-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>WARRANTY AND MANUFACTURER INFORMATION</span>
            </div>
        </div>
    </section>

    <main class="warranty-document policy-document">
        @include('policy.partials.navigation')
        <div class="warranty-document__inner policy-document__content">
            <h1>{{ $warrantyPolicy['title'] }}</h1>
            <p class="warranty-document__date">Date: {{ $warrantyPolicy['date'] }}</p>

            <section class="warranty-document__section">
                <h2>Introduction</h2>
                @foreach ($warrantyPolicy['intro'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </section>

            @foreach ($warrantyPolicy['sections'] as $section)
                <section class="warranty-document__section">
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

                    @if (!empty($section['contact']))
                        <div class="warranty-document__contact">
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
