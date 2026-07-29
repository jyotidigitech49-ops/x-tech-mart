<header class="header-area">
            <div class="header-large-device ztm-desktop-header">

                <div class="header-middle">
                    <div class="container">
                        <div class="ztm-header-card">
                            <div class="ztm-brand">
                                <a href="{{ url('/') }}" aria-label="XTechMart home">
                                    <img class="ztm-brand-logo" src="{{ asset('assets/images/ztm-logo.png') }}"
                                        width="207" height="46" alt="XTechMart">
                                </a>
                            </div>
                            <div class="ztm-header-search">
                                <div class="categori-search-wrap categori-search-wrap-modify-3">
                                    <div class="search-wrap-3">
                                        <form action="{{ url('/search') }}" method="GET" class="global-search-form" id="desktop-global-search-form">
                                            <input type="hidden" name="category" value="all">
                                            <input placeholder="Search products..." type="text" name="q" list="global-search-products">
                                            <button class="blue" aria-label="Search"><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                    <datalist id="global-search-products">
                                        <option value="Printer">
                                        <option value="Officejet Printer">
                                        <option value="Laser Printer">
                                        <option value="Inkjet Printer">
                                        <option value="Deskjet Printer">
                                        <option value="Desktops">
                                        <option value="Thin Client">
                                        <option value="Scanner">
                                    </datalist>
                                </div>
                            </div>
                            <nav class="ztm-header-links" aria-label="Primary navigation">
                                <span class="ztm-nav-dropdown">
                                    <a href="{{ url('/products/printer') }}">PRINTERS <i class="icon-arrow-down"></i></a>
                                    <span class="ztm-nav-dropdown-menu">
                                        <a href="{{ url('/products/printer/officejet-printer') }}">Officejet Printer</a>
                                        <a href="{{ url('/products/printer/laserjet-printer') }}">Laser Printer</a>
                                        <a href="{{ url('/products/printer/inkjet-printer') }}">Inkjet Printer</a>
                                        <a href="{{ url('/products/printer/deskjet-printer') }}">Deskjet Printer</a>
                                    </span>
                                </span>
                                <a href="{{ url('/products/desktops') }}">DESKTOPS</a>
                                <a href="{{ url('/products/thin-client') }}">THIN CLIENT</a>
                                <a href="{{ url('/products/scanner') }}">SCANNERS</a>
                                <a href="{{ url('/blogs') }}">BLOGS</a>
                                <a href="{{ url('/contact-us') }}">CONTACT US</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-bottom bg-blue ztm-category-bar">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="main-categori-wrap main-categori-wrap-modify-2">
                                    <a class="categori-show categori-blue" href="#">All CATEGORIES <i class="icon-arrow-down icon-right"></i></a>
                                    <div class="category-menu-2 category-menu-2-blue categori-hide categori-not-visible-2">
                                        <nav>
                                            <ul>
                                                <li><a href="{{ url('/products/printer') }}"><i class=""></i>PRINTERS</a></li>
                                                <li><a href="{{ url('/products/desktops') }}"><i class=""></i>DESKTOPS</a></li>
                                                <li><a href="{{ url('/products/thin-client') }}"><i class=""></i>THIN CLIENT</a></li>
                                                <li><a href="{{ url('/products/scanner') }}"><i class=""></i>SCANNERS</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="main-menu main-menu-white main-menu-padding-1 main-menu-font-size-14 main-menu-lh-5">
                                    <nav>
                                        <ul>
                                            <li><a href="{{ url('/products/printer') }}">PRINTERS</a>
                                                <ul class="sub-menu-style">
                                                    <li><a href="{{ url('/products/printer/officejet-printer') }}">Officejet Printer</a></li>
                                                    <li><a href="{{ url('/products/printer/laserjet-printer') }}">Laser Printer</a></li>
                                                    <li><a href="{{ url('/products/printer/inkjet-printer') }}">Inkjet Printer</a></li>
                                                    <li><a href="{{ url('/products/printer/deskjet-printer') }}">Deskjet Printer</a></li>

                                                </ul>
                                            </li>
                                            <li><a href="{{ url('/products/desktops') }}">DESKTOPS</a>

                                            </li>
                                            <li><a href="{{ url('/products/thin-client') }}">THIN CLIENT</a></li>

                                            <li><a href="{{ url('/products/scanner') }}">SCANNERS</a>

                                            </li>
                                            <li><a href="{{ url('/blogs') }}">BLOGS</a></li>
                                            <li><a href="{{ url('contact-us') }}">CONTACT US</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="header-small-device small-device-ptb-1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo ztm-brand">
                                <a href="{{ url('/') }}" aria-label="XTechMart home">
                                    <img class="ztm-brand-logo" src="{{ asset('assets/images/ztm-logo.png') }}"
                                        width="207" height="46" alt="XTechMart">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#" aria-label="Open navigation">
                                        <i class="icon-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile header start -->
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close" aria-label="Close navigation"><i class="icon_close"></i></a>
                <div class="mobile-header-content-area">
                    <div class="mobile-search mobile-header-padding-border-1">
                        <form class="search-form global-search-form" action="{{ url('/search') }}" method="GET">
                            <input type="hidden" name="category" value="all">
                            <input type="text" name="q" placeholder="Search products..." list="global-search-products">
                            <button class="button-search" type="submit" aria-label="Search products">
                                <i class="icon-magnifier"></i>
                            </button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-padding-border-2">
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="{{ url('/products/printer') }}">PRINTERS</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/products/printer/officejet-printer') }}">Officejet Printer</a></li>
                                        <li><a href="{{ url('/products/printer/laserjet-printer') }}">Laser Printer</a></li>
                                        <li><a href="{{ url('/products/printer/inkjet-printer') }}">Inkjet Printer</a></li>
                                        <li><a href="{{ url('/products/printer/deskjet-printer') }}">Deskjet Printer</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ url('/products/desktops') }}">DESKTOPS</a></li>
                                <li><a href="{{ url('/products/thin-client') }}">THIN CLIENT</a></li>
                                <li><a href="{{ url('/products/scanner') }}">SCANNERS</a></li>
                                <li><a href="{{ url('/blogs') }}">BLOGS</a></li>
                                <li><a href="{{ url('/contact-us') }}">CONTACT US</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-contact-info mobile-header-padding-border-4 site-mobile-contact">
                        <ul>
                            <li>
                                <i class="icon-envelope-open"></i>
                                <a href="mailto:info@zerotechmart.com">info@zerotechmart.com</a>
                            </li>
                            <li><i class="icon-home"></i>196 Tosto RD, Beaufort, NC 28526</li>
                            <li><i class="icon-clock"></i>Monday - Friday, 9:00am - 5:00pm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


@push('scripts')
    <script>
        document.querySelectorAll('.global-search-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                var searchInput = form.querySelector('input[name="q"]');
                var categoryInput = form.elements.category || document.querySelector('[form="' + form.id + '"][name="category"]');
                var searchValue = searchInput ? searchInput.value.trim() : '';
                var categoryValue = categoryInput ? categoryInput.value.trim() : 'all';
                var pathValue = searchValue || (categoryValue !== 'all' ? categoryValue : '');
                var searchUrl = '{{ url('/search') }}';

                if (pathValue) {
                    searchUrl += '/' + encodeURIComponent(
                        pathValue
                            .toLowerCase()
                            .replace(/&/g, 'and')
                            .replace(/[^a-z0-9]+/g, '-')
                            .replace(/^-+|-+$/g, '')
                    );
                }

                if (searchValue && categoryValue && categoryValue !== 'all') {
                    searchUrl += '?category=' + encodeURIComponent(categoryValue);
                }

                window.location.href = searchUrl;
            });
        });
    </script>
@endpush
