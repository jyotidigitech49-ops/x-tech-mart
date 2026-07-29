<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\ProductsDetailsPage;
use App\Models\ProductOverview;
use App\Models\ProductSpecification;
use Illuminate\Support\Str;

class ProductPrinterController extends Controller {
    public function allProducts( Request $request ) {
        $selectedType = $request->query( 'type' );
        $productType = null;

        $printerCategories = Category::query()
            ->where( 'parent_id', 0 )
            ->where( 'status', 'A' )
            ->orderBy( 'sort', 'asc' )
            ->get();
        $this->attachCategoryImageUrls( $printerCategories );

        $productsQuery = Product::query()
            ->leftJoin( 'categories', 'categories.id', '=', 'products.cat_id' )
            ->where( 'products.status', 'A' )
            ->orderBy( 'products.id', 'desc' )
            ->select( 'products.*', 'categories.name as category_name' );

        if ( $selectedType ) {
            $productType = Category::query()
                ->where( 'parent_id', 0 )
                ->where( 'url', $selectedType )
                ->where( 'status', 'A' )
                ->firstOrFail();

            $childCategoryIds = Category::query()
                ->where( 'parent_id', $productType->id )
                ->where( 'status', 'A' )
                ->pluck( 'id' );

            $categoryIds = $childCategoryIds->isNotEmpty()
                ? $childCategoryIds
                : collect( [ $productType->id ] );

            $productsQuery->whereIn( 'products.cat_id', $categoryIds );
        }

        $products = $productsQuery->get();

        $isAllProductsPage = true;
        $heroBanners = $this->productHeroBanners( $productType->url ?? 'all' );

        return view( 'themes.sarab.products.products_printer', compact(
            'printerCategories',
            'products',
            'productType',
            'isAllProductsPage',
            'selectedType',
            'heroBanners'
        ) );
    }

    public function productsPrinter() {
        return $this->productsByType( 'printer' );
    }

    public function productsByType( string $type ) {
        $productType = Category::query()
            ->where( 'parent_id', 0 )
            ->where( 'url', $type )
            ->where( 'status', 'A' )
            ->firstOrFail();

        $childCategories = Category::query()
            ->where( 'parent_id', $productType->id )
            ->where( 'status', 'A' )
            ->orderBy( 'sort', 'asc' )
            ->get();

        $printerCategories = $childCategories->isNotEmpty()
            ? $childCategories
            : Category::query()
                ->where( 'parent_id', 0 )
                ->where( 'status', 'A' )
                ->orderBy( 'sort', 'asc' )
                ->get();
        $this->attachCategoryImageUrls( $printerCategories );

        $productCategoryIds = $childCategories->isNotEmpty()
            ? $childCategories->pluck( 'id' )
            : collect( [ $productType->id ] );

        $products = Product::query()
        ->leftJoin( 'categories', 'categories.id', '=', 'products.cat_id' )
        ->whereIn( 'products.cat_id', $productCategoryIds )
        ->where( 'products.status', 'A' )
        ->orderBy( 'products.id', 'desc' )
        ->select( 'products.*', 'categories.name as category_name' )
        ->get();

        $heroBanners = $this->productHeroBanners( $productType->url );

        return view( 'themes.sarab.products.products_printer', compact(
            'printerCategories',
            'products',
            'productType',
            'heroBanners'
        ) );

    }

    public function printerCategoryProducts( $url ) {
        return $this->categoryProductsByType( 'printer', $url );
    }

    public function categoryProductsByType( string $type, string $url ) {
        $productType = Category::query()
            ->where( 'parent_id', 0 )
            ->where( 'url', $type )
            ->where( 'status', 'A' )
            ->firstOrFail();

        $childCategories = Category::query()
            ->where( 'parent_id', $productType->id )
            ->where( 'status', 'A' )
            ->orderBy( 'sort', 'asc' )
            ->get();

        $printerCategoriesAll = Category::query()
        ->where( 'parent_id', $productType->id )
        ->where( 'status', 'A' )
        ->orderBy( 'sort', 'asc' )
        ->get();

        if ( $printerCategoriesAll->isEmpty() ) {
            $printerCategoriesAll = Category::query()
                ->where( 'parent_id', 0 )
                ->where( 'status', 'A' )
                ->orderBy( 'sort', 'asc' )
                ->get();
        }
        $this->attachCategoryImageUrls( $printerCategoriesAll );

        $printerCategories = Category::query()
        ->where( 'url', $url )
        ->where( 'status', 'A' )
        ->firstOrFail();

        abort_if( $childCategories->isNotEmpty() && (int) $printerCategories->parent_id !== (int) $productType->id, 404 );
        abort_if( $childCategories->isEmpty() && (int) $printerCategories->parent_id !== 0, 404 );

        $products = Product::query()
        ->leftJoin( 'categories', 'categories.id', '=', 'products.cat_id' )
        ->where( 'products.cat_id', $printerCategories->id )
        ->where( 'products.status', 'A' )
        ->orderBy( 'products.id', 'desc' )
        ->select( 'products.*', 'categories.name as category_name' )
        ->get();

        $heroBanners = $this->productHeroBanners( $productType->url, url( "products/{$type}", $url ), $printerCategories->url );

        return view( 'themes.sarab.products.printer_category_products', compact(
            'printerCategoriesAll',
            'products',
            'printerCategories',
            'productType',
            'heroBanners'
        ) );
    }

