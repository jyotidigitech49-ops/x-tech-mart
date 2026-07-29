@extends('themes.sarab.layouts.app')
@section('title', 'Contact Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/contact.css') }}?v=20260725-4">
@endpush

@section('content')

    <section class="contact-banner" style="background-image: url('{{ $bannerImage }}');">
        <div class="contact-banner__overlay"></div>
        <div class="contact-banner__content">
            <h1>Contact Us</h1>
            <div class="contact-banner__breadcrumb">
                <a href="{{ url('/') }}">HOME</a>
                <span>//</span>
                <span>CONTACT US</span>
            </div>
        </div>
    </section>

    <div class="contact-area">
        <div class="container">
            <div class="contact-layout">
                <aside class="contact-intro">
                    <span class="contact-eyebrow">LET'S CONNECT</span>
                    <h2>We'd Love To Hear From You</h2>
                    <p class="contact-intro__copy">Have a question about our products or website? Send us a message and our
                        team will get back to you.</p>

                    <div class="contact-info-wrap-3">
                        <div class="contact-info-cards">
                            <div class="single-contact-info-3">
                                <span class="contact-info-icon"><i class="icon-home"></i></span>
                                <div>
                                    <span class="contact-info-label">VISIT US</span>
                                    <h3>Our Address</h3>
                                    <p>9655 Ensworth St, Unit 216<br>Las Vegas, NV 89123</p>
                                </div>
                            </div>

                            <div class="single-contact-info-3">
                                <span class="contact-info-icon"><i class="icon-envelope"></i></span>
                                <div>
                                    <span class="contact-info-label">WRITE TO US</span>
                                    <h3>Email &amp; Web</h3>
                                    <p>
                                        <a href="mailto:info@zerotechmart.com">info@zerotechmart.com</a><br>
                                        <a href="https://zerotechmart.com/" target="_blank"
                                            rel="noopener">zerotechmart.com</a>
                                    </p>
                                </div>
                            </div>

                            <div class="single-contact-info-3">
                                <span class="contact-info-icon"><i class="icon-phone"></i></span>
                                <div>
                                    <span class="contact-info-label">CALL US</span>
                                    <h3>Contact Number</h3>
                                    <p>
                                        <a href="tel:+18887154577">+1 (888)-715-4577</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-intro__note">
                        <span></span>
                        <p>Clear questions help us respond with the most useful information.</p>
                    </div>
                </aside>

                <div class="get-in-touch-wrap">
                    <div class="contact-form-heading">
                        <span>MESSAGE US</span>
                        <h2>Send Your Enquiry</h2>
                        <p>Complete the form below and we'll respond as soon as possible.</p>
                    </div>

                    <div class="contact-from contact-shadow">
                    <form id="contact-form" action="{{ url('/contact-submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <label for="contact-name">Your Name</label>
                                <input id="contact-name" name="name" type="text" placeholder="Enter your name">
                                <small class="text-danger name_error"></small>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="contact-email">Email Address</label>
                                <input id="contact-email" name="email" type="email" placeholder="Enter your email">
                                <small class="text-danger email_error"></small>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="contact-subject">Subject</label>
                                <input id="contact-subject" name="subject" type="text" placeholder="How can we help?">
                                <small class="text-danger subject_error"></small>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="contact-message">Your Message</label>
                                <textarea id="contact-message" name="message" placeholder="Write your message here"></textarea>
                                <small class="text-danger message_error"></small>
                            </div>
                            <div class="col-lg-12 col-md-12 contact-submit-row">
                                <span>Your details are used only to respond to this enquiry.</span>
                                <button class="submit" type="submit">Send Message <i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </form>
                    {{-- <p class="form-messege"></p> --}}
                    <div id="success-message"></div>
                    </div>
                </div>
            </div>
            <div class="contact-map pt-120">
                <div class="contact-map-card">
                    <div class="contact-map-frame">
                        <iframe class="map-size"
                            src="https://www.google.com/maps?q=9655%20Ensworth%20St%2C%20Unit%20216%2C%20Las%20Vegas%2C%20NV%2089123&z=17&output=embed"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();

                $('.text-danger').text('');
                $('#success-message').html('');

                const form = $(this);
                const submitButton = form.find('.submit');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    dataType: 'json',
                    headers: {
                        'Accept': 'application/json'
                    },
                    beforeSend: function() {
                        submitButton.prop('disabled', true).text('Sending...');
                    },
                    success: function(response) {
                        $('#success-message').html(
                            '<p class="text-success">' + (response.message ||
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
                                '<p class="text-danger">Something went wrong. Please try again.</p>'
                            );
                        }
                    },
                    complete: function() {
                        submitButton.prop('disabled', false).html(
                            'Send Message <i class="icon-arrow-right"></i>'
                        );
                    }
                });
            });
        });

        // $(document).ready(function() {

        //     $('#contact-form').on('submit', function(e) {
        //         e.preventDefault();

        //         $('.text-danger').text('');
        //         $('#success-message').html('');

        //         $.ajax({
        //             url: $(this).attr('action'),
        //             method: 'POST',
        //             data: $(this).serialize(),

        //             beforeSend: function() {
        //                 $('.submit').prop('disabled', true).text('Sending...');
        //             },

        //             success: function(response) {
        //                 $('#success-message').html(
        //                     '<p class="text-success">' + response.message + '</p>'
        //                 );

        //                 $('#contact-form')[0].reset();
        //             },

        //             error: function(xhr) {
        //                 if (xhr.status === 422) {
        //                     let errors = xhr.responseJSON.errors;

        //                     $.each(errors, function(key, value) {
        //                         $('.' + key + '_error').text(value[0]);
        //                     });
        //                 } else {
        //                     $('#success-message').html(
        //                         '<p class="text-danger">Something went wrong. Please try again.</p>'
        //                     );
        //                 }
        //             },

        //             complete: function() {
        //                 $('.submit').prop('disabled', false).text('Send Message');
        //             }
        //         });
        //     });

        // });
    </script>
@endpush
