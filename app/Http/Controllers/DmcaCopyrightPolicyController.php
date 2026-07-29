<?php

namespace App\Http\Controllers;

class DmcaCopyrightPolicyController extends Controller
{
    public function index()
    {
        $dmcaPolicy = [
            'title' => 'DMCA Copyright Policy',
            'date' => 'July 2026',
            'intro' => [
                'Zero Tech Mart respects the intellectual property rights of others and expects users of the website to do the same.',
                'This Digital Millennium Copyright Act ("DMCA") Policy outlines the procedures for reporting alleged copyright infringement and submitting copyright-related notices concerning content appearing on the Zero Tech Mart website.',
                'Zero Tech Mart operates as a technology information and product discovery platform and is committed to responding appropriately to valid copyright concerns in accordance with applicable intellectual property laws.',
                'By using this website, you acknowledge and agree to the terms outlined in this DMCA Copyright Policy.',
            ],
            'sections' => [
                [
                    'title' => 'Copyright Protection',
                    'body' => ['Copyright law protects original works of authorship, including but not limited to:'],
                    'items' => ['Written Content', 'Articles', 'Images', 'Graphics', 'Videos', 'Photographs', 'Illustrations', 'Documentation', 'Software Content', 'Website Designs', 'Databases', 'Other Copyrighted Materials'],
                    'note' => 'Zero Tech Mart respects these rights and takes copyright concerns seriously.',
                ],
                [
                    'title' => 'Reporting Copyright Infringement',
                    'body' => [
                        'If you believe that material available on the website infringes your copyright, you may submit a copyright infringement notice.',
                        'To assist in the review process, your notice should include sufficient information to identify both the copyrighted work and the allegedly infringing material.',
                    ],
                    'note' => 'Incomplete notices may delay processing.',
                ],
                [
                    'title' => 'Information Required In A DMCA Notice',
                    'body' => ['A copyright infringement notice should include:'],
                    'items' => [
                        'Identification of the copyrighted work claimed to have been infringed.',
                        'Identification of the material claimed to be infringing, including sufficient information to locate the material on the website.',
                        'Your full legal name.',
                        'Your company name (if applicable).',
                        'Your mailing address.',
                        'Your telephone number.',
                        'Your email address.',
                        'A statement that you have a good faith belief that the use of the material is not authorized by the copyright owner, its agent, or the law.',
                        'A statement that the information contained in the notice is accurate.',
                        'A statement made under penalty of perjury that you are the copyright owner or authorized to act on behalf of the copyright owner.',
                        'Your physical or electronic signature.',
                    ],
                    'highlight' => true,
                ],
                [
                    'title' => 'Submission Of Copyright Notices',
                    'body' => [
                        'Copyright infringement notices should be submitted using the contact information provided at the end of this Policy.',
                        'Upon receipt of a valid notice, Zero Tech Mart may:',
                    ],
                    'items' => ['Review The Claim', 'Request Additional Information', 'Investigate The Allegation', 'Remove Content', 'Restrict Access To Content', 'Take Other Appropriate Actions'],
                    'note' => 'The specific action taken will depend on the circumstances of the claim.',
                ],
                [
                    'title' => 'Counter-Notification Procedure',
                    'body' => ['If you believe content was removed or restricted in error, you may submit a counter-notification.', 'A counter-notification should include:'],
                    'items' => [
                        'Identification of the material that was removed or disabled.',
                        'The location where the material appeared before removal.',
                        'Your full legal name.',
                        'Your mailing address.',
                        'Your telephone number.',
                        'Your email address.',
                        'A statement made under penalty of perjury that you have a good faith belief the material was removed as a result of mistake or misidentification.',
                        'A statement consenting to the jurisdiction of the appropriate court, where applicable.',
                        'Your physical or electronic signature.',
                    ],
                    'note' => 'Zero Tech Mart may review counter-notifications and take action as appropriate under applicable law.',
                ],
                [
                    'title' => 'Repeat Infringer Policy',
                    'body' => ['Zero Tech Mart reserves the right to take appropriate action against users who repeatedly infringe intellectual property rights.', 'Actions may include:'],
                    'items' => ['Restricting Website Access', 'Removing Content', 'Suspending User Privileges', 'Terminating Access To Website Services'],
                    'note' => 'The determination of repeat infringement shall be made at Zero Tech Mart\'s sole discretion.',
                ],
                [
                    'title' => 'Good Faith Requirement',
                    'body' => [
                        'All copyright notices and counter-notifications must be submitted in good faith.',
                        'Submitting knowingly false, misleading, fraudulent, or inaccurate copyright claims may expose the submitting party to legal liability under applicable laws.',
                    ],
                    'note' => 'Zero Tech Mart reserves the right to reject notices that appear abusive, incomplete, or submitted in bad faith.',
                ],
                [
                    'title' => 'Third-Party Content',
                    'body' => [
                        'The website may contain information, content, or materials obtained from third-party sources.',
                        'Zero Tech Mart does not claim ownership of third-party copyrighted materials unless expressly stated.',
                        'If a copyright owner believes content appearing on the website infringes their rights, they are encouraged to contact us promptly.',
                    ],
                ],
                [
                    'title' => 'Intellectual Property Respect',
                    'body' => ['Users agree not to:'],
                    'items' => ['Copy Website Content Without Authorization', 'Reproduce Protected Materials Without Permission', 'Distribute Copyrighted Content Unlawfully', 'Upload Infringing Materials', 'Misrepresent Ownership Of Intellectual Property'],
                    'note' => 'Users remain solely responsible for ensuring compliance with copyright laws.',
                ],
                [
                    'title' => 'Limitation Of Liability',
                    'body' => ['Zero Tech Mart shall not be liable for:'],
                    'items' => ['User-Generated Copyright Violations', 'Third-Party Intellectual Property Claims', 'Unauthorized Content Submitted By Users', 'Reliance Upon Third-Party Content', 'Temporary Removal Of Content During Investigations'],
                    'note' => 'Nothing in this Policy creates an obligation to continuously monitor all content on the website.',
                ],
                [
                    'title' => 'Reservation Of Rights',
                    'body' => ['Zero Tech Mart reserves the right to:'],
                    'items' => ['Investigate Copyright Complaints', 'Remove Content At Its Discretion', 'Request Additional Documentation', 'Reject Incomplete Claims', 'Modify Internal Review Procedures', 'Comply With Applicable Legal Requirements'],
                    'note' => 'All decisions regarding copyright complaints will be made in accordance with applicable laws and business practices.',
                    'highlight' => true,
                ],
                [
                    'title' => 'Changes To This DMCA Policy',
                    'body' => [
                        'Zero Tech Mart reserves the right to update, modify, or replace this DMCA Copyright Policy at any time.',
                        'Changes become effective immediately upon publication on the website.',
                        'Continued use of the website following any updates constitutes acceptance of the revised Policy.',
                    ],
                ],
                [
                    'title' => 'Contact Information',
                    'body' => ['If you wish to submit a copyright notice, counter-notification, or have questions regarding this DMCA Copyright Policy, please contact us using the information below.'],
                    'contact' => [
                        'Business Name:' => 'Zero Tech Mart',
                        'Email:' => 'info@zerotechmart.com',
                        'Address:' => '9655 Ensworth St 216, Las Vegas, NV 89123',
                        'Contact No:' => '+1 (888)-715-4577',
                    ],
                ],
                [
                    'title' => 'Acceptance Of This Policy',
                    'body' => ['By accessing, browsing, or using the website, you acknowledge that you have read, understood, and agreed to the terms outlined in this DMCA Copyright Policy.'],
                ],
            ],
        ];

        $bannerImage = asset('assets/images/common-banner/comm-banner.png');

        return view('policy.dmca-copyright-policy', compact('dmcaPolicy', 'bannerImage'));
    }
}
