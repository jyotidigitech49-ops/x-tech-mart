<?php

namespace App\Http\Controllers;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = [
            [
                'question' => 'What is XTech Mart?',
                'answer' => 'XTech Mart is an independent technology information and product discovery platform featuring printers, scanners, desktops, and thin clients for home, office, and professional use.',
            ],
            [
                'question' => 'Can I purchase products directly from the website?',
                'answer' => 'No. XTech Mart does not offer direct checkout or online purchasing. Visitors can review product information and submit a quote request for pricing and availability.',
            ],
            [
                'question' => 'Which product categories are available?',
                'answer' => 'The website includes printers, scanners, desktops, and thin clients. Printer listings may also appear under OfficeJet, LaserJet, Inkjet, and DeskJet categories.',
            ],
            [
                'question' => 'How do I request a product quote?',
                'answer' => 'Open the relevant product page, select the quote option, and provide the requested details. The submitted information helps the team respond according to your product requirements.',
            ],
            [
                'question' => 'What information is included on product pages?',
                'answer' => 'Product pages may include descriptions, specifications, key features, intended applications, connectivity details, and other practical information to support product research.',
            ],
            [
                'question' => 'How can I choose a suitable product?',
                'answer' => 'Consider your workload, available space, connectivity needs, preferred features, and intended use. Reviewing several listings can make product comparison more focused and useful.',
            ],
            [
                'question' => 'Are product prices displayed on the website?',
                'answer' => 'Prices may not always appear because product cost and availability can change. A quote request provides a clearer way to ask for current pricing information.',
            ],
            [
                'question' => 'Does XTech Mart provide manufacturer warranties?',
                'answer' => 'XTech Mart does not issue manufacturer warranties unless clearly stated in writing. Warranty coverage, claims, repairs, and replacements generally remain the manufacturer’s responsibility.',
            ],
            [
                'question' => 'Are all listed products currently available?',
                'answer' => 'A product listing does not confirm immediate stock. Availability may vary by model, configuration, and timing, so visitors should request current information before making a decision.',
            ],
            [
                'question' => 'Can I contact the team for product guidance?',
                'answer' => 'Yes. Visitors can use the contact or quote form to ask about product details, category options, availability, pricing, or general selection guidance.',
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('faq.index', compact('faqs', 'bannerImage'));
    }
}
