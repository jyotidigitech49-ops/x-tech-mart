@extends('layouts.app')
@section('title', 'Product Enquiry')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/product-enquiry.css') }}?v=20260722-6">
@endpush

@section('content')

<section class="product-enquiry-section">
    <div class="container">
        <div class="enquiry-page-heading">
            <span>Product Enquiry</span>
            <h1>Tell Us What You Need</h1>
            <p>Share your product requirements and our team will help you with the relevant information.</p>
        </div>

        <div class="row justify-content-center align-items-start g-4">

            <!-- Enquiry Summary -->
            <div class="col-lg-5 col-md-6">
                <h3 class="section-heading"><span class="enquiry-heading-icon"><i class="icon-doc"></i></span> Enquiry Summary</h3>

                <div class="summary-box">
                    <div class="summary-header d-flex justify-content-between">
                        <h6>Product Details</h6>
                        <h6>Info</h6>
                    </div>

                    <div class="summary-product d-flex align-items-center">
                        <div class="product-img">
                            <img src="{{ $enquiryData['product']['image'] }}" alt="{{ $enquiryData['product']['name'] }}">
                        </div>
                        <h5>{{ $enquiryData['product']['name'] }}</h5>
                    </div>

                    <div class="summary-row d-flex justify-content-between">
                        <strong><i class="icon-grid"></i> Category</strong>
                        <span>{{ $enquiryData['category']['name'] }}</span>
                    </div>

                    <div class="summary-row d-flex justify-content-between">
                        <strong><i class="icon-support"></i> Support</strong>
                        <span>{{ $enquiryData['support'] }}</span>
                    </div>

                    <div class="summary-row d-flex justify-content-between">
                        <strong><i class="icon-clock"></i> Response Time</strong>
                        <span class="blue-text">{{ $enquiryData['response_time'] }}</span>
                    </div>

                    <div class="why-box">
                        <h4><span><i class="icon-star"></i></span> Why Explore With XTechMart?</h4>

                        <ul>
                            <li>Well-Organized Product Categories</li>
                            <li>Easy Access To Product Information</li>
                            <li>Business-Focused Technology Solutions</li>
                            <li>Clear Product Specifications</li>
                            <li>Simple Enquiry Process</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Product Enquiry Form -->
            <div class="col-lg-7 col-md-6">
                <h3 class="section-heading"><span class="enquiry-heading-icon enquiry-heading-icon--filled"><i class="icon-envelope"></i></span> Product Enquiry Form</h3>

                <p class="form-description">
                    Submit your enquiry details for {{ $enquiryData['product']['name'] }}, and our team will review your request regarding product availability, specifications, and quotation-related information.
                </p>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ $enquiryData['form_action'] }}">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">First Name *</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter first name">
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Last Name *</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter last name">
                            @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email address">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Phone Number *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone number">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Required Quantity *</label>
                            <input type="number" name="quantity" value="{{ old('quantity', 1) }}" min="1" class="form-control @error('quantity') is-invalid @enderror" placeholder="Enter quantity">
                            @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Company Name</label>
                            <input type="text" name="company" value="{{ old('company') }}" class="form-control @error('company') is-invalid @enderror" placeholder="Enter company name">
                            @error('company') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label">Enquiry Message *</label>
                            <textarea name="message" class="form-control enquiry-textarea @error('message') is-invalid @enderror" placeholder="Write your product enquiry, specifications, requirements, bulk quantity details, etc.">{{ old('message') }}</textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <div class="enquiry-submit-bar">
                                <div class="enquiry-privacy-note">
                                    <span><i class="icon-shield"></i></span>
                                    <p>Your information is safe with us.<br>We respect your privacy.</p>
                                </div>
                                <button type="submit" class="submit-btn">
                                    Submit Enquiry <i class="icon-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

@endsection