    /**
     * Category images are stored by filename in the database and served from
     * public/assets/images/category_type on both local and cPanel hosting.
     */
    private function attachCategoryImageUrls( $categories ): void {
        $categories->each( function ( Category $category ) {
            $image = trim( str_replace( '\\', '/', (string) $category->image ) );
            $urlPath = parse_url( $image, PHP_URL_PATH );
            $filename = basename( $urlPath ?: $image );

            $category->setAttribute(
                'category_image_url',
                $filename !== ''
                    ? asset( 'assets/images/category_type/' . $filename )
                    : null
            );
        } );
    }

    private function productHeroBanners( string $type, ?string $link = null, ?string $categoryUrl = null ): array {
        $type = $type ?: 'all';
        $typePrefixes = [
            'printer' => 'pr',
            'desktops' => 'dk',
            'thin-client' => 'tc',
            'scanner' => 'scn',
            'all' => 'pr',
        ];

        $categoryPrefixes = [
            'officejet-printer' => 'oj',
            'laserjet-printer' => 'lj',
            'inkjet-printer' => 'ink',
            'deskjet-printer' => 'dp',
        ];

        $prefix = $categoryUrl && isset( $categoryPrefixes[ $categoryUrl ] )
            ? $categoryPrefixes[ $categoryUrl ]
            : ( $typePrefixes[ $type ] ?? 'pr' );

        $defaultLink = $type === 'all' ? url( '/products' ) : url( '/products/' . $type );
        $bannerLink = $link ?: $defaultLink;

        return collect( range( 1, 3 ) )
            ->map( function ( $number ) use ( $prefix, $bannerLink ) {
                $image = sprintf( 'assets/images/products_banners/%s%02d.png', $prefix, $number );

                return [
                    'image' => asset( $image ),
                    'url' => $bannerLink,
                ];
            } )
            ->all();
    }

    public function productDetailsByType( string $type, string $url ) {
        return $this->printerCategoryProductsDetails( $url );
    }

