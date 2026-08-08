<?php

namespace App\Http\Controllers;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policy = [
            'title' => 'Privacy Policy',
            'date' => 'July 2026',
            'intro' => [
                'XTech Mart respects your privacy and is committed to protecting the personal information you share with us. This Privacy Policy explains how we collect, use, store, disclose, and protect information obtained through our website, forms, communication channels, and related services.',
                'By accessing or using our website, submitting a quote request, contacting us, or otherwise interacting with our platform, you acknowledge and agree to the practices described in this Privacy Policy.',
                'XTech Mart operates as a technology information and product discovery platform that provides information about printers, scanners, desktops, thin clients, and related technology products. Users may submit inquiries or quote requests through the website for informational purposes.',
            ],
            'sections' => [
                [
                    'title' => 'Information We Collect',
                    'body' => [
                        'We may collect information directly from users when they interact with our website or communicate with us.',
                    ],
                    'groups' => [
                        [
                            'title' => 'Personal Information',
                            'description' => 'Personal information may include:',
                            'items' => [
                                'Full Name',
                                'Company Name',
                                'Email Address',
                                'Telephone Number',
                                'Job Title',
                                'Business Information',
                                'Mailing Address',
                                'Country or Region',
                                'Any information voluntarily submitted through contact forms or quote request forms.',
                            ],
                            'note' => 'Providing personal information is voluntary; however, certain services or communications may not be available without the information necessary to process a request.',
                        ],
                        [
                            'title' => 'Quote Request Information',
                            'description' => 'When users submit quote requests or product inquiries, we may collect information including:',
                            'items' => [
                                'Product Categories of Interest',
                                'Product Requirements',
                                'Quantity Requirements',
                                'Project Information',
                                'Business Needs',
                                'Budget Information (if provided)',
                                'Additional Request Details',
                            ],
                            'note' => 'This information helps us review and respond to inquiries appropriately.',
                        ],
                        [
                            'title' => 'Technical Information',
                            'description' => 'We may automatically collect certain technical information when users visit the website, including:',
                            'items' => [
                                'IP Address',
                                'Browser Type',
                                'Device Type',
                                'Operating System',
                                'Referral Sources',
                                'Pages Visited',
                                'Time Spent on Pages',
                                'Website Interaction Data',
                                'Date and Time of Access',
                            ],
                            'note' => 'This information helps us improve website functionality, performance, and user experience.',
                        ],
                    ],
                ],
                [
                    'title' => 'How We Use Information',
                    'body' => [
                        'Information collected through the website may be used for the following purposes:',
                    ],
                    'groups' => [
                        [
                            'title' => 'Responding To Enquiries',
                            'description' => 'We may use submitted information to:',
                            'items' => [
                                'Respond to Product Inquiries',
                                'Process Quote Requests',
                                'Provide Requested Information',
                                'Communicate Regarding Submitted Forms',
                                'Clarify User Requirements',
                            ],
                        ],
                        [
                            'title' => 'Website Improvement',
                            'description' => 'Information may be used to:',
                            'items' => [
                                'Improve Website Performance',
                                'Enhance User Experience',
                                'Analyze Website Usage Patterns',
                                'Improve Content Relevance',
                                'Identify Technical Issues',
                            ],
                        ],
                        [
                            'title' => 'Communication Purposes',
                            'description' => 'We may use contact information to:',
                            'items' => [
                                'Respond to Questions',
                                'Provide Requested Information',
                                'Follow-up on Submitted Requests',
                                'Communicate Important Website Updates',
                                'Address Customer Service Inquiries',
                            ],
                            'note' => 'Users may request that communications cease at any time.',
                        ],
                    ],
                ],
                [
                    'title' => 'Cookies And Tracking Technologies',
                    'body' => [
                        'The website may use cookies and similar technologies to improve functionality and user experience.',
                        'Cookies may be used for:',
                    ],
                    'items' => [
                        'Website Performance',
                        'User Preferences',
                        'Analytics',
                        'Security Functions',
                        'Session Management',
                    ],
                    'note' => 'Users may control cookie preferences through their browser settings. Disabling cookies may affect certain website features.',
                ],
                [
                    'title' => 'Information Sharing And Disclosure',
                    'body' => [
                        'XTech Mart does not sell personal information to third parties.',
                        'Information may be shared only when reasonably necessary, including:',
                    ],
                    'items' => [
                        'Service Providers Supporting Website Operations',
                        'Website Hosting Providers',
                        'Analytics Providers',
                        'Legal Authorities When Required By Law',
                        'Professional Advisors Assisting Business Operations',
                    ],
                    'note' => 'Any disclosure is limited to purposes consistent with this Privacy Policy.',
                ],
                [
                    'title' => 'Data Security',
                    'body' => [
                        'We implement reasonable administrative, technical, and organizational measures designed to protect information from unauthorized access, disclosure, misuse, alteration, or destruction.',
                        'While reasonable efforts are made to safeguard information, no internet transmission or electronic storage method can be guaranteed to be completely secure. Users submit information at their own discretion and risk.',
                    ],
                ],
                [
                    'title' => 'Data Retention',
                    'body' => [
                        'Information may be retained for as long as reasonably necessary to:',
                    ],
                    'items' => [
                        'Respond To Requests',
                        'Maintain Business Records',
                        'Comply With Legal Obligations',
                        'Resolve Disputes',
                        'Improve Services',
                    ],
                    'note' => 'When information is no longer required, reasonable efforts will be made to delete or anonymize it securely.',
                ],
                [
                    'title' => 'Third-Party Websites',
                    'body' => [
                        'The website may contain links to third-party websites for informational purposes.',
                        'XTech Mart is not responsible for the privacy practices, content, security, or policies of external websites. Users should review the privacy policies of any third-party websites they visit.',
                    ],
                ],
                [
                    'title' => "Children's Privacy",
                    'body' => [
                        'This website is intended for business and professional audiences.',
                        'We do not knowingly collect personal information from individuals under the age of 13. If such information is discovered, we will make reasonable efforts to remove it promptly.',
                    ],
                ],
                [
                    'title' => 'Your Privacy Rights',
                    'body' => [
                        'Depending on applicable laws and regulations, users may have the right to:',
                    ],
                    'items' => [
                        'Request Access To Personal Information',
                        'Request Correction Of Information',
                        'Request Deletion Of Information',
                        'Objection to Certain Processing Activities',
                        'Withdraw Consent Where Applicable',
                    ],
                    'note' => 'Requests may be submitted using the contact information provided below.',
                ],
                [
                    'title' => 'Changes To This Privacy Policy',
                    'body' => [
                        'XTech Mart may update this Privacy Policy from time to time.',
                        'Changes become effective upon publication on the website. Continued use of the website following updates constitutes acceptance of the revised Privacy Policy.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => [
                        'If you have questions regarding this Policy, your use of the website, submitted quote requests, or any related matter, please contact us using the information below.',
                    ],
                    'contact' => [
                        'Business Name:' => 'XTech Mart',
                        'Email:' => 'info@xtechmart.com',
                        'Address:' => '20 Hammond Pond Pkwy403, Chestnut Hill, MA 02467',
                        'Contact No:' => '',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Policy',
                    'body' => [
                        'By accessing and using the website, submitting inquiries, or interacting with the platform, you acknowledge that you have read, understood, and agreed to this Policy.',
                    ],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('policy.privacy', compact('policy', 'bannerImage'));
    }
}
