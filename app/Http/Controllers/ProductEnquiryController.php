<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductEnquiry;
use Illuminate\Http\Request;

class ProductEnquiryController extends Controller
{
    public function show(string $url)
    {
        $product = Product::query()
            ->where('slug', $url)
            ->where('status', 'A')
            ->firstOrFail();

        $category = Category::query()
            ->where('id', $product->cat_id)
            ->first();

        $enquiryData = $this->buildEnquiryData($product, $category);

        // dd($enquiryData);

        return view('products.product_enquiry', compact('enquiryData'));
    }

    public function store(Request $request, string $url)
    {
        $product = Product::query()
            ->where('slug', $url)
            ->where('status', 'A')
            ->firstOrFail();

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
            'quantity' => ['required', 'integer', 'min:1'],
            'company' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string'],
        ]);

        ProductEnquiry::create([
            'product_id' => $product->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'quantity' => $validated['quantity'],
            'company' => $validated['company'] ?? null,
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'inserted_at' => now(),
        ]);

        return back()->with('success', 'Your product enquiry has been submitted successfully.');
    }

    private function buildEnquiryData(Product $product, ?Category $category): array
    {
        return [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'image' => $this->productImage($product->img1),
                'short_description' => $product->short_description,
                'stock_status' => $product->stock_status,
            ],
            'category' => [
                'id' => $category?->id,
                'name' => $category?->name ?? $product->parent_cat ?? 'Product',
                'url' => $category?->url,
            ],
            'support' => 'Dedicated Product Assistance',
            'response_time' => 'Response Within 24 Hours',
            'form_action' => route('product.enquiry.store', $product->slug),
        ];
    }

    private function productImage(?string $image): string
    {
        $image = trim(str_replace('\\', '/', (string) $image));
        $fallback = 'assets/images/product/printer.png';

        if ($image === '') {
            return asset($fallback);
        }

        $urlPath = parse_url($image, PHP_URL_PATH);
        $image = ltrim($urlPath ?: $image, '/');
        $image = preg_replace('#^public/#i', '', $image);

        if (! str_starts_with(strtolower($image), 'assets/')) {
            $image = 'assets/images/product/' . $image;
        }

        return asset($image);
    }
}
