@extends('layouts.app')
@section('title', $detailsData['seo']['title'] ?? ($detailsData['hero']['name'] ?? 'Product Details'))

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/product-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/product-details-theme.css') }}?v=20260804-3">
@endpush

@section('content')
    @php
        $productAsset = function ($image) {
            $image = trim(str_replace('\\', '/', (string) $image));

            if ($image === '') {
                return null;
            }

            $urlPath = parse_url($image, PHP_URL_PATH);
            $image = ltrim($urlPath ?: $image, '/');
            $image = preg_replace('#^public/#i', '', $image);

            if (!str_starts_with(strtolower($image), 'assets/')) {
                $image = 'assets/images/product/' . $image;
            }

            return asset($image);
        };

        $blogImagesFromRecord = function ($blog) {
            return collect([$blog['image1'] ?? null, $blog['image2'] ?? null, $blog['image3'] ?? null])
                ->filter()
                ->map(function ($image) {
                    $image = trim(str_replace('\\', '/', (string) $image));
                    $urlPath = parse_url($image, PHP_URL_PATH);
                    $image = ltrim($urlPath ?: $image, '/');
                    $image = preg_replace('#^public/#i', '', $image);

                    if (!str_starts_with(strtolower($image), 'assets/')) {
                        $image = 'assets/images/blog/' . $image;
                    }

                    return $image;
                })
                ->filter()
                ->unique()
                ->map(fn($image) => asset($image))
                ->values();
        };

        $hero = $detailsData['hero'] ?? [];
        $breadcrumb = $detailsData['breadcrumb'] ?? [];
        $overview = $detailsData['overview'] ?? [];
        $specificationDescription = $detailsData['specification_description'] ?? null;
        $thumbs = [];
        $features = [];
        $overviewNotes = [];
        $specTabs = [];
        $blogs = [];
        $parentCategorySlug = !empty($breadcrumb['parent_category'])
            ? \Illuminate\Support\Str::slug($breadcrumb['parent_category'])
            : null;

        if (!empty($detailsData)) {
            $thumbs = collect($detailsData['gallery'] ?? [])
                ->map(
                    fn($thumb) => [
                        'image' => $productAsset($thumb['image'] ?? null),
                        'label' => $thumb['label'] ?? ($thumb['alt'] ?? ($hero['name'] ?? 'Product image')),
                    ],
                )
                ->filter(fn($thumb) => !empty($thumb['image']))
                ->values()
                ->all();

            $features = collect($overview['features'] ?? [])
                ->filter(fn($feature) => !empty($feature['title']) || !empty($feature['description']))
                ->map(
                    fn($feature) => [
                        'title' => $feature['title'] ?? '',
                        'copy' => $feature['description'] ?? '',
                    ],
                )
                ->values()
                ->all();

            $overviewNotes = collect($overview['notes'] ?? [])
                ->filter()
                ->values()
                ->all();

            if (!empty($detailsData['specifications'])) {
                $specTabs = collect($detailsData['specifications'])
                    ->map(
                        fn($tab) => [
                            'label' => $tab['label'] ?? 'Specifications',
                            'rows' => collect($tab['rows'] ?? [])
                                ->map(fn($row) => [$row['headkey'] ?? '', $row['value'] ?? ''])
                                ->filter(fn($row) => $row[0] !== '' || $row[1] !== '')
                                ->values()
                                ->all(),
                        ],
                    )
                    ->filter(fn($tab) => !empty($tab['rows']))
                    ->all();
            }

            $blogs = collect($detailsData['blogs'] ?? [])
                ->map(
                    fn($blog) => [
                        'title' => $blog['heading'] ?? '',
                        'copy' => \Illuminate\Support\Str::limit(strip_tags($blog['content'] ?? ''), 130),
                        'images' => $blogImagesFromRecord($blog),
                        'date' => !empty($blog['inserted_at'])
                            ? \Illuminate\Support\Carbon::parse($blog['inserted_at'])->format('M d, Y')
                            : null,
                        'url' => !empty($blog['slug']) ? url('blogs', $blog['slug']) : null,
                    ],
                )
                ->values()
                ->all();
        }
    @endphp

    <div class="pd-page">
        <nav class="pd-breadcrumb" aria-label="breadcrumb">
            <div class="pd-container">
                <ol class="pd-breadcrumb-list">
                    @if (!empty($breadcrumb['store']))
                        <li><a href="{{ url('/products') }}">{{ $breadcrumb['store'] }}</a></li>
                    @endif
                    @if (!empty($breadcrumb['parent_category']))
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li><a href="{{ url('/products/' . $parentCategorySlug) }}">{{ $breadcrumb['parent_category'] }}</a>
                        </li>
                    @endif
                    @if (!empty($breadcrumb['category']['name']))
                        <li><i class="fa-solid fa-chevron-right"></i></li>
                        <li>
                            <a
                                href="{{ !empty($breadcrumb['category']['url']) && $parentCategorySlug ? url('/products/' . $parentCategorySlug . '/' . $breadcrumb['category']['url']) : url('/products') }}">
                                {{ $breadcrumb['category']['name'] }}
                            </a>
                        </li>
                    @endif
                    <li><i class="fa-solid fa-chevron-right"></i></li>
                    <li class="active">{{ $breadcrumb['product_name'] ?? ($hero['name'] ?? '') }}</li>
                </ol>
            </div>
        </nav>

        <main class="pd-main">
            <div class="pd-container">
                <div class="pd-layout">
                    <aside class="pd-sidebar-wrap">
                        <div class="pd-sidebar" aria-label="Product sections">
                            <button type="button" class="pd-tab-btn active" data-panel="overview">
                                <i class="fa-solid fa-layer-group"></i>
                                <span>Overview</span>
                            </button>
                            <button type="button" class="pd-tab-btn" data-panel="specifications">
                                <i class="fa-solid fa-sliders"></i>
                                <span>Specifications</span>
                            </button>
                            <button type="button" class="pd-tab-btn" data-panel="blogs">
                                <i class="fa-solid fa-blog"></i>
                                <span>Blogs</span>
                            </button>
                        </div>
                    </aside>

                    <section class="pd-content">
                        <div id="overview" class="pd-panel active">
                            <div class="pd-overview-grid {{ empty($thumbs) ? 'pd-overview-grid-no-thumbs' : '' }}">
                                @if (!empty($thumbs))
                                    <div class="pd-thumbs" aria-label="Product gallery thumbnails">
                                        <button type="button" class="pd-thumb-nav" aria-label="Previous image">
                                            <i class="fa-solid fa-chevron-up"></i>
                                        </button>
                                        @foreach ($thumbs as $thumb)
                                            <button type="button" class="pd-thumb {{ $loop->first ? 'active' : '' }}"
                                                data-image="{{ $thumb['image'] }}" data-label="{{ $thumb['label'] }}"
                                                aria-label="{{ $thumb['label'] }}">
                                                <img src="{{ $thumb['image'] }}" alt="{{ $thumb['label'] }}">
                                            </button>
                                        @endforeach
                                        <button type="button" class="pd-thumb-nav" aria-label="Next image">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </button>
                                    </div>
                                @endif

                                <div class="pd-gallery-main">
                                    @if (!empty($thumbs))
                                        <img id="pd-main-image" src="{{ $thumbs[0]['image'] }}"
                                            alt="{{ $thumbs[0]['label'] }}">
                                    @else
                                        <span
                                            class="pd-product-image-missing">{{ $hero['name'] ?? ($breadcrumb['product_name'] ?? '') }}</span>
                                    @endif
                                </div>

                                <div class="pd-info">
                                    <div class="pd-info-main">
                                        @if (!empty($hero['badge']))
                                            <div class="pd-badge">
                                                <i class="fa-solid fa-share-nodes"></i>
                                                <span>{{ $hero['badge'] }}</span>
                                            </div>
                                        @endif

                                        @if (!empty($hero['name']))
                                            <h1 class="pd-title">{{ $hero['name'] }}</h1>
                                        @endif


                                        @if (!empty($hero['summary']))
                                            <p class="pd-summary">{{ $hero['summary'] }}</p>
                                        @endif
                                    </div>

                                    @if (!empty($hero['price']) || !empty($hero['quote_url']))
                                        <div class="pd-price-box">
                                            <hr class="pd-divider">
                                            @if (!empty($hero['price']))
                                                <div class="pd-price-label">Estimated Contract List Price</div>
                                                <div class="pd-price">${{ number_format((float) $hero['price'], 2) }}</div>
                                            @endif
                                            @if (!empty($hero['quote_url']))
                                                <a href="{{ $hero['quote_url'] }}" class="pd-quote">Get a Quote <i
                                                        class="fa-solid fa-arrow-right-long"></i></a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>

                            @if (!empty($features))
                                <div class="pd-feature-grid">
                                    @foreach ($features as $feature)
                                        <article>
                                            @if (!empty($feature['title']))
                                                <h2 class="pd-feature-title">{{ $feature['title'] }}</h2>
                                            @endif
                                            @if (!empty($feature['copy']))
                                                <p class="pd-feature-copy">{{ $feature['copy'] }}</p>
                                            @endif
                                        </article>
                                    @endforeach
                                </div>
                            @endif

                            @if (!empty($overview['description']) || !empty($overviewNotes))
                                <div class="pd-notes">
                                    <h3>Overview</h3>
                                    @if (!empty($overview['description']))
                                        <p>{!! nl2br(e($overview['description'])) !!}</p>
                                    @endif
                                    @foreach ($overviewNotes as $note)
                                        <p>{!! nl2br(e($note)) !!}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div id="specifications" class="pd-panel">
                            @if (!empty($specTabs))
                                <div class="pd-spec-tabs" role="tablist" aria-label="Specification groups">
                                    @foreach ($specTabs as $specTabId => $specTab)
                                        <button type="button" class="pd-spec-tab {{ $loop->first ? 'active' : '' }}"
                                            data-spec-panel="{{ $specTabId }}">{{ $specTab['label'] }}</button>
                                    @endforeach
                                </div>

                                @foreach ($specTabs as $specTabId => $specTab)
                                    <div id="{{ $specTabId }}"
                                        class="pd-spec-panel {{ $loop->first ? 'active' : '' }}">
                                        <table class="pd-spec-table">
                                            <tbody>
                                                @foreach ($specTab['rows'] as $spec)
                                                    <tr>
                                                        <th scope="row">{{ $spec[0] }}</th>
                                                        <td>{!! nl2br(e($spec[1])) !!}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            @else
                                <div class="pd-section-note">
                                    <h3>Specifications</h3>
                                    <p>No specifications are available for this product.</p>
                                </div>
                            @endif

                            @if (!empty($specificationDescription))
                                <div class="pd-section-note">
                                    <h3>Specifications</h3>
                                    <p>{!! nl2br(e($specificationDescription)) !!}</p>
                                </div>
                            @endif
                        </div>

                        <div id="blogs" class="pd-panel">
                            @if (count($blogs))
                                <div class="pd-blog-heading">
                                    <div>
                                        <span class="pd-blog-eyebrow">Product insights</span>
                                        <h2>Helpful reads for this product</h2>
                                        <p>Explore practical guidance, features, and everyday use ideas.</p>
                                    </div>
                                    <span class="pd-blog-count">{{ count($blogs) }} Articles</span>
                                </div>
                            @endif

                            <div class="pd-blog-grid {{ count($blogs) === 2 ? 'pd-blog-grid--two' : '' }}">
                                @forelse ($blogs as $blog)
                                    @php
                                        $pdBlogImages = collect($blog['images'] ?? [])
                                            ->filter()
                                            ->values();
                                        $pdBlogImage = $pdBlogImages->first();
                                    @endphp
                                    <article class="pd-blog-card js-blog-gallery-card">
                                        <div class="pd-blog-image">
                                            @if ($pdBlogImage)
                                                @if (!empty($blog['url']))
                                                    <a href="{{ $blog['url'] }}"
                                                        aria-label="Read {{ $blog['title'] }}">
                                                @endif
                                                <img class="js-blog-gallery-img" src="{{ $pdBlogImage }}"
                                                    alt="{{ $blog['title'] }}" data-default-src="{{ $pdBlogImage }}"
                                                    data-gallery='@json($pdBlogImages)'>
                                                @if (!empty($blog['url']))
                                                    </a>
                                                @endif
                                            @else
                                                <span class="pd-blog-image-missing">{{ $blog['title'] }}</span>
                                            @endif
                                            <span
                                                class="pd-blog-card-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                        <div class="pd-blog-body">

                                            <h2 class="pd-blog-title">{{ $blog['title'] }}</h2>
                                            <p class="pd-blog-copy">{{ $blog['copy'] }}</p>
                                            @if (!empty($blog['url']))
                                                <a href="{{ $blog['url'] }}" class="pd-blog-link">Read More <i
                                                        class="fa-solid fa-arrow-right-long"></i></a>
                                            @endif
                                        </div>
                                    </article>
                                @empty
                                    <div class="pd-section-note">
                                        <h3>Blogs</h3>
                                        <p>No blogs are available for this product.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.pd-tab-btn');
            const panels = document.querySelectorAll('.pd-panel');
            const thumbs = document.querySelectorAll('.pd-thumb');
            const mainImage = document.getElementById('pd-main-image');
            const specTabs = document.querySelectorAll('.pd-spec-tab');
            const specPanels = document.querySelectorAll('.pd-spec-panel');

            tabs.forEach((tab) => {
                tab.addEventListener('click', function() {
                    const target = this.dataset.panel;

                    tabs.forEach((item) => item.classList.remove('active'));
                    panels.forEach((panel) => panel.classList.remove('active'));

                    this.classList.add('active');
                    document.getElementById(target).classList.add('active');
                });
            });

            thumbs.forEach((thumb) => {
                thumb.addEventListener('click', function() {
                    thumbs.forEach((item) => item.classList.remove('active'));
                    this.classList.add('active');

                    if (mainImage && this.dataset.image) {
                        mainImage.src = this.dataset.image;
                        mainImage.alt = this.dataset.label || 'Product image';
                    }
                });
            });

            specTabs.forEach((tab) => {
                tab.addEventListener('click', function() {
                    const target = this.dataset.specPanel;

                    specTabs.forEach((item) => item.classList.remove('active'));
                    specPanels.forEach((panel) => panel.classList.remove('active'));

                    this.classList.add('active');
                    document.getElementById(target).classList.add('active');
                });
            });
        });
    </script>
@endpush
