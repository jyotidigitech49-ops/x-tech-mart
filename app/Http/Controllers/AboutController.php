<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $features = [
            [
                'title' => 'Discovery, Refined',
                'description' => 'Navigate thoughtfully organized technology collections with clarity, confidence, and purposeful product exploration.',
            ],
            [
                'title' => 'Knowledge in Motion',
                'description' => 'Access meaningful product insights that simplify comparisons and inspire confident technology decisions every time.',
            ],
            [
                'title' => 'Quotes, Reimagined',
                'description' => 'Receive personalized pricing guidance tailored to your requirements, objectives, and evolving technology priorities.',
            ],
            [
                'title' => 'Confidence, Connected',
                'description' => 'Partner with knowledgeable specialists committed to supporting every stage of your technology discovery journey.',
            ],
        ];

        $collection = [
            'description' => 'Our platform is dedicated to providing a diverse range of printing solutions designed for different environments, workflows, and document requirements. Through carefully organized categories that include all-in-one, laser, inkjet, LED, and large format printers, we help customers explore products, compare specifications, and identify options that align with their printing needs.',
        ];

        $whyChoose = [
            'title' => 'Turning Product Information into Confident Direction',
            'description' => 'XTech Mart presents printers, scanners, desktops, and thin clients through organized categories, clear specifications, and practical product information. The platform helps individuals and businesses research suitable technology without navigating a direct-purchase process.

              Every listing is structured to make comparisons more focused, while quote assistance provides a direct path to current pricing, availability, and additional product details.',
        ];

        return view('about.aboutus', compact(
            'features',
            'collection',
            'whyChoose'
        ));
    }
}
