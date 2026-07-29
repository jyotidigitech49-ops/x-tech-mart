<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSearchController extends Controller
{
    public function index(Request $request, ?string $term = null)
    {
        $rawSearch = trim((string) ($term ?: $request->query('q', '')));
        $searchText = trim(str_replace('-', ' ', $rawSearch));
        $categoryFilter = trim((string) $request->query('category', ''));

        $categories = Category::query()
            ->where('parent_id', 0)
            ->where('status', 'A')
            ->orderBy('sort', 'asc')
            ->get();

        $matchedCategory = $this->matchedCategory($searchText, $categoryFilter);
        $categoryIds = $this->categoryIds($matchedCategory);
        $hasCategoryFilter = $categoryFilter !== '' && strtolower($categoryFilter) !== 'all';
        $shouldSearchText = $searchText !== '' && ($categoryIds->isEmpty() || $hasCategoryFilter);

        $products = Product::query()
            ->leftJoin('categories', 'categories.id', '=', 'products.cat_id')
            ->where('products.status', 'A')
            ->when($categoryIds->isNotEmpty(), fn ($query) => $query->whereIn('products.cat_id', $categoryIds))
            ->when($shouldSearchText, function ($query) use ($searchText) {
                $like = '%' . $searchText . '%';

                $query->where(function ($inner) use ($like) {
                    $inner->where('products.name', 'like', $like)
                        ->orWhere('products.slug', 'like', $like)
                        ->orWhere('products.parent_cat', 'like', $like)
                        ->orWhere('products.short_description', 'like', $like)
                        ->orWhere('categories.name', 'like', $like)
                        ->orWhere('categories.url', 'like', $like);
                });
            })
            ->orderBy('products.id', 'desc')
            ->select('products.*', 'categories.name as category_name', 'categories.url as category_url')
            ->get();

        $displaySearch = $searchText ?: 'All Products';
        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.products.search_results', compact(
            'categories',
            'products',
            'displaySearch',
            'searchText',
            'categoryFilter',
            'matchedCategory',
            'bannerImage'
        ));
    }

    private function matchedCategory(string $searchText, string $categoryFilter): ?Category
    {
        $value = $categoryFilter !== '' && strtolower($categoryFilter) !== 'all'
            ? $categoryFilter
            : $searchText;

        if ($value === '') {
            return null;
        }

        $slug = Str::slug($value);

        return Category::query()
            ->where('status', 'A')
            ->where(function ($query) use ($value, $slug) {
                $query->where('url', $slug)
                    ->orWhere('name', 'like', '%' . $value . '%');
            })
            ->orderBy('parent_id', 'asc')
            ->first();
    }

    private function categoryIds(?Category $category)
    {
        if (! $category) {
            return collect();
        }

        if ((int) $category->parent_id !== 0) {
            return collect([$category->id]);
        }

        $children = Category::query()
            ->where('parent_id', $category->id)
            ->where('status', 'A')
            ->pluck('id');

        return $children->isNotEmpty() ? $children : collect([$category->id]);
    }
}
