<footer class="footer-area site-footer-dark">
    <div class="footer-top border-bottom-4 pt-55 pb-40">
        <div class="container">
            <div class="row footer-main-grid">

                <!-- Logo & Disclaimer -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h3 class="footer-title footer-brand-title ztm-brand">
                            <a class="footer-logo-link" href="{{ url('/') }}" aria-label="XTechMart home">
                                <img class="ztm-brand-logo" src="{{ asset('assets/images/ztm-logo.png') }}"
                                    width="207" height="46" alt="XTechMart">
                            </a>
                        </h3>

                        <div class="footer-info-list">
                            <p>
                                Connecting businesses with reliable technology solutions through expert guidance and
                                product discovery.

                            </p>
                        </div>

                        <div class="footer-brand-badges" aria-label="Website security badges">

                            <!-- Google Safe Browsing -->
                            <img src="{{ asset('assets/images/trust-badges/google-safe-browsing.png') }}"
                                alt="Google Safe Browsing" loading="lazy" onclick="openCenteredPopup()"
                                style="cursor:pointer;">

                            <!-- Sectigo SSL -->
                            <img src="{{ asset('assets/images/trust-badges/sectigo-secured.png') }}"
                                alt="Secured by Sectigo" loading="lazy" onclick="redirectToCertificate()"
                                style="cursor:pointer;">

                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h3 class="footer-title">Quick Links</h3>

                        <div class="footer-info-list">
                            <ul>

                                <li><a href="{{ url('/about-us') }}">About Us</a></li>
                                <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
                                <li><a href="{{ url('/products') }}">Products</a></li>
                                <li><a href="{{ url('/blogs') }}">Blogs</a></li>
                                <li><a href="{{ url('/faqs') }}">FAQs</a></li>
                                <li><a href="{{ url('/sitemap') }}">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Important Links -->
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="footer-important-groups">
                        <div class="footer-widget">
                            <h3 class="footer-title">Important Links</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                                    <li><a href="{{ url('/policy/terms-conditions') }}">Terms & Conditions</a></li>
                                    <li><a href="{{ url('/policy/disclaimer') }}">Disclaimer</a></li>
                                    <li><a href="{{ url('/policy/trademark-disclaimer') }}">Trademark Disclaimer</a>
                                    </li>
                                    <li><a href="{{ url('/policy/cookie-policy') }}">Cookie Policy</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="footer-widget">
                            <h3 class="footer-title">Policy Links</h3>
                            <div class="footer-info-list">
                                <ul>
                                    <li><a href="{{ url('/policy/quote-request-policy') }}">Quote Request Policy</a>
                                    </li>
                                    <li><a href="{{ url('/policy/product-information-disclaimer') }}">Product
                                            Information
                                            Disclaimer</a></li>
                                    <li><a href="{{ url('/policy/dmca-copyright-policy') }}">DMCA Copyright Policy</a>
                                    </li>
                                    <li><a href="{{ url('/policy/warranty-manufacturer-responsibility') }}">Warranty
                                            and
                                            Manufacturer Responsibility</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="footer-widget">
                        <h3 class="footer-title">Contact Info</h3>

                        <div class="footer-info-list">
                            <ul class="footer-contact-list">
                                <li>
                                    <span class="footer-contact-label">Address</span>
                                    <span>9655 Ensworth St 216, Las Vegas, NV 89123</span>
                                </li>
                                <li>
                                    <span class="footer-contact-label">Email</span>
                                    <a href="mailto:info@zerotechmart.com">info@zerotechmart.com</a>
                                </li>
                                <li>
                                    <span class="footer-contact-label">Contact Number</span>
                                    <a href="tel:+1-702-900-1234">+1 (888)-715-4577</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Additional Disclaimer -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="footer-note">
                        XTechMart is an independent technology information and product discovery platform. We do
                        not manufacture or directly sell the products featured on this website. All product names,
                        trademarks, logos, and brand names remain the property of their respective owners and are used
                        only for identification and informational purposes. Product specifications, features, and
                        availability may change without notice. Users are encouraged to request a personalized quote for
                        the latest product information, pricing, and availability.

                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom pt-30 pb-30">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <div class="copyright">
                        <p>
                            © 2026
                            <a href="{{ url('/') }}">XTechMart</a>
                            All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
    <script>
        // SSL Certificate
        function redirectToCertificate() {
            window.open(
                "https://decoder.link/sslchecker/zerotechmart.com/443",
                "_blank",
                "noopener,noreferrer"
            );
        }

        // Google Safe Browsing
        function openCenteredPopup() {
            const url =
                "https://transparencyreport.google.com/safe-browsing/search?url=https%3A%2F%2Fzerotechmart.com%2F&hl=en";

            const popupWidth = 800;
            const popupHeight = 600;

            const left = (window.screen.width - popupWidth) / 2;
            const top = (window.screen.height - popupHeight) / 2;

            const features =
                `width=${popupWidth},height=${popupHeight},left=${left},top=${top},resizable=yes,scrollbars=yes`;

            const win = window.open(url, "_blank", features);

            if (win) {
                win.focus();
            }
        }
    </script>
@endpush
