@extends('old-ui.layouts.app')
@section('title', $blogDetails['heading'] ?? 'Blog Details')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/blogdetails.css') }}?v=20260728-2">
@endpush

@section('content')
    <section class="blog-details-banner" style="background-image: url('{{ $bannerImage }}');">
        <div class="blog-details-banner__overlay"></div>
        <div class="blog-details-banner__content">
            <h1>{{ $blogDetails['heading'] }}</h1>
            <div class="blog-details-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>{{ $blogDetails['heading'] }}</span>
            </div>
        </div>
    </section>

    <main class="blog-details-page">
        <div class="container">
            <article class="blog-article">
                <header class="blog-article-cover">
                    <div class="blog-article-cover__media">
                        @if ($blogDetails['image1'])
                            <img
                                alt="{{ $blogDetails['heading'] ?? 'Blog image' }}"
                                src="{{ $blogDetails['image1'] }}">
                        @else
                            <span class="blog-details-image-missing">{{ $blogDetails['heading'] ?? 'Blog image' }}</span>
                        @endif
                    </div>

                </header>

                <div class="blog-article-body">
                    <div class="blog-article-body__header">
                        <h1>{{ $blogDetails['heading'] }}</h1>
                    </div>

                    {!! $blogDetails['content'] !!}
                </div>

                <nav class="blog-post-navigation" aria-label="Blog post navigation">
                    @if (! empty($blogDetails['previous']))
                        <a class="blog-post-navigation__item blog-post-navigation__item--previous"
                            href="{{ $blogDetails['previous']['url'] }}">
                            <i class="icon-arrow-left"></i>
                            <span>
                                <small>Previous Article</small>
                                <strong>{{ $blogDetails['previous']['heading'] }}</strong>
                            </span>
                        </a>
                    @else
                        <span></span>
                    @endif

                    @if (! empty($blogDetails['next']))
                        <a class="blog-post-navigation__item blog-post-navigation__item--next"
                            href="{{ $blogDetails['next']['url'] }}">
                            <span>
                                <small>Next Article</small>
                                <strong>{{ $blogDetails['next']['heading'] }}</strong>
                            </span>
                            <i class="icon-arrow-right"></i>
                        </a>
                    @endif
                </nav>
            </article>
        </div>
    </main>
@endsection
