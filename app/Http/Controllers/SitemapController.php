<?php

namespace App\Http\Controllers;

class SitemapController extends Controller {
    public function index() {
        $mainPages = [
            [ 'title' => 'Home', 'url' => url( '/' ) ],
            [ 'title' => 'About Us', 'url' => url( '/about-us' ) ],
            [ 'title' => 'Products', 'url' => url( '/products' ) ],
            [ 'title' => 'Blogs', 'url' => url( '/blogs' ) ],
            [ 'title' => 'Contact Us', 'url' => url( '/contact-us' ) ],
            [ 'title' => 'FAQS', 'url' => url( '/faqs' ) ],
        ];

        $productCategories = [
            [
                'title' => 'Printer',
                'url' => url( '/products/printer' ),
                'children' => [
                    [ 'title' => 'Officejet Printer', 'url' => url( '/products/printer/officejet-printer' ) ],
                    [ 'title' => 'Laserjet Printer', 'url' => url( '/products/printer/laserjet-printer' ) ],
                    [ 'title' => 'Inkjet Printer', 'url' => url( '/products/printer/inkjet-printer' ) ],
                    [ 'title' => 'Deskjet Printer', 'url' => url( '/products/printer/deskjet-printer' ) ],
                ],
            ],
            [ 'title' => 'Desktops', 'url' => url( '/products/desktops' ), 'children' => [] ],
            [ 'title' => 'Thin Client', 'url' => url( '/products/thin-client' ), 'children' => [] ],
            [ 'title' => 'Scanner', 'url' => url( '/products/scanner' ), 'children' => [] ],
        ];

        $productCategories = array_map( function ( $category ) {
            $childTitles = array_column( $category[ 'children' ], 'title' );
            $category[ 'search_text' ] = strtolower( trim( $category[ 'title' ] . ' ' . implode( ' ', $childTitles ) ) );

            return $category;
        }
        , $productCategories );

        $policies = [
            [ 'title' => 'Privacy Policy', 'url' => url( '/privacy-policy' ) ],
            [ 'title' => 'Terms & Conditions', 'url' => url( '/policy/terms-conditions' ) ],
            [ 'title' => 'Website Disclaimer', 'url' => url( '/policy/disclaimer' ) ],
            [ 'title' => 'Trademark Disclaimer', 'url' => url( '/policy/trademark-disclaimer' ) ],
            [ 'title' => 'Cookie Policy', 'url' => url( '/policy/cookie-policy' ) ],
            [ 'title' => 'Quote Request Policy', 'url' => url( '/policy/quote-request-policy' ) ],
            [ 'title' => 'Product Information Disclaimer', 'url' => url( '/policy/product-information-disclaimer' ) ],
            [ 'title' => 'Warranty and Manufacturer Responsibility', 'url' => url( '/policy/warranty-manufacturer-responsibility' ) ],
            [ 'title' => 'DMCA Copyright Policy', 'url' => url( '/policy/dmca-copyright-policy' ) ],

        ];

        $bannerImage = asset( 'assets/images/common-banner/comm-banner.png' );

        return view( 'sitemap.index', compact( 'mainPages', 'productCategories', 'policies', 'bannerImage' ) );
    }
}
