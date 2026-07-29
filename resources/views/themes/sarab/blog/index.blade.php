@extends('themes.sarab.layouts.app')
@section('title', 'Blogs')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/blog-list.css') }}?v=20260728-3">
@endpush

@section('content')

    <section class="blog-list-banner" style="background-image: url('{{ $bannerImage }}');">
        <div class="blog-list-banner__overlay"></div>
        <div class="blog-list-banner__content">
            <h1>Blogs</h1>
            <div class="blog-list-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>BLOGS</span>
            </div>
        </div>
    </section>

    <section class="blog-list-area">
        <div class="container">
            <div class="blog-list-heading">
                <div class="blog-list-heading__copy">
                    <span class="blog-list-heading__eyebrow">Latest Insights</span>
                    <h2>Explore Our <span>Blogs</span></h2>
                    <p>Product knowledge, practical technology guides, and useful updates in one place.</p>
                </div>
                <div class="blog-list-heading__count" aria-label="{{ count($blogs) }} published articles">
                    <strong>{{ count($blogs) }}</strong>
                    <span>{{ \Illuminate\Support\Str::plural('Article', count($blogs)) }}</span>
                </div>
            </div>

            <div class="row blog-list-grid">
                @forelse ($blogs as $blog)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <article class="blog-list-card">
                            <a class="blog-list-img" href="{{ $blog['url'] }}">
                                @if ($blog['image1'])
                                    <img src="{{ $blog['image1'] }}" alt="{{ $blog['heading'] }}">
                                @else
                                    <span class="blog-list-image-missing">{{ $blog['heading'] }}</span>
                                @endif
                            </a>

                            <div class="blog-list-content">
                                <h3>
                                    <a href="{{ $blog['url'] }}">{{ $blog['heading'] }}</a>
                                </h3>

                                <p>{{ $blog['excerpt'] }}</p>

                                <a class="blog-list-read" href="{{ $blog['url'] }}">
                                    Read More <i class="icon-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="blog-empty-state text-center">
                            No blogs found.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
