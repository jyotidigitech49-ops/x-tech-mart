<?php

namespace App\Http\Controllers;

class QuoteRequestPolicyController extends Controller
{
    public function index()
    {
        $quotePolicy = [
            'title' => 'Quote Request Policy',
            'date' => 'July 2026',
            'intro' => [
                'This Quote Request Policy explains how quote requests and product inquiries submitted through Zero Tech Mart are handled.',
                'Zero Tech Mart operates as a technology, information, and product discovery platform. The website provides information regarding printers, scanners, desktops, thin clients, and related technology products. Users may submit quote requests to obtain additional information regarding products, availability, specifications, or other product-related details.',
                'By submitting a quote request through the website, you acknowledge and agree to the terms outlined in this Policy.',
            ],
            'sections' => [
                [
                    'title' => 'Purpose Of Quote Requests',
                    'body' => ['The quote request feature is intended to facilitate communication between website users and Zero Tech Mart.', 'Quote requests may be used to:'],
                    'items' => ['Request Product Information', 'Request Availability Information', 'Request Product Specifications', 'Discuss Product Requirements', 'Obtain General Product Details', 'Submit Business Inquiries', 'Explore Technology Solutions'],
                    'note' => 'Quote requests are informational in nature and are intended to support communication regarding products and related information.',
                ],
                [
                    'title' => 'No Purchase Agreement',
                    'body' => ['Submission of a quote request does not constitute:'],
                    'items' => ['A Product Purchase', 'A Product Reservation', 'A Sales Contract', 'A Binding Offer', 'A Product Order', 'A Commitment To Buy', 'A Commitment To Sell'],
                    'notes' => [
                        'A quote request is simply a request for information and does not create any contractual relationship between the user and Zero Tech Mart.',
                        'No transaction is considered completed solely because a quote request has been submitted.',
                    ],
                    'highlight' => true,
                ],
                [
                    'title' => 'Information Required For Quote Requests',
                    'body' => ['Users may be asked to provide information such as:'],
                    'items' => ['Full Name', 'Company Name', 'Email Address', 'Telephone Number', 'Product Category', 'Product Requirements', 'Quantity Information', 'Business Needs', 'Additional Comments'],
                    'notes' => [
                        'Users are responsible for ensuring that information submitted through quote request forms is accurate, complete, and current.',
                        'Zero Tech Mart may be unable to respond effectively to requests containing incomplete or inaccurate information.',
                    ],
                ],
                [
                    'title' => 'Review Of Quote Requests',
                    'body' => ['All quote requests are subject to review.', 'Zero Tech Mart reserves the right to:'],
                    'items' => ['Review Submitted Information', 'Request Additional Information', 'Clarify Product Requirements', 'Decline To Respond To Requests', 'Refuse Requests That Violate Website Policies', 'Remove Incomplete Requests'],
                    'note' => 'Submission of a quote request does not guarantee that a response will be provided.',
                ],
                [
                    'title' => 'Product Availability',
                    'body' => ['Product information presented on the website may not reflect current availability.', 'Availability may vary due to:'],
                    'items' => ['Product Changes', 'Supplier Availability', 'Product Discontinuation', 'Inventory Conditions', 'Manufacturer Updates', 'Market Conditions'],
                    'notes' => [
                        'Zero Tech Mart does not guarantee that products referenced on the website will be available at any specific time.',
                        'Availability information may change without notice.',
                    ],
                ],
                [
                    'title' => 'Pricing Information',
                    'body' => ['Any pricing information communicated in response to a quote request is subject to change.', 'Pricing may vary based on factors including:'],
                    'items' => ['Product Configuration', 'Product Availability', 'Quantity Requirements', 'Market Conditions', 'Supplier Information', 'Product Updates'],
                    'notes' => [
                        'Pricing information provided in response to a quote request should not be interpreted as a binding commitment unless expressly stated in writing.',
                        'Zero Tech Mart reserves the right to modify or withdraw pricing information at any time.',
                    ],
                ],
                [
                    'title' => 'Product Information Accuracy',
                    'body' => ['While reasonable efforts are made to provide accurate information, Zero Tech Mart does not guarantee that:'],
                    'items' => ['Product Descriptions Are Error-Free', 'Product Specifications Are Complete', 'Product Images Reflect Current Versions', 'Product Features Remain Unchanged', 'Product Information Is Continuously Updated'],
                    'note' => 'Users should independently verify important information before relying upon it.',
                ],
                [
                    'title' => 'User Responsibilities',
                    'body' => ['Users submitting quote requests agree to:'],
                    'items' => ['Provide Accurate Information', 'Submit Genuine Inquiries', 'Use the website lawfully', 'Avoid Fraudulent Requests', 'Avoid Misleading Information', 'Comply With Website Policies'],
                    'note' => 'Zero Tech Mart reserves the right to reject requests that appear misleading, abusive, fraudulent, or inconsistent with the intended purpose of the website.',
                ],
                [
                    'title' => 'Communication Regarding Requests',
                    'body' => ['After a quote request is submitted, Zero Tech Mart may contact users using the information provided.', 'Communication may include:'],
                    'items' => ['Request Confirmations', 'Clarification Requests', 'Product Information', 'Availability Updates', 'General Follow-Up Communications'],
                    'note' => 'Submission of a quote request authorizes Zero Tech Mart to communicate regarding the submitted inquiry.',
                ],
                [
                    'title' => 'No Guarantee Of Response Time',
                    'body' => ['While reasonable efforts may be made to review inquiries promptly, Zero Tech Mart does not guarantee:'],
                    'items' => ['Response Times', 'Processing Times', 'Availability Of Representatives', 'Immediate Communication'],
                    'note' => 'Response times may vary based on business volume and operational requirements.',
                ],
                [
                    'title' => 'Refusal Of Requests',
                    'body' => ['Zero Tech Mart reserves the right to refuse, restrict, or discontinue communication regarding any request at its sole discretion.', 'Requests may be refused for reasons including:'],
                    'items' => ['Incomplete Information', 'Suspected Fraud', 'Abuse Of Website Services', 'Policy Violations', 'Technical Limitations', 'Legal Requirements'],
                    'note' => 'Zero Tech Mart is not obligated to explain decisions regarding request refusal.',
                ],
                [
                    'title' => 'Privacy And Data Handling',
                    'body' => [
                        'Information submitted through quote request forms is handled in accordance with the website\'s Privacy Policy.',
                        'Users are encouraged to review the Privacy Policy to understand how information is collected, stored, and used.',
                    ],
                ],
                [
                    'title' => 'Limitation Of Liability',
                    'body' => ['Zero Tech Mart shall not be liable for:'],
                    'items' => ['Product Availability Changes', 'Product Information Errors', 'Delayed Responses', 'Pricing Changes', 'Lost Business Opportunities', 'Decisions Made Based On Submitted Information', 'Communication Delays'],
                    'note' => 'Users acknowledge that quote requests are informational and that reliance on the information received is at their own discretion.',
                ],
                [
                    'title' => 'Changes To This Policy',
                    'body' => [
                        'Zero Tech Mart reserves the right to modify, update, or replace this Quote Request Policy at any time without prior notice.',
                        'Changes become effective immediately upon publication on the website.',
                        'Continued use of the website following updates constitutes acceptance of the revised Policy.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => ['If you have questions regarding this Quote Request Policy or a submitted inquiry, please contact us using the details below.'],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Policy',
                    'body' => ['By submitting a quote request, product inquiry, or otherwise interacting with the website, you acknowledge that you have read, understood, and agreed to the terms outlined in this Quote Request Policy.'],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('themes.sarab.policy.quote-request', compact('quotePolicy', 'bannerImage'));
    }
}
