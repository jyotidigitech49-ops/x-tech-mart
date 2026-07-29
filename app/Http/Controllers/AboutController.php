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
            'title' => 'Why Choose XTechMart',
            'description' => 'XTechMart brings together thoughtfully organized technology collections, making it easier to explore products through detailed information, practical insights, and a streamlined browsing experience.',
        ];

        return view('themes.sarab.about.aboutus', compact(
            'features',
            'collection',
            'whyChoose'
        ));
    }
}
