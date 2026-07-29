<?php

namespace App\Http\Controllers;

class TermsConditionsController extends Controller
{
    public function index()
    {
        $terms = [
            'title' => 'Terms and Conditions',
            'date' => 'July, 2026',
            'intro' => [
                'Welcome to Zero Tech Mart. These Terms and Conditions govern your access to and use of our website, content, services, quote request forms, and related resources.',
                'By accessing, browsing, or using this website, you acknowledge that you have read, understood, and agreed to be bound by these Terms and Conditions. If you do not agree with any part of these Terms, you should discontinue use of the website immediately.',
                'Zero Tech Mart operates as a technology, information, and product discovery platform. The website provides information regarding printers, scanners, desktops, thin clients, and related technology products. The website may also allow users to submit inquiries and request product-related information.',
            ],
            'sections' => [
                [
                    'title' => 'Website Purpose',
                    'body' => [
                        'The information provided on this website is intended for general informational and business purposes only.',
                        'Zero Tech Mart:',
                    ],
                    'items' => [
                        'Provides product-related information.',
                        'Allows users to submit quote requests and inquiries.',
                        'Facilitates communication regarding product availability and specifications.',
                        'Does not guarantee product availability, pricing, or future supply.',
                        'Does not create a binding sales agreement through quote request submissions.',
                    ],
                    'note' => 'The content displayed on the website should not be interpreted as a contractual offer to sell products.',
                ],
                [
                    'title' => 'Eligibility To Use The Website',
                    'body' => [
                        'By using the website, you represent and warrant that:',
                    ],
                    'items' => [
                        'You are at least 18 years of age.',
                        'You have the legal authority to enter into agreements.',
                        'You will use the website in accordance with applicable laws and regulations.',
                        'Information submitted through forms is accurate and truthful.',
                    ],
                    'note' => 'Users are responsible for maintaining the accuracy of information submitted through the website.',
                ],
                [
                    'title' => 'Product Information',
                    'body' => [
                        'The website may display product descriptions, specifications, features, images, documentation, and related information.',
                        'While reasonable efforts are made to maintain accurate information:',
                    ],
                    'items' => [
                        'Product specifications may change without notice.',
                        'Product images may differ from actual products.',
                        'Product availability may vary.',
                        'Product descriptions may contain errors, omissions, or inaccuracies.',
                        'Information may become outdated over time.',
                    ],
                    'note' => 'Users should independently verify important product information before relying upon it.',
                ],
                [
                    'title' => 'Quote Requests And Enquiries',
                    'body' => [
                        'Users may submit quote requests, information requests, or product inquiries through the website.',
                        'Submission of a quote request:',
                    ],
                    'items' => [
                        'Does not constitute a purchase agreement.',
                        'Does not guarantee product availability.',
                        'Does not guarantee pricing.',
                        'Does not obligate either party to complete a transaction.',
                        'Is intended solely to facilitate communication and information exchange.',
                    ],
                    'note' => 'Zero Tech Mart reserves the right to respond, decline, or not respond to inquiries at its discretion.',
                ],
                [
                    'title' => 'User Responsibilities',
                    'body' => [
                        'Users agree to:',
                    ],
                    'items' => [
                        'Provide accurate information.',
                        'Use the website lawfully.',
                        'Respect intellectual property rights.',
                        'Avoid submitting misleading information.',
                        'Avoid interfering with website functionality.',
                        'Avoid attempting unauthorized access to website systems.',
                    ],
                    'note' => 'Users are responsible for their own actions while using the website.',
                ],
                [
                    'title' => 'Prohibited Activities',
                    'body' => [
                        'Users may not:',
                    ],
                    'items' => [
                        'Use the website for unlawful purposes.',
                        'Upload malicious software or code.',
                        'Attempt unauthorized access to systems or data.',
                        'Interfere with website security measures.',
                        'Copy or reproduce website content without permission.',
                        'Misrepresent their identity or affiliation.',
                        'Submit fraudulent inquiries.',
                    ],
                    'note' => 'Violation of these Terms may result in restricted access or other appropriate actions.',
                ],
                [
                    'title' => 'Intellectual Property Rights',
                    'body' => [
                        'All website content, including:',
                    ],
                    'items' => [
                        'Text',
                        'Graphics',
                        'Logos',
                        'Layouts',
                        'Designs',
                        'Website Features',
                        'Images',
                        'Content Structure',
                    ],
                    'notes' => [
                        'is protected by applicable intellectual property laws unless otherwise stated.',
                        'Users may not reproduce, distribute, modify, publish, or exploit website content without prior written permission.',
                    ],
                ],
                [
                    'title' => 'Third-Party Trademarks',
                    'body' => [
                        'The website may reference third-party brands, products, trademarks, trade names, and logos.',
                        'All trademarks remain the property of their respective owners.',
                        'Any reference to third-party products is provided solely for identification, compatibility, informational, or descriptive purposes.',
                        'Such references do not imply ownership, sponsorship, endorsement, affiliation, or authorization unless expressly stated.',
                    ],
                ],
                [
                    'title' => 'Third-Party Links',
                    'body' => [
                        'The website may contain links to third-party websites for convenience or informational purposes.',
                        'Zero Tech Mart does not control and is not responsible for:',
                    ],
                    'items' => [
                        'Third-party content.',
                        'Privacy practices.',
                        'Security measures.',
                        'Website functionality.',
                        'Information accuracy.',
                    ],
                    'note' => 'Users access third-party websites at their own discretion and risk.',
                ],
                [
                    'title' => 'Disclaimer Of Warranties',
                    'body' => [
                        'The website and its content are provided on an "as is" and "as available" basis.',
                        'Zero Tech Mart makes no representations or warranties regarding:',
                    ],
                    'items' => [
                        'Information accuracy.',
                        'Website availability.',
                        'Website performance.',
                        'Content completeness.',
                        'Product suitability.',
                        'Error-free operation.',
                        'Continuous accessibility.',
                    ],
                    'note' => "Use of the website is entirely at the user's own risk.",
                ],
                [
                    'title' => 'Limitation Of Liability',
                    'body' => [
                        'To the fullest extent permitted by law, Zero Tech Mart shall not be liable for:',
                    ],
                    'items' => [
                        'Direct Damages',
                        'Indirect Damages',
                        'Incidental Damages',
                        'Consequential Damages',
                        'Business Losses',
                        'Lost Revenue',
                        'Lost Opportunities',
                        'Data Loss',
                        'Website Interruptions',
                    ],
                    'notes' => [
                        'arising from the use of or inability to use the website.',
                        'Users assume full responsibility for their reliance upon website content.',
                    ],
                ],
                [
                    'title' => 'Privacy',
                    'body' => [
                        'Use of the website is also governed by the Privacy Policy.',
                        'Users are encouraged to review the Privacy Policy to understand how information is collected, used, and protected.',
                    ],
                ],
                [
                    'title' => 'Changes To These Terms',
                    'body' => [
                        'Zero Tech Mart reserves the right to modify, update, or replace these Terms and Conditions at any time without prior notice.',
                        'Changes become effective immediately upon publication on the website.',
                        'Continued use of the website following updates constitutes acceptance of the revised Terms.',
                    ],
                ],
                [
                    'title' => 'Governing Law',
                    'body' => [
                        'These Terms and Conditions shall be governed by and interpreted in accordance with the applicable laws of the jurisdiction in which Zero Tech Mart operates, without regard to its conflict of laws principles.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => [
                        'If you have questions regarding these Terms and Conditions, please contact us using the details below.',
                    ],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of These Terms',
                    'body' => [
                        'By accessing, browsing, or using this website, submitting inquiries, or interacting with the platform, you acknowledge that you have read, understood, and agreed to these Terms and Conditions.',
                    ],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.policy.terms', compact('terms', 'bannerImage'));
    }
}
