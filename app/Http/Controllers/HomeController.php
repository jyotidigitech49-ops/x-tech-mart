<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {

        $parentCategories = Product::where( 'status', 'A' )

        ->select( 'parent_cat' )

        ->distinct()

        ->pluck( 'parent_cat' );

        $productTabs = [];

        // Featured Tab

        $productTabs[ 'featured' ] = [

            'label' => 'Featured',

            'products' => Product::where( 'status', 'A' )

            ->inRandomOrder()

            ->limit( 10 )

            ->get(),

        ];

        // Dynamic Tabs

        foreach ( $parentCategories as $parentCat ) {

            $key = Str::slug( $parentCat, '_' );

            $productTabs[ $key ] = [

                'label' => $parentCat,

                'products' => Product::where( 'status', 'A' )

                ->where( 'parent_cat', $parentCat )

                ->limit( 10 )

                ->get(),

            ];

        }

        // suggested products
        $suggestedProducts = Product::where( 'status', 'A' )
        ->inRandomOrder()
        ->limit( 15 )
        ->get();

        //blogs-list-random---
        $blogPosts = Blog::where( 'status', 'A' )
            ->inRandomOrder()
            ->limit( 6 )
            ->get();

        $homeCategories = Category::query()
            ->where( 'parent_id', 0 )
            ->where( 'status', 'A' )
            ->orderBy( 'sort', 'asc' )
            ->get()
            ->each( function ( Category $category ) {
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

        $footerBanners = [
            [
                'image' => asset('assets/images/banner/business-technology-solutions.jpg'),
                'url' => url('/products'),
                'alt' => 'Discover technology that moves your business forward',
            ],
            [
                'image' => asset('assets/images/banner/smarter-technology-decisions.jpg'),
                'url' => url('/contact-us'),
                'alt' => 'Turn better choices into smarter technology decisions',
            ],
            [
                'image' => asset('assets/images/banner/technology-product-guidance.jpg'),
                'url' => url('/products'),
                'alt' => 'Find the right information for your next technology solution',
            ],
        ];

        // dd([
        //     'page' => 'Home page',
        //     'route' => url('/'),
        //     'blogs' => $blogPosts->map(fn (Blog $blog) => $this->blogImageDebugData($blog))->values()->all(),
        // ]);

        return view( 'themes.sarab.home.index', compact(
            'productTabs',
            'suggestedProducts',
            'blogPosts',
            'homeCategories',
            'footerBanners'
        ) );

    }

    private function blogImageDebugData(Blog $blog): array
    {
        $images = collect([$blog->image1, $blog->image2, $blog->image3])
            ->filter()
            ->values();

        $resolved = $images->mapWithKeys(function ($image) {
            $path = trim(str_replace('\\', '/', (string) $image));
            $urlPath = parse_url($path, PHP_URL_PATH);
            $path = ltrim($urlPath ?: $path, '/');
            $path = preg_replace('#^public/#i', '', $path);

            if ($path !== '' && ! str_starts_with(strtolower($path), 'assets/')) {
                $path = 'assets/images/blog/' . $path;
            }

            return [$image => $path ? asset($path) : null];
        });

        return [
            'id' => $blog->id,
            'heading' => $blog->heading,
            'slug' => $blog->slug,
            'db_images' => $images->all(),
            'resolved_urls' => $resolved->filter()->values()->all(),
            'missing_images' => $resolved->filter(fn ($url) => $url === null)->keys()->all(),
        ];
    }
}
