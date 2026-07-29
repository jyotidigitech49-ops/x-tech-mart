@extends('old-ui.layouts.app')
@section('title', 'Search Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/products-printer.css') }}?v=20260728-1">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/search-results.css') }}?v=20260725-1">
@endpush

@section('content')
    @php
        $typeUrlFor = function ($product) {
            $type = \Illuminate\Support\Str::slug($product->parent_cat ?: '');

            if (! $type && ! empty($product->category_url)) {
                $type = \Illuminate\Support\Str::slug($product->category_url);
            }

            return $type ?: 'printer';
        };
    @endphp

    <section class="search-hero-area"
        style="background-image: linear-gradient(90deg, rgba(41, 79, 104, 0.96) 0%, rgba(62, 107, 137, 0.88) 50%, rgba(34, 49, 63, 0.5) 100%), url('{{ $bannerImage }}');">
        <div class="container">
            <div class="search-hero-content">
                <span class="search-hero-label">Product Search</span>
                <h1>{{ $displaySearch }}</h1>
                <p>Explore matching printers, desktops, thin clients, scanners, and related technology products.</p>
            </div>
        </div>
    </section>

    <section class="search-results-area pt-95 pb-80">
        <div class="container">
            <div class="search-results-toolbar">
                <div>
                    <span class="search-results-eyebrow">Results</span>
                    <h2>{{ $products->count() }} products found</h2>
                </div>

                <div class="search-category-links">
                    <a class="{{ $searchText === '' ? 'active' : '' }}" href="{{ url('/search') }}">All</a>
                    @foreach ($categories as $category)
                        <a class="{{ optional($matchedCategory)->id === $category->id ? 'active' : '' }}"
                            href="{{ url('/search/' . $category->url) }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if ($products->isNotEmpty())
                <div class="product-area printer-products-area search-products-grid">
                    <div class="row">
                        @foreach ($products as $product)
                            @php
                                $productImages = collect($product->imagePaths());

                                $productImage = $productImages->first();
                                $productTypeUrl = $typeUrlFor($product);
                            @endphp

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <article class="single-product-wrap printer-product-card theme-product-card search-product-card js-product-gallery-card mb-35">
                                    <div class="product-img product-img-zoom mb-15">
                                        <a href="{{ url("products/{$productTypeUrl}/details", $product->slug) }}">
                                            @if ($productImage)
                                                <img class="js-product-gallery-img"
                                                    src="{{ asset($productImage) }}"
                                                    alt="{{ $product->name }}"
                                                    data-default-src="{{ asset($productImage) }}"
                                                    data-gallery='@json($productImages->map(fn ($image) => asset($image))->values())'>
                                            @else
                                                <span class="printer-product-image-missing">{{ $product->name }}</span>
                                            @endif
                                        </a>
                                    </div>

                                    <div class="product-content-wrap-2 theme-product-card__content">
                                        <div class="printer-product-category">
                                            {{ $product->category_name ?? $product->parent_cat }}
                                        </div>

                                        <h3>
                                            <a href="{{ url("products/{$productTypeUrl}/details", $product->slug) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h3>

                                        <div class="product-price-2 printer-product-price-stock">
                                            <span>${{ number_format($product->price, 2) }}</span>
                                            <span class="printer-stock-badge {{ $product->stock_status === 'available' ? '' : 'is-unavailable' }}">
                                                {{ $product->stock_status === 'available' ? 'In Stock' : 'Out of Stock' }}
                                            </span>
                                        </div>
                                        <a class="theme-product-card__link"
                                            href="{{ url("products/{$productTypeUrl}/details", $product->slug) }}">
                                            <i class="icon-arrow-right-circle"></i>
                                            View Details
                                        </a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="search-empty-state">
                    <h3>No matching products found</h3>
                    <p>Try another product name or choose a category from the search box.</p>
                    <a href="{{ url('/products') }}">Browse All Products</a>
                </div>
            @endif
        </div>
    </section>
@endsection
