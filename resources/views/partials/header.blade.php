<nav class="navbar navbar-expand-lg xtech-header" id="nav" aria-label="Primary navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" aria-label="XTechMart home">
            <img class="xtech-header__logo" src="{{ asset('assets/images/ztm-logo.png') }}"
                width="225" height="50" alt="XTechMart">
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navmenu" aria-controls="navmenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown xtech-header__dropdown">
                    <div class="xtech-header__dropdown-row">
                        <a class="nav-link {{ request()->is('products/printer*') ? 'active' : '' }}"
                            href="{{ url('/products/printer') }}">
                        Printers
                        </a>
                        <button class="xtech-header__dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" aria-label="Toggle printer categories">
                            <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/products/printer') }}">All Printers</a></li>
                            <li><a class="dropdown-item" href="{{ url('/products/printer/officejet-printer') }}">Officejet Printer</a></li>
                            <li><a class="dropdown-item" href="{{ url('/products/printer/laserjet-printer') }}">Laser Printer</a></li>
                            <li><a class="dropdown-item" href="{{ url('/products/printer/inkjet-printer') }}">Inkjet Printer</a></li>
                            <li><a class="dropdown-item" href="{{ url('/products/printer/deskjet-printer') }}">Deskjet Printer</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products/desktops*') ? 'active' : '' }}"
                        href="{{ url('/products/desktops') }}">Desktops</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products/thin-client*') ? 'active' : '' }}"
                        href="{{ url('/products/thin-client') }}">Thin Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products/scanner*') ? 'active' : '' }}"
                        href="{{ url('/products/scanner') }}">Scanners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blogs*') || request()->is('blog*') ? 'active' : '' }}"
                        href="{{ url('/blogs') }}">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}"
                        href="{{ url('/contact-us') }}">Contact Us</a>
                </li>
            </ul>

            <button id="navSearchBtn" type="button" title="Search products" aria-label="Search products">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</nav>

<div id="searchOv" role="dialog" aria-modal="true" aria-labelledby="searchTitle">
    <button class="sovclose" id="searchClose" type="button" aria-label="Close search">
        <i class="fas fa-times"></i>
    </button>
    <div class="sovbox">
        <h4 id="searchTitle">What product are you looking for?</h4>
        <form class="sovinput" action="{{ url('/search') }}" method="GET">
            <input type="text" id="searchInput" name="q"
                placeholder="Search printers, desktops, scanners..." autocomplete="off"
                list="global-search-products">
            <button type="submit" aria-label="Submit search"><i class="fas fa-search"></i></button>
        </form>

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

        <div class="sovcats" aria-label="Product categories">
            <a class="xtech-search-category active" href="{{ url('/products') }}">All Products</a>
            <a class="xtech-search-category" href="{{ url('/products/printer') }}">Printers</a>
            <a class="xtech-search-category" href="{{ url('/products/desktops') }}">Desktops</a>
            <a class="xtech-search-category" href="{{ url('/products/thin-client') }}">Thin Client</a>
            <a class="xtech-search-category" href="{{ url('/products/scanner') }}">Scanners</a>
        </div>

        <div class="sovtrend">
            <p><i class="fas fa-fire me-1"></i>Popular Searches</p>
            <button class="ttag" type="button">Officejet Printer</button>
            <button class="ttag" type="button">Laser Printer</button>
            <button class="ttag" type="button">Inkjet Printer</button>
            <button class="ttag" type="button">Deskjet Printer</button>
            <button class="ttag" type="button">Thin Client</button>
            <button class="ttag" type="button">Scanner</button>
        </div>
    </div>
</div>
