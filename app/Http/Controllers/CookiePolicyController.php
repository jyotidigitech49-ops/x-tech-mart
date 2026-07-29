<?php

namespace App\Http\Controllers;

class CookiePolicyController extends Controller
{
    public function index()
    {
        $cookiePolicy = [
            'title' => 'Cookie Policy',
            'date' => 'July, 2026',
            'intro' => [
                'This Cookie Policy explains how Zero Tech Mart ("we," "our," or "us") uses cookies and similar technologies when you access and use our website.',
                'This Policy is intended to help visitors understand what cookies are, why they are used, what information may be collected through them, and how users can manage their cookie preferences.',
                'By continuing to use our website, you acknowledge that cookies and similar technologies may be used as described in this Cookie Policy, subject to your browser settings and applicable laws.',
            ],
            'sections' => [
                [
                    'title' => 'What Are Cookies?',
                    'body' => [
                        'Cookies are small text files that are stored on your device when you visit a website.',
                        'These files help websites recognize returning visitors, remember preferences, improve functionality, and gather information about how visitors interact with website content.',
                        'Cookies generally do not contain information that directly identifies an individual. However, information associated with cookies may sometimes be linked to information that users have voluntarily provided.',
                    ],
                ],
                [
                    'title' => 'Why We Use Cookies',
                    'body' => ['Zero Tech Mart may use cookies and similar technologies to:'],
                    'items' => ['Improve Website Functionality', 'Enhance User Experience', 'Remember User Preferences', 'Maintain Website Security', 'Analyze Website Performance', 'Understand Visitor Behavior', 'Improve Website Navigation', 'Monitor Technical Performance', 'Support Website Administration', 'Provide Relevant Content'],
                    'note' => 'Cookies help us understand how visitors use the website so that we can continue improving our content and services.',
                ],
                [
                    'title' => 'Types Of Cookies We May Use',
                    'groups' => [
                        [
                            'title' => 'Essential Cookies',
                            'description' => 'Essential cookies are necessary for the website to function properly.',
                            'items' => ['Website Navigation', 'Security Functions', 'Form Submissions', 'Session Management', 'Page Functionality', 'Access To Website Features'],
                            'note' => 'Without these cookies, certain parts of the website may not operate correctly.',
                        ],
                        [
                            'title' => 'Performance And Analytics Cookies',
                            'description' => 'Performance cookies help us understand how visitors interact with the website.',
                            'items' => ['Pages Visited', 'Time Spent On Pages', 'Visitor Navigation Patterns', 'Website Traffic Sources', 'Device Information', 'Browser Information', 'Technical Performance Metrics'],
                            'note' => 'Information collected through these cookies is generally aggregated and used to improve website performance and usability.',
                        ],
                        [
                            'title' => 'Functional Cookies',
                            'description' => 'Functional cookies allow the website to remember user preferences and settings.',
                            'items' => ['Language Preferences', 'Region Selection', 'Display Preferences', 'User Interface Settings', 'Previously Submitted Preferences'],
                            'note' => 'The purpose of these cookies is to improve the overall user experience.',
                        ],
                        [
                            'title' => 'Security Cookies',
                            'description' => 'Security cookies may be used to help identify and prevent malicious activity.',
                            'items' => ['Fraud Prevention', 'Website Security', 'Abuse Detection', 'Unauthorized Access Prevention', 'Session Protection'],
                            'note' => 'These cookies help maintain the integrity and security of the website.',
                        ],
                    ],
                ],
                [
                    'title' => 'Third-Party Cookies',
                    'body' => [
                        'The website may utilize services provided by third parties that place cookies on users\' devices.',
                        'These third parties may include:',
                    ],
                    'items' => ['Analytics Providers', 'Website Performance Services', 'Security Services', 'Marketing Service Providers', 'Embedded Content Providers'],
                    'notes' => [
                        'Third-party cookies are governed by the privacy and cookie policies of the respective third-party providers.',
                        'Zero Tech Mart does not control how third parties collect or process information through their cookies.',
                        'Users are encouraged to review the privacy policies of any third-party services used on the website.',
                    ],
                ],
                [
                    'title' => 'Analytics Technologies',
                    'body' => [
                        'We may use website analytics tools to better understand visitor activity and website performance.',
                        'Analytics tools may collect information such as:',
                    ],
                    'items' => ['Pages Viewed', 'Session Duration', 'Referral Sources', 'Device Information', 'Browser Information', 'General Geographic Information', 'User Interaction Data'],
                    'notes' => [
                        'This information helps us improve website content, navigation, and functionality.',
                        'Analytics information is generally used in an aggregated form and is not intended to identify individual users.',
                    ],
                ],
                [
                    'title' => 'Information Collected Through Cookies',
                    'body' => ['Depending on the type of cookie used, information collected may include:'],
                    'items' => ['IP Address', 'Browser Type', 'Device Type', 'Operating System', 'Pages Visited', 'Time Spent On The Website', 'Website Interaction Data', 'Referral Information', 'Language Preferences', 'Geographic Region Information'],
                    'note' => 'The information collected may vary depending on browser settings and website functionality.',
                ],
                [
                    'title' => 'Managing Cookie Preferences',
                    'body' => [
                        'Most web browsers allow users to manage, block, or delete cookies through browser settings.',
                        'Users may generally:',
                    ],
                    'items' => ['Accept Cookies', 'Reject Cookies', 'Delete Existing Cookies', 'Configure Cookie Preferences', 'Receive Notifications Before Cookies Are Stored'],
                    'notes' => [
                        'Instructions for managing cookies can typically be found within the browser\'s help section.',
                        'Please note that disabling certain cookies may affect website functionality and user experience.',
                    ],
                ],
                [
                    'title' => 'Do Not Track Signals',
                    'body' => [
                        'Some browsers offer "Do Not Track" features.',
                        'Because there is currently no universally accepted standard for Do Not Track signals, the website may not respond to all such requests uniformly.',
                        'Users may manage cookies directly through browser settings if they wish to limit tracking activities.',
                    ],
                ],
                [
                    'title' => 'Cookie Retention',
                    'body' => [
                        'Cookies may remain on a user\'s device for varying periods of time depending on their purpose.',
                        'Some cookies are removed automatically when a browser session ends, while others may remain stored until deleted or until they expire.',
                        'Cookie retention periods may vary according to browser settings and the specific cookie involved.',
                    ],
                ],
                [
                    'title' => 'Changes To This Cookie Policy',
                    'body' => [
                        'Zero Tech Mart may update this Cookie Policy periodically to reflect operational, legal, technical, or business changes.',
                        'Any modifications become effective upon publication on the website.',
                        'Users are encouraged to review this Policy periodically to remain informed about our use of cookies and similar technologies.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => ['If you have questions regarding this Cookie Policy or our use of cookies and related technologies, please contact us using the information below.'],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Policy',
                    'body' => ['By continuing to access and use the website, you acknowledge that you have read, understood, and agreed to the terms outlined in this Cookie Policy.'],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('policy.cookie', compact('cookiePolicy', 'bannerImage'));
    }
}
