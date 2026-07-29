<?php

namespace App\Http\Controllers;

class ProductInformationDisclaimerController extends Controller
{
    public function index()
    {
        $productDisclaimer = [
            'title' => 'Product Information Disclaimer',
            'date' => 'July 2026',
            'intro' => [
                'This Product Information Disclaimer explains the limitations, conditions, and intended use of the product-related information presented on the Zero Tech Mart website.',
                'Zero Tech Mart operates as a technology, information, and product discovery platform. The website provides information regarding printers, scanners, desktops, thin clients, and other technology-related products for informational and reference purposes.',
                'By accessing and using the website, you acknowledge and agree to the terms outlined in this Product Information Disclaimer.',
            ],
            'sections' => [
                [
                    'title' => 'Informational Purpose Only',
                    'body' => [
                        'All product-related content displayed on the website is provided solely for general informational, educational, and reference purposes.',
                        'Product information may include:',
                    ],
                    'items' => ['Product Names', 'Product Descriptions', 'Product Specifications', 'Product Features', 'Product Categories', 'Product Images', 'Product Documentation References', 'Compatibility Information', 'Technical Details', 'Informational Content'],
                    'notes' => [
                        'The information provided should not be interpreted as professional advice, purchasing advice, technical recommendations, or guarantees regarding product performance.',
                        'Users are encouraged to independently verify all information before making business, purchasing, or operational decisions.',
                    ],
                    'highlight' => true,
                ],
                [
                    'title' => 'No Guarantee Of Accuracy',
                    'body' => ['While reasonable efforts are made to maintain accurate and current information, Zero Tech Mart does not guarantee that all product information available on the website is:'],
                    'items' => ['Complete', 'Accurate', 'Current', 'Error-Free', 'Up-To-Date', 'Suitable For Specific Purposes'],
                    'notes' => [
                        'Manufacturers and suppliers may update product information without notice, and website content may not always immediately reflect such changes.',
                        'Users should independently verify important information before relying upon it.',
                    ],
                ],
                [
                    'title' => 'Product Specifications',
                    'body' => ['Product specifications presented on the website are provided for informational purposes only.', 'Specifications may include:'],
                    'items' => ['Dimensions', 'Technical Features', 'Hardware Configurations', 'Connectivity Information', 'Performance Information', 'System Requirements', 'Functional Capabilities'],
                    'secondary_description' => 'Specifications may change without prior notice due to:',
                    'secondary_items' => ['Manufacturer Updates', 'Product Revisions', 'Regional Variations', 'Model Changes', 'Production Modifications'],
                    'note' => 'Zero Tech Mart does not guarantee that listed specifications remain unchanged after publication.',
                ],
                [
                    'title' => 'Product Features',
                    'body' => ['Descriptions of product features are based on information available at the time of publication.', 'Feature availability may vary depending on:'],
                    'items' => ['Product Model', 'Product Configuration', 'Geographic Region', 'Software Versions', 'Manufacturer Changes', 'Product Updates'],
                    'note' => 'Users should confirm specific features through official manufacturer documentation or other reliable sources before making decisions based on website content.',
                ],
                [
                    'title' => 'Product Images',
                    'body' => ['Product images displayed on the website are provided for illustrative and identification purposes only.', 'Actual products may differ from displayed images due to:'],
                    'items' => ['Product Revisions', 'Model Variations', 'Configuration Differences', 'Manufacturing Updates', 'Display Settings', 'Regional Differences'],
                    'note' => 'Images should not be interpreted as exact representations of any specific product configuration.',
                ],
                [
                    'title' => 'Product Availability',
                    'body' => ['The appearance of a product on the website does not guarantee:'],
                    'items' => ['Product Availability', 'Product Continuity', 'Future Availability', 'Product Supply', 'Inventory Status'],
                    'notes' => [
                        'Availability may change without notice due to market conditions, supplier updates, manufacturer decisions, or other factors.',
                        'Users should not assume that a product remains available simply because it appears on the website.',
                    ],
                ],
                [
                    'title' => 'Product Compatibility',
                    'body' => ['Any compatibility information provided on the website is intended solely for general informational purposes.', 'Compatibility may vary based on:'],
                    'items' => ['Hardware Configurations', 'Software Environments', 'Operating Systems', 'Firmware Versions', 'Network Environments', 'User Requirements'],
                    'notes' => [
                        'Zero Tech Mart does not guarantee compatibility between any product and a user\'s specific environment or requirements.',
                        'Users are responsible for independently verifying compatibility before relying upon such information.',
                    ],
                ],
                [
                    'title' => 'Product Performance',
                    'body' => ['References to product capabilities, performance characteristics, efficiency, productivity, or functionality are based on information available at the time of publication.', 'Actual performance may vary depending on:'],
                    'items' => ['Usage Conditions', 'Hardware Environment', 'Software Environment', 'Configuration Settings', 'Maintenance Practices', 'User Requirements'],
                    'note' => 'Zero Tech Mart does not guarantee that products will perform in a particular manner or achieve specific results.',
                ],
                [
                    'title' => 'Product Documentation',
                    'body' => ['The website may reference manuals, guides, specifications, technical documents, and other informational materials.', 'Such references are provided solely for informational convenience.', 'Zero Tech Mart does not warrant:'],
                    'items' => ['Accuracy Of Third-Party Documentation', 'Completeness Of Documentation', 'Continued Availability Of Documentation', 'Current Validity Of Documentation'],
                    'note' => 'Users should consult official documentation sources whenever possible.',
                ],
                [
                    'title' => 'No Product Recommendations',
                    'body' => ['Information displayed on the website should not be interpreted as:'],
                    'items' => ['Product Recommendations', 'Product Endorsements', 'Professional Advice', 'Technical Consulting', 'Procurement Guidance'],
                    'notes' => [
                        'The website provides information intended to assist users in conducting their own research and evaluation.',
                        'Users remain responsible for determining whether a product is suitable for their needs.',
                    ],
                ],
                [
                    'title' => 'Third-Party Information',
                    'body' => ['Certain product information may originate from third-party sources, manufacturers, suppliers, or publicly available materials.', 'Zero Tech Mart does not guarantee:'],
                    'items' => ['Accuracy Of Third-Party Information', 'Completeness Of Third-Party Information', 'Current Validity Of Third-Party Information', 'Availability Of Third-Party Content'],
                    'note' => 'Users should independently verify information obtained from external sources.',
                ],
                [
                    'title' => 'No Warranty Regarding Product Information',
                    'body' => ['All product information is provided on an "as is" and "as available" basis.', 'Zero Tech Mart makes no representations or warranties regarding:'],
                    'items' => ['Product Information Accuracy', 'Product Information Completeness', 'Product Information Reliability', 'Product Suitability', 'Product Availability', 'Product Performance'],
                    'note' => 'Users rely upon product information at their own discretion and risk.',
                    'highlight' => true,
                ],
                [
                    'title' => 'Limitation Of Liability',
                    'body' => ['To the fullest extent permitted by applicable law, Zero Tech Mart shall not be liable for any losses, damages, costs, or consequences arising from:'],
                    'items' => ['Reliance Upon Product Information', 'Product Information Errors', 'Product Information Omissions', 'Product Availability Changes', 'Product Specification Changes', 'Product Compatibility Issues', 'Product Performance Differences'],
                    'note' => 'Users are solely responsible for evaluating information before making decisions based on website content.',
                ],
                [
                    'title' => 'Changes To Product Information',
                    'body' => [
                        'Product information may be modified, updated, corrected, removed, or replaced at any time without prior notice.',
                        'Zero Tech Mart is under no obligation to update previously published information immediately following changes by manufacturers or suppliers.',
                        'Users should regularly verify important information through reliable sources.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => ['If you have questions regarding this Product Information Disclaimer or product-related content displayed on the website, please contact us using the details below.'],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Disclaimer',
                    'body' => ['By accessing, browsing, or using the website, submitting inquiries, or relying upon product-related information, you acknowledge that you have read, understood, and agreed to the terms outlined in this Product Information Disclaimer.'],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.policy.product-information-disclaimer', compact('productDisclaimer', 'bannerImage'));
    }
}
