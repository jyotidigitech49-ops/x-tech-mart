<?php

namespace App\Http\Controllers;

class DisclaimerController extends Controller
{
    public function index()
    {
        $disclaimer = [
            'title' => 'Website Disclaimer',
            'date' => 'July, 2026',
            'intro' => [
                'The information provided on Zero Tech Mart ("the Website," "we," "our," or "us") is intended for general informational, educational, and business reference purposes only.',
                'By accessing and using this website, you acknowledge that you have read, understood, and agreed to the terms of this Disclaimer. If you do not agree with any part of this Disclaimer, you should discontinue use of the website.',
                'Zero Tech Mart operates as a technology, information, and product discovery platform. The website provides information regarding technology products, including but not limited to printers, scanners, desktops, thin clients, and related business technology solutions.',
            ],
            'sections' => [
                [
                    'title' => 'Informational Purpose Only',
                    'body' => [
                        'The content published on this website is provided solely for informational and reference purposes.',
                        'Information available on the website may include:',
                    ],
                    'items' => [
                        'Product Descriptions',
                        'Product Specifications',
                        'Product Features',
                        'Product Images',
                        'Product Categories',
                        'Product Comparisons',
                        'Industry Information',
                        'Technology Content',
                        'Informational Resources',
                    ],
                    'note' => 'The information provided should not be interpreted as professional, technical, legal, financial, business, or purchasing advice.',
                    'notes' => [
                        'Users are encouraged to independently verify information before making decisions based on website content.',
                    ],
                ],
                [
                    'title' => 'No Sales Offer',
                    'body' => ['Content displayed on this website does not constitute:'],
                    'items' => [
                        'A Sales Offer',
                        'A Purchase Agreement',
                        'A Binding Proposal',
                        'A Product Guarantee',
                        'A Commitment To Supply Products',
                        'A Contractual Obligation',
                    ],
                    'note' => 'The presence of a product, service, specification, image, or description on the website should not be interpreted as a guarantee of availability, pricing, or future accessibility.',
                    'notes' => [
                        'Any information request or quote request submitted through the website is intended solely to facilitate communication and information exchange.',
                    ],
                ],
                [
                    'title' => 'Product Information Disclaimer',
                    'body' => [
                        'Reasonable efforts are made to provide accurate and up-to-date information; however, Zero Tech Mart does not warrant that all information displayed on the website is complete, current, accurate, or error-free.',
                        'Product information may change without notice, including:',
                    ],
                    'items' => [
                        'Specifications',
                        'Features',
                        'Configurations',
                        'Availability',
                        'Images',
                        'Compatibility Information',
                        'Technical Details',
                    ],
                    'note' => 'Manufacturers and suppliers may update product information at any time.',
                    'notes' => [
                        'Users should independently verify all information before relying upon it.',
                    ],
                ],
                [
                    'title' => 'Product Images Disclaimer',
                    'body' => [
                        'Images displayed on the website are provided for illustrative and identification purposes only.',
                        'Actual products may differ from displayed images due to:',
                    ],
                    'items' => [
                        'Product Revisions',
                        'Manufacturing Updates',
                        'Regional Variations',
                        'Display Settings',
                        'Product Configurations',
                    ],
                    'note' => 'Product images should not be considered an exact representation of any specific product unless expressly stated.',
                ],
                [
                    'title' => 'Product Availability Disclaimer',
                    'body' => [
                        'Product availability may vary and is subject to change without notice.',
                        'The website does not guarantee:',
                    ],
                    'items' => [
                        'Product Availability',
                        'Product Continuity',
                        'Future Inventory',
                        'Product Supply',
                        'Product Access',
                    ],
                    'note' => 'Availability information displayed on the website may not reflect real-time inventory conditions.',
                ],
                [
                    'title' => 'Quote Request Disclaimer',
                    'body' => [
                        'Users may submit quote requests or product inquiries through the website.',
                        'Submission of a quote request:',
                    ],
                    'items' => [
                        'Does Not Create A Purchase Agreement',
                        'Does Not Guarantee Product Availability',
                        'Does Not Guarantee Pricing',
                        'Does Not Reserve Inventory',
                        'Does Not Create Contractual Obligations',
                        'Does Not Guarantee A Response',
                    ],
                    'note' => 'Quote requests are intended solely to facilitate communication regarding products and related information.',
                ],
                [
                    'title' => 'Third-Party Brand Disclaimer',
                    'body' => [
                        'The website may reference third-party brands, product names, trademarks, logos, and trade names.',
                        'All trademarks, service marks, product names, logos, and brand names remain the property of their respective owners.',
                        'References to third-party products and brands are provided solely for:',
                    ],
                    'items' => [
                        'Product Identification',
                        'Informational Purposes',
                        'Compatibility References',
                        'Descriptive Purposes',
                    ],
                    'secondary_description' => 'Such references do not imply:',
                    'secondary_items' => [
                        'Ownership',
                        'Sponsorship',
                        'Partnership',
                        'Affiliation',
                        'Endorsement',
                        'Authorization',
                    ],
                    'note' => 'Unless expressly stated.',
                ],
                [
                    'title' => 'No Professional Advice',
                    'body' => ['Content available on the website should not be considered:'],
                    'items' => [
                        'Legal Advice',
                        'Financial Advice',
                        'Tax Advice',
                        'Technical Advice',
                        'Procurement Advice',
                        'Business Advice',
                    ],
                    'note' => 'Users should seek appropriate professional guidance before making decisions based on information provided on the website.',
                ],
                [
                    'title' => 'Third-Party Links Disclaimer',
                    'body' => [
                        'The website may contain links to external websites operated by third parties.',
                        'These links are provided solely for convenience and informational purposes.',
                        'Zero Tech Mart does not control and is not responsible for:',
                    ],
                    'items' => [
                        'Third-Party Content',
                        'Third-Party Policies',
                        'Third-Party Security Practices',
                        'Third-Party Services',
                        'Third-Party Availability',
                    ],
                    'note' => 'Users access external websites at their own discretion and risk.',
                ],
                [
                    'title' => 'No Warranties',
                    'body' => [
                        'The website and all content are provided on an "as is" and "as available" basis.',
                        'To the fullest extent permitted by law, Zero Tech Mart makes no representations or warranties regarding:',
                    ],
                    'items' => [
                        'Information Accuracy',
                        'Content Completeness',
                        'Website Availability',
                        'Website Performance',
                        'Product Suitability',
                        'Content Reliability',
                        'Error-Free Operation',
                    ],
                    'note' => 'No guarantee is provided that the website will operate without interruption, delay, or technical issues.',
                ],
                [
                    'title' => 'Limitation Of Liability',
                    'body' => ['To the fullest extent permitted by applicable law, Zero Tech Mart shall not be liable for any:'],
                    'items' => [
                        'Direct Damages',
                        'Indirect Damages',
                        'Incidental Damages',
                        'Consequential Damages',
                        'Business Losses',
                        'Lost Revenue',
                        'Lost Opportunities',
                        'Data Loss',
                        'Service Interruptions',
                    ],
                    'secondary_description' => 'arising from:',
                    'secondary_items' => [
                        'Use Of The Website',
                        'Reliance Upon Website Information',
                        'Website Unavailability',
                        'Product Information Errors',
                        'Third-Party Content',
                    ],
                    'note' => 'Users assume full responsibility for their use of the website and reliance upon website content.',
                ],
                [
                    'title' => 'Website Availability',
                    'body' => [
                        'While reasonable efforts are made to maintain website accessibility, Zero Tech Mart does not guarantee uninterrupted access to the website.',
                        'The website may be modified, suspended, restricted, or discontinued at any time without prior notice.',
                    ],
                ],
                [
                    'title' => 'Changes To This Disclaimer',
                    'body' => [
                        'Zero Tech Mart reserves the right to update, modify, or replace this Disclaimer at any time.',
                        'Changes become effective immediately upon publication on the website.',
                        'Continued use of the website after updates constitutes acceptance of the revised Disclaimer.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => [
                        'If you have questions regarding this Disclaimer or the information provided on the website, please contact us using the details below.',
                    ],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Disclaimer',
                    'body' => [
                        'By accessing, browsing, or using the website, submitting inquiries, or interacting with website content, you acknowledge that you have read, understood, and agreed to this Disclaimer.',
                    ],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.policy.disclaimer', compact('disclaimer', 'bannerImage'));
    }
}
