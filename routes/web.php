<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CookiePolicyController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\DmcaCopyrightPolicyController;
use App\Http\Controllers\TrademarkDisclaimerController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductEnquiryController;
use App\Http\Controllers\ProductInformationDisclaimerController;
use App\Http\Controllers\ProductPrinterController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\QuoteRequestPolicyController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TermsConditionsController;
use App\Http\Controllers\WarrantyManufacturerInformationController;
use Illuminate\Support\Facades\Artisan;

Route::get('/welcome', function () {
    return view('welcome');
});

// cache clear route
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:clear');
    return 'Cache cleared successfully!';
});

// about us page route
Route::get('/about-us', [AboutController::class, 'index']);

// contact us page route
Route::get('/contact-us', [ContactUsController::class, 'index']);
Route::post('/contact-submit', [ContactUsController::class, 'store']);

// faq page route
Route::get('/faqs', [FaqController::class, 'index']);

// sitemap page route
Route::get('/sitemap', [SitemapController::class, 'index']);

// policy pages route
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);
Route::get('/policy/terms-conditions', [TermsConditionsController::class, 'index']);
Route::get('/policy/disclaimer', [DisclaimerController::class, 'index']);
Route::get('/policy/trademark-disclaimer', [TrademarkDisclaimerController::class, 'index']);
Route::get('/policy/cookie-policy', [CookiePolicyController::class, 'index']);
Route::get('/policy/quote-request-policy', [QuoteRequestPolicyController::class, 'index']);
Route::get('/policy/product-information-disclaimer', [ProductInformationDisclaimerController::class, 'index']);
Route::get('/policy/dmca-copyright-policy', [DmcaCopyrightPolicyController::class, 'index']);
Route::get('/policy/warranty-manufacturer-responsibility', [WarrantyManufacturerInformationController::class, 'index']);
Route::get('/product-information-disclaimer', fn () => redirect('/policy/product-information-disclaimer'));



// all-dynamics pages route-------------------------------------------

// home page route
// Static Sarab theme preview. The original HomeController and its live-data logic remain preserved.
Route::view('/', 'themes.sarab.home.index');

// product search page route
Route::get('/search/{term?}', [ProductSearchController::class, 'index'])->name('product.search');

// products Printer page route
Route::get('/products', [ProductPrinterController::class, 'allProducts']);
Route::get('/products/printer', [ProductPrinterController::class, 'productsPrinter']);
Route::get('/products/printer/details/{url}', [ProductPrinterController::class, 'printerCategoryProductsDetails']);
Route::get('/products/printer/{url}', [ProductPrinterController::class, 'printerCategoryProducts']);
Route::get('/products/{type}', [ProductPrinterController::class, 'productsByType']);
Route::get('/products/{type}/details/{url}', [ProductPrinterController::class, 'productDetailsByType']);
Route::get('/products/{type}/{url}', [ProductPrinterController::class, 'categoryProductsByType']);

Route::get('/products-enquiry', fn () => redirect('/products/printer'));
Route::get('/product/enquiry/{url}', [ProductEnquiryController::class, 'show'])->name('product.enquiry.show');
Route::post('/product/enquiry/{url}', [ProductEnquiryController::class, 'store'])->name('product.enquiry.store');


// blog page route
Route::get('/blog/details/{url}', [BlogController::class, 'index']);
Route::get('/blogs', [BlogController::class, 'list']);
Route::get('/blogs/{url}', [BlogController::class, 'index']);
