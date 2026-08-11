<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <a class="footer-brand-logo" href="{{ url('/') }}" aria-label="XTechMart home">
                    <img src="{{ asset('assets/images/ztm-logo.png') }}" width="207" height="46" alt="XTechMart">
                </a>
                <p class="fdesc">
                    XTech Mart simplifies product discovery through clear information, organized technology categories,
                    and personalized quote assistance for home and business needs.
                </p>
                <div class="footer-trust-badges" aria-label="Website security badges">
                    <button type="button" onclick="openCenteredPopup()" aria-label="Check Google Safe Browsing status">
                        <img src="{{ asset('assets/images/trust-badges/google-safe-browsing.png') }}"
                            alt="Google Safe Browsing" loading="lazy">
                    </button>
                    <button type="button" onclick="redirectToCertificate()" aria-label="Check Sectigo SSL certificate">
                        <img src="{{ asset('assets/images/trust-badges/sectigo-secured.png') }}"
                            alt="Secured by Sectigo" loading="lazy">
                    </button>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="ftit">Quick Links</div>
                <ul class="flinks ps-0">
                    <li><a href="{{ url('/about-us') }}"><i class="fas fa-chevron-right"></i>About Us</a></li>
                    <li><a href="{{ url('/contact-us') }}"><i class="fas fa-chevron-right"></i>Contact Us</a></li>
                    <li><a href="{{ url('/products') }}"><i class="fas fa-chevron-right"></i>Products</a></li>
                    <li><a href="{{ url('/blogs') }}"><i class="fas fa-chevron-right"></i>Blogs</a></li>
                    <li><a href="{{ url('/faqs') }}"><i class="fas fa-chevron-right"></i>FAQs</a></li>
                    <li><a href="{{ url('/sitemap') }}"><i class="fas fa-chevron-right"></i>Sitemap</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="row g-4">
                    <div class="col-sm-6">
                        <div class="ftit">Important Links</div>
                        <ul class="flinks ps-0">
                            <li><a href="{{ url('/privacy-policy') }}"><i class="fas fa-chevron-right"></i>Privacy
                                    Policy</a></li>
                            <li><a href="{{ url('/policy/terms-conditions') }}"><i
                                        class="fas fa-chevron-right"></i>Terms &amp; Conditions</a></li>
                            <li><a href="{{ url('/policy/disclaimer') }}"><i
                                        class="fas fa-chevron-right"></i>Disclaimer</a></li>
                            <li><a href="{{ url('/policy/trademark-disclaimer') }}"><i
                                        class="fas fa-chevron-right"></i>Trademark Disclaimer</a></li>
                            <li><a href="{{ url('/policy/cookie-policy') }}"><i class="fas fa-chevron-right"></i>Cookie
                                    Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="ftit">Policy Links</div>
                        <ul class="flinks ps-0">
                            <li><a href="{{ url('/policy/quote-request-policy') }}"><i
                                        class="fas fa-chevron-right"></i>Quote Request Policy</a></li>
                            <li><a href="{{ url('/policy/product-information-disclaimer') }}"><i
                                        class="fas fa-chevron-right"></i>Product Information Disclaimer</a></li>
                            <li><a href="{{ url('/policy/dmca-copyright-policy') }}"><i
                                        class="fas fa-chevron-right"></i>DMCA Copyright Policy</a></li>
                            <li><a href="{{ url('/policy/warranty-manufacturer-responsibility') }}"><i
                                        class="fas fa-chevron-right"></i>Warranty and Manufacturer Responsibility</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="ftit">Contact Info</div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="fciinfo"><strong>Address</strong>20 Hammond Pond Pkwy403, Chestnut Hill, MA 02467
                    </div>
                </div>
                <div class="fci">
                    <div class="fciico"><i class="fas fa-envelope"></i></div>
                    <div class="fciinfo">
                        <strong>Email</strong>
                        <a href="mailto:info@xtechmart.com">info@xtechmart.com</a>
                    </div>
                </div>
                {{-- <div class="fci">
                    <div class="fciico"><i class="fas fa-phone-alt fa-flip-horizontal"></i></div>
                    <div class="fciinfo">
                        <strong>Contact Number</strong>
                        <a href="tel:+18887154577"></a>
                    </div>
                </div> --}}
            </div>
        </div>

        <p class="footer-note-new">
            XTech Mart is an independent technology information and product discovery platform. Product names,
            trademarks, logos, and images belong to their respective owners and are used only for identification and
            informational purposes. Product specifications, pricing, and availability may change without notice. XTech
            Mart does not manufacture products or provide manufacturer warranties. Visitors should verify current
            details and request a quote before making any product-related decision.
        </p>
    </div>

    <div class="fbot">
        <div class="container">
            <p class="text-center">
                &copy; 2026 <a class="footer-copyright-brand" href="{{ url('/') }}">XTechMart</a>. All rights
                reserved.
            </p>
        </div>
    </div>
</footer>

<!-- Back to top -->
<button id="btt" type="button" aria-label="Back to top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="fas fa-chevron-up"></i>
</button>

@push('scripts')
    <script>
        function redirectToCertificate() {
            window.open(
                'https://decoder.link/sslchecker/xtechmart.com/443',
                '_blank',
                'noopener,noreferrer'
            );
        }

        function openCenteredPopup() {
            const url =
                'https://transparencyreport.google.com/safe-browsing/search?url=https%3A%2F%2Fxtechmart.com%2F&hl=en';
            const popupWidth = 800;
            const popupHeight = 600;
            const left = (window.screen.width - popupWidth) / 2;
            const top = (window.screen.height - popupHeight) / 2;
            const features =
                `width=${popupWidth},height=${popupHeight},left=${left},top=${top},resizable=yes,scrollbars=yes`;
            const popup = window.open(url, '_blank', features);

            if (popup) {
                popup.focus();
            }
        }
    </script>
@endpush
