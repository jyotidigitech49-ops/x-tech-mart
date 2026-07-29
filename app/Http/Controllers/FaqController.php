<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = [
            [
                'question' => 'What is XTechMart?',
                'answer' => 'XTechMart is an independent technology platform that helps users explore printers, scanners, desktops, and thin clients through detailed product information, organized categories, and personalized quote assistance.',
            ],
            [
                'question' => 'Does XTechMart sell products directly?',
                'answer' => 'No. XTechMart is not an online store. The platform provides product information and allows users to request a personalized quote based on their requirements.',
            ],
            [
                'question' => 'What types of products can I explore?',
                'answer' => 'XTechMart features a range of technology products, including printers, scanners, desktops, and thin clients, along with their respective categories and product details.',
            ],
            [
                'question' => 'How do I request a quote?',
                'answer' => "Simply select the product you're interested in and use the Request a Quote option. Provide your details, and our team will respond with relevant information and pricing guidance.",
            ],
            [
                'question' => 'Can I compare different products?',
                'answer' => 'Yes. Product pages include detailed specifications, features, and descriptions to help you compare available options and make informed decisions.',
            ],
            [
                'question' => 'Who can benefit from XTechMart?',
                'answer' => 'The platform is designed for businesses, professionals, educational institutions, and home users seeking reliable technology solutions and product guidance.',
            ],
            [
                'question' => 'Does XTechMart provide product recommendations?',
                'answer' => 'Yes. Based on your requirements, our team can help guide you toward technology solutions that best suit your workspace, business, or personal needs.',
            ],
            [
                'question' => 'Are the product specifications regularly updated?',
                'answer' => 'XTechMart strives to present accurate and up-to-date product information. Specifications and availability may change over time, so users are encouraged to request the latest details when submitting a quote request.',
            ],
            [
                'question' => 'How can I contact XTechMart?',
                'answer' => 'You can reach our team through the Contact page or submit an inquiry using the Request a Quote form for product-related questions and assistance.',
            ],
            [
                'question' => 'Why choose XTechMart?',
                'answer' => 'XTechMart combines thoughtfully organized product collections, detailed technology insights, and personalized quote assistance to simplify product discovery and help users make confident technology decisions.',
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.faq.index', compact('faqs', 'bannerImage'));
    }
}