    public function printerCategoryProductsDetails( $url ) {
        $product = Product::query()
            ->where( 'slug', $url )
            ->where( 'status', 'A' )
            ->firstOrFail();

        $category = Category::query()
            ->where( 'id', $product->cat_id )
            ->first();

        $detailsPage = ProductsDetailsPage::query()
            ->where( 'slug', $url )
            ->where( 'status', 'A' )
            ->first();

        $gallery = collect( [
            [ 'image' => $product->img1, 'alt' => $product->name, 'label' => $product->name . ' image 1' ],
            [ 'image' => $product->img2, 'alt' => $product->name, 'label' => $product->name . ' image 2' ],
            [ 'image' => $product->img3, 'alt' => $product->name, 'label' => $product->name . ' image 3' ],
            [ 'image' => $product->img4, 'alt' => $product->name, 'label' => $product->name . ' image 4' ],
        ] )
            ->filter( fn ( $thumb ) => ! empty( $thumb[ 'image' ] ) )
            ->values()
            ->all();

        $overviewRows = ProductOverview::query()
            ->where( 'product_id', $product->id )
            ->where( 'status', 'A' )
            ->orderBy( 'id', 'asc' )
            ->get();

        $overviewFeatures = $overviewRows
            ->filter( fn ( $row ) => ! empty( $row->headkey ) || ! empty( $row->value ) )
            ->map( fn ( $row ) => [
                'title' => $row->headkey,
                'description' => $row->value,
            ] )
            ->values()
            ->all();

        $overviewNotes = $overviewRows
            ->pluck( 'overview' )
            ->filter()
            ->unique()
            ->values()
            ->all();

        $specTabLabels = [
            'top-specs' => 'Top Specs',
            'all-specs' => 'All Specs',
            'logistics' => 'Logistics',
            'sustainability' => 'Sustainability',
        ];

        $specificationRows = ProductSpecification::query()
            ->where( 'product_id', $product->id )
            ->where( 'status', 'A' )
            ->orderBy( 'id', 'asc' )
            ->get();

        $specTabs = $specificationRows
            ->groupBy( fn ( $row ) => Str::slug( $row->tab ?: 'Top Specs' ) )
            ->mapWithKeys( function ( $rows, $tabKey ) use ( $specTabLabels ) {
                $label = $specTabLabels[ $tabKey ] ?? $rows->first()->tab;

                return [
                    $tabKey => [
                        'label' => $label,
                        'rows' => $rows
                            ->map( fn ( $row ) => [
                                'headkey' => $row->headkey,
                                'value' => $row->value,
                            ] )
                            ->values()
                            ->all(),
                    ],
                ];
            } )
            ->all();

        $blogIds = collect( explode( ',', (string) $product->blog_ids ) )
            ->map( fn ( $id ) => trim( $id ) )
            ->filter()
            ->map( fn ( $id ) => (int) $id )
            ->filter()
            ->values()
            ->all();

        $blogs = Blog::query()
            ->where( 'status', 'A' )
            ->when( ! empty( $blogIds ), fn ( $query ) => $query->whereIn( 'id', $blogIds ) )
            ->orderBy( 'id', 'desc' )
            ->limit( 4 )
            ->get()
            ->map( fn ( $blog ) => [
                'id' => $blog->id,
                'heading' => $blog->heading,
                'slug' => $blog->slug,
                'content' => $blog->content,
                'image1' => $blog->image1,
                'image2' => $blog->image2,
                'image3' => $blog->image3,
                'inserted_at' => $blog->inserted_at,
            ] )
            ->values()
            ->all();

        $detailsData = [
            'seo' => [
                'title' => $detailsPage->meta_title ?? $product->name,
                'description' => $detailsPage->meta_description ?? $product->short_description,
            ],
            'breadcrumb' => [
                'store' => 'Product Store',
                'parent_category' => $product->parent_cat,
                'category' => $category ? [
                    'id' => $category->id,
                    'name' => $category->name,
                    'url' => $category->url,
                ] : null,
                'product_name' => $product->name,
            ],
            'hero' => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'status' => $product->status,
                'stock_status' => $product->stock_status,
                'badge' => $product->featured,
                'lifecycle' => 'May 31, 2020 - Dec 30, 2030',
                'summary' => $product->short_description,
                'price' => $product->price,
                'quote_url' => route( 'product.enquiry.show', $product->slug ),
            ],
            'gallery' => $gallery,
            'overview' => [
                'description' => $product->overview_description,
                'features' => $overviewFeatures,
                'notes' => $overviewNotes,
            ],
            'specifications' => $specTabs,
            'specification_description' => $product->specification_description,
            'blog_ids' => $blogIds,
            'blogs' => $blogs,
        ];

        // dd([
        //     'page' => 'Product details page blogs',
        //     'route' => request()->fullUrl(),
        //     'product' => [
        //         'id' => $product->id,
        //         'name' => $product->name,
        //         'slug' => $product->slug,
        //         'blog_ids' => $blogIds,
        //     ],
        //     'blogs' => collect($blogs)->map(function ($blog) {
        //         $images = collect([$blog['image1'], $blog['image2'], $blog['image3']])
        //             ->filter()
        //             ->values();
        //         $resolved = $images->mapWithKeys(function ($image) {
        //             $image = ltrim((string) $image, '/');
        //             $candidates = str_starts_with($image, 'assets/')
        //                 ? [$image]
        //                 : [$image, 'assets/images/blog/' . $image];
        //             $path = collect($candidates)
        //                 ->first(fn ($candidate) => file_exists(public_path($candidate)));

        //             return [$image => $path ? asset($path) : null];
        //         });

        //         return [
        //             'id' => $blog['id'],
        //             'heading' => $blog['heading'],
        //             'slug' => $blog['slug'],
        //             'db_images' => $images->all(),
        //             'resolved_urls' => $resolved->filter()->values()->all(),
        //             'missing_images' => $resolved->filter(fn ($url) => $url === null)->keys()->all(),
        //         ];
        //     })->values()->all(),
        // ]);

        return view( 'themes.sarab.products.product_details', compact( 'detailsData' ) );
    }






}
