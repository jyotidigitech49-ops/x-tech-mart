@extends('layouts.app')
@section('title', 'Contact Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/contact.css') }}?v=20260807-2">
@endpush

@section('content')

    <section class="contact-banner" style="background-image: url('{{ $bannerImage }}');">
        <div class="contact-banner__overlay"></div>
        <div class="contact-banner__content">
            <h1>Contact Us</h1>
            <div class="contact-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span aria-hidden="true">//</span>
                <span aria-current="page">CONTACT US</span>
            </div>
        </div>
    </section>


    <!-- =========CONTACT FORM================ -->
    <section id="contact-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">Get In Touch</span>
                <div class="sline"></div>
                <p class="sdesc mx-auto" style="max-width:480px;">Have a question, feedback, or want to plan a special
                    event? We'd love to hear from you.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-right">
                    <div class="ctdark">
                        <h4>Let's Talk</h4>
                        <p class="ctsub">We typically respond within 2 hours during business hours.</p>
                        <div class="ctitem">
                            <div class="cticon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="ctinfo"><strong>Address</strong><span>20 Hammond Pond Pkwy403, Chestnut Hill, MA
                                    02467
                            </div>
                        </div>
                        {{-- <div class="ctitem">
                            <div class="cticon"><i class="fas fa-phone-alt fa-flip-horizontal"></i></div>
                            <div class="ctinfo"><strong>Phone</strong><span></span></div>
                        </div> --}}
                        <div class="ctitem">
                            <div class="cticon"><i class="fas fa-envelope"></i></div>
                            <div class="ctinfo"><strong>Email</strong><span>info@xtechmart.com</span></div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="contact-form-card">
                        <form id="contact-form" action="{{ url('/contact-submit') }}" method="POST" novalidate>
                            @csrf
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="flbl" for="contact-name">Your Name *</label>
                                    <input id="contact-name" name="name" type="text" class="fctrl"
                                        value="{{ old('name') }}" placeholder="John Doe" maxlength="255"
                                        autocomplete="name" required>
                                    <small class="field-error name_error">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="col-sm-6">
                                    <label class="flbl" for="contact-email">Email Address *</label>
                                    <input id="contact-email" name="email" type="email" class="fctrl"
                                        value="{{ old('email') }}" placeholder="you@email.com" maxlength="255"
                                        autocomplete="email" required>
                                    <small class="field-error email_error">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>

                                <div class="col-sm-12">
                                    <label class="flbl" for="contact-subject">Subject *</label>
                                    <input id="contact-subject" name="subject" type="text" class="fctrl"
                                        value="{{ old('subject') }}" placeholder="How can we help?" maxlength="255"
                                        required>
                                    <small class="field-error subject_error">
                                        @error('subject')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="col-12">
                                    <label class="flbl" for="contact-message">Message *</label>
                                    <textarea id="contact-message" name="message" class="fctrl" rows="5" placeholder="Write your message here..."
                                        required>{{ old('message') }}</textarea>
                                    <small class="field-error message_error">
                                        @error('message')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                                <div class="col-12">
                                    <button class="btn-theme-primary submit" id="ctcBtn" type="submit">
                                        <i class="fas fa-paper-plane"></i><span>Send Message</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="contact-form-message" id="success-message" role="status" aria-live="polite">
                            @if (session('success'))
                                <p class="is-success">{{ session('success') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-map pt-120 mb-5 mt-5" aria-label="Our location">
        <div class="container">
            <div class="contact-map-card">
                <div class="contact-map-frame">
                    <iframe class="map-size" title="XTechMart location"
                        src="https://www.google.com/maps?q=20%20Hammond%20Pond%20Pkwy%2C%20Unit%20403%2C%20Chestnut%20Hill%2C%20MA%2002467&z=17&output=embed"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();

                $('.field-error').text('');
                $('#success-message').html('');

                const form = $(this);
                const submitButton = form.find('.submit');
                const submitLabel = submitButton.find('span');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'Accept': 'application/json'
                    },
                    beforeSend: function() {
                        submitButton.prop('disabled', true);
                        submitButton.find('i').attr('class', 'fas fa-spinner fa-spin');
                        submitLabel.text('Sending...');
                    },
                    success: function(response) {
                        $('#success-message').html(
                            '<p class="is-success">' + (response.message ||
                                'Your message has been sent successfully!') + '</p>'
                        );
                        form[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                            $.each(xhr.responseJSON.errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                            });
                        } else {
                            $('#success-message').html(
                                '<p class="is-error">Something went wrong. Please try again.</p>'
                            );
                        }
                    },
                    complete: function() {
                        submitButton.prop('disabled', false);
                        submitButton.find('i').attr('class', 'fas fa-paper-plane');
                        submitLabel.text('Send Message');
                    }
                });
            });
        });
    </script>
@endpush
