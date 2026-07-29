@extends('layouts.app')
@section('title', 'Website Sitemap')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/sitemap.css') }}?v=20260725-1">
@endpush

@section('content')
    <section class="sitemap-hero" style="background-image: url('{{ $bannerImage }}');">
        <div class="sitemap-hero__overlay"></div>
        <div class="sitemap-hero__glow"></div>
        <div class="sitemap-hero__content">
            <span class="sitemap-hero__eyebrow">Find your way</span>
            <h1>Website Sitemap</h1>
            <p>Every useful corner of XTechMart, organized in one simple place.</p>
            <div class="sitemap-hero__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>SITEMAP</span>
            </div>
        </div>
    </section>

    <section class="sitemap-page">
        <div class="sitemap-shell">
            <div class="sitemap-toolbar">
                <div class="sitemap-toolbar__copy">
                    <span>Quick navigator</span>
                    <strong>Where would you like to go?</strong>
                </div>
                <div class="sitemap-search">
                    <span class="sitemap-search__icon"></span>
                    <input type="search" id="sitemapSearch" placeholder="Search pages, products or policies..."
                        aria-label="Search sitemap links">
                    <kbd>Ctrl K</kbd>
                </div>
            </div>

            <div class="sitemap-overview" aria-label="Sitemap overview">
                <div class="sitemap-overview__intro">
                    <span class="sitemap-kicker">Explore the website</span>
                    <h2>Everything is only a click away.</h2>
                    <p>Browse our core pages, jump into product categories, or review important website information.</p>
                </div>
                <div class="sitemap-stat">
                    <strong>{{ count($mainPages) }}</strong>
                    <span>Main pages</span>
                </div>
                <div class="sitemap-stat">
                    <strong>{{ count($productCategories) }}</strong>
                    <span>Categories</span>
                </div>
                <div class="sitemap-stat">
                    <strong>{{ count($policies) }}</strong>
                    <span>Policies</span>
                </div>
            </div>

            <div class="sitemap-grid" id="sitemapGrid">
                <article class="sitemap-card sitemap-card--pages">
                    <div class="sitemap-card__top">
                        <span class="sitemap-card__mark sitemap-card__mark--pages"></span>
                        <div>
                            <span class="sitemap-card__label">Start here</span>
                            <h2>Main Pages</h2>
                        </div>
                    </div>
                    <ul class="sitemap-list">
                        @foreach ($mainPages as $page)
                            <li class="sitemap-entry" data-sitemap-text="{{ strtolower($page['title']) }}">
                                <a class="sitemap-link" href="{{ $page['url'] }}">{{ $page['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </article>

                <article class="sitemap-card sitemap-card--featured sitemap-card--products">
                    <div class="sitemap-card__top">
                        <span class="sitemap-card__mark sitemap-card__mark--products"></span>
                        <div>
                            <span class="sitemap-card__label">Browse solutions</span>
                            <h2>Product Categories</h2>
                        </div>
                    </div>
                    <ul class="sitemap-list sitemap-list--tree">
                        @foreach ($productCategories as $category)
                            <li class="sitemap-entry" data-sitemap-text="{{ $category['search_text'] }}">
                                <a class="sitemap-group" href="{{ $category['url'] }}">{{ $category['title'] }}</a>

                                @if (!empty($category['children']))
                                    <ul class="sitemap-sublist">
                                        @foreach ($category['children'] as $child)
                                            <li>
                                                <a class="sitemap-link" href="{{ $child['url'] }}">{{ $child['title'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </article>

                <article class="sitemap-card sitemap-card--policies">
                    <div class="sitemap-card__top">
                        <span class="sitemap-card__mark sitemap-card__mark--policies"></span>
                        <div>
                            <span class="sitemap-card__label">Stay informed</span>
                            <h2>Important Policies</h2>
                        </div>
                    </div>
                    <ul class="sitemap-list">
                        @foreach ($policies as $policy)
                            <li class="sitemap-entry" data-sitemap-text="{{ strtolower($policy['title']) }}">
                                <a class="sitemap-doc" href="{{ $policy['url'] }}">{{ $policy['title'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </article>
            </div>

            <div class="sitemap-empty" id="sitemapEmpty">
                <span>?</span>
                <strong>No matching links found</strong>
                <p>Try a shorter or different search term.</p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var searchInput = document.getElementById('sitemapSearch');
            var entries = Array.prototype.slice.call(document.querySelectorAll('.sitemap-entry'));
            var cards = Array.prototype.slice.call(document.querySelectorAll('.sitemap-card'));
            var emptyState = document.getElementById('sitemapEmpty');

            if (!searchInput) {
                return;
            }

            document.addEventListener('keydown', function (event) {
                if ((event.metaKey || event.ctrlKey) && event.key.toLowerCase() === 'k') {
                    event.preventDefault();
                    searchInput.focus();
                }
            });

            searchInput.addEventListener('input', function () {
                var query = searchInput.value.trim().toLowerCase();
                var visibleCount = 0;

                entries.forEach(function (entry) {
                    var text = entry.getAttribute('data-sitemap-text') || entry.textContent.toLowerCase();
                    var isVisible = !query || text.indexOf(query) !== -1;

                    entry.hidden = !isVisible;
                    if (isVisible) {
                        visibleCount++;
                    }
                });

                cards.forEach(function (card) {
                    var hasVisibleEntry = card.querySelector('.sitemap-entry:not([hidden])');
                    card.hidden = !hasVisibleEntry;
                });

                emptyState.classList.toggle('is-visible', visibleCount === 0);
            });
        });
    </script>
@endpush
