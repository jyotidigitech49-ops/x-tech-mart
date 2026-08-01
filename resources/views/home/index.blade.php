@extends('layouts.app')
@section('title', 'Sarab - Fast Food & Restaurant')
@section('content')

    {{-- hero-section --}}
    <section id="hero">
        <div class="hs hs1"></div>
        <div class="hs hs2"></div>
        <div class="hbgtxt">FOOD</div>
        <div class="container">
            <div class="row align-items-center g-5" style="min-height:88vh;">
                <div class="col-lg-6">
                    <div class="hbadge">
                        <div class="hbi"><i class="fas fa-star"></i></div>
                        <span>#1 Rated Fast Food Restaurant in New York</span>
                    </div>
                    <h1 class="htitle">Delicious <span class="hl">Fast Food</span><br />for Every Moment</h1>
                    <p class="hdesc">Experience bold flavors crafted from premium ingredients. From crispy burgers to
                        gourmet pizzas - every bite is an adventure worth savoring.</p>
                    <div class="d-flex flex-wrap gap-3 mb-2">
                        <a href="#menu" class="btn-theme-primary"><i class="fas fa-utensils"></i>Explore Menu</a>
                        <!-- FIX 2: Magnific popup video trigger -->
                        <a href="https://www.youtube.com/watch?v=RXv_uIN6e-Y" class="magnific_popup btn-play popup-youtube">
                            <div class="pico"><i class="fas fa-play"></i></div>
                            <span>Watch Our Story</span>
                        </a>
                    </div>
                    <div class="hstats d-flex gap-3 flex-wrap mt-4">
                        <div class="hstat"><span class="snum">850<em>+</em></span><small>Happy Customers</small></div>
                        <div class="sdiv"></div>
                        <div class="hstat"><span class="snum">120<em>+</em></span><small>Menu Items</small></div>
                        <div class="sdiv"></div>
                        <div class="hstat"><span class="snum">15<em>+</em></span><small>Expert Chefs</small></div>
                        <div class="sdiv"></div>
                        <div class="hstat"><span class="snum">12<em>yr</em></span><small>Experience</small></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div style="position:relative;text-align:center;">
                        <div class="hcircle">
                            <img src="{{ asset('themes/sarab/img/banner-img.jpg') }}" alt="Burger" />
                        </div>
                        <div class="fcard fc1">
                            <div class="fcoi r"><i class="fas fa-fire"></i></div>
                            <div><span class="fcnum">Hot Deal</span><span class="fcsm">30% off today</span></div>
                        </div>
                        <div class="fcard fc2">
                            <div class="fcoi y"><i class="fas fa-star"></i></div>
                            <div><span class="fcnum">4.9/5</span><span class="fcsm">2k+ reviews</span></div>
                        </div>
                        <div class="fcard fc3">
                            <div class="fcoi g"><i class="fas fa-clock"></i></div>
                            <div><span class="fcnum">20 min</span><span class="fcsm">Fast delivery</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CATEGORY -->
    <section id="category">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">CURATED FOR MODERN WORK
                </span>
                <h2 class="stitle">Explore Technology Categories</h2>
                <div class="sline"></div>
                <p class="sdesc mx-auto" style="max-width:520px;">Navigate focused collections of printers, thin clients,
                    desktops, and scanners selected for evolving workplace needs.
                </p>
            </div>
            <div class="row g-4 justify-content-center category-grid">
                @forelse ($homeCategories as $category)
                    @php
                        $categoryUrl = url('/products/' . $category->url);
                    @endphp
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3" data-aos="fade-up"
                        data-aos-delay="{{ min($loop->index * 70, 280) }}">
                        <article class="catcard">
                            <a class="catcard-main" href="{{ $categoryUrl }}" aria-label="Explore {{ $category->name }}">
                                @if ($category->category_image_url)
                                    <span class="catimg-circle">
                                        <img class="catimg" src="{{ $category->category_image_url }}"
                                            alt="{{ $category->name }}" loading="lazy">
                                    </span>
                                @endif
                                <div class="catnm">{{ $category->name }}</div>
                                <div class="catct">{{ $category->description }}</div>
                            </a>
                            <a class="catsoftbtn" href="{{ $categoryUrl }}">
                                Explore {{ $category->name }} <i class="fas fa-chevron-right"></i>
                            </a>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="category-empty">No product categories are available right now.</p>
                    </div>
                @endforelse
            </div>
            <div class="category-all-products text-center" data-aos="fade-up">
                <a class="btn-theme-primary" href="{{ url('/products') }}">
                    View All Products <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- ABOUT -->
    <section id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="astack">
                        <div class="amain"><img src="{{ asset('themes/sarab/img/about1.jpg') }}" alt="Restaurant" />
                        </div>
                        <div class="asm"><img src="{{ asset('themes/sarab/img/about2.jpg') }}" alt="" /></div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <span class="slbl">OUR STORY
                    </span>
                    <h2 class="stitle text-start">Technology Exploration
                        with Greater Perspective
                    </h2>
                    <div class="sline lft"></div>
                    <p class="sdesc mb-4">XTech Mart brings printers, scanners, desktops, and thin clients into one
                        thoughtfully organized platform. Clear product information and structured categories help
                        individuals and businesses explore suitable technology without navigating a direct-purchase process.
                    </p>
                    <div class="mb-4">
                        <div class="fti">
                            <div class="ftico r"><i class="fas fa-leaf"></i></div>
                            <div>
                                <h6>Focused Product Range</h6>
                                <p>We source locally and sustainably. Every ingredient is hand-picked daily for maximum
                                    freshness.</p>
                            </div>
                        </div>
                        <div class="fti">
                            <div class="ftico y"><i class="fas fa-award"></i></div>
                            <div>
                                <h6>Clearer Product Insight</h6>
                                <p>Relevant features and specifications arranged for easier research and comparison.</p>
                            </div>
                        </div>
                        <div class="fti">
                            <div class="ftico g"><i class="fas fa-shipping-fast"></i></div>
                            <div>
                                <h6>Personalized Quote Access</h6>
                                <p>A direct way to request pricing, availability, and additional product details.</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('/products') }}" class="btn-theme-primary"><i class=""></i>Explore
                        Products</a>
                </div>
            </div>
        </div>
    </section>

    {{-- tab filter procduct section --}}

    <section id="menu">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">SELECTED WITH PURPOSE</span>
                <h2 class="stitle">Technology Shaped for the Work Ahead</h2>
                <div class="sline"></div>
            </div>
            <!-- FIX 3 � filter buttons -->
            <div class="text-center mb-4" data-aos="fade-up">
                <button class="filtbtn active" data-f="all">All Products</button>
                <button class="filtbtn" data-f="burgers">Printers</button>
                <button class="filtbtn" data-f="pizza">Thin Clients</button>
                <button class="filtbtn" data-f="chicken"> Desktops</button>
                <button class="filtbtn" data-f="wraps"> Scanners</button>
            </div>
            <div class="row g-4" id="mgrid">
                <!-- CARD 1: Burgers -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="burgers" data-aos="fade-up">
                    <div class="mcard" data-img="img/menu/1.jpg" data-title="Classic Smash Burger" data-cat="Burgers"
                        data-price="$14.99" data-old="$18.99" data-rating="4.9" data-reviews="128" data-cal="620"
                        data-time="12"
                        data-desc="Double smashed patty, cheddar cheese, caramelized onions, house pickles and our legendary special sauce. Made fresh to order on a toasted brioche bun."
                        data-tags="Spicy,Bestseller,Beef">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/1.jpg') }}" alt="Smash Burger" />

                        </div>
                        <div class="mbody">
                            <div class="mcat">Burgers</div>
                            <div class="mtit">Classic Smash Burger</div>
                            <div class="mdesc">Double smashed patty, cheddar, caramelized onions, pickles &amp; special
                                sauce</div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$14.99</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end #mgrid -->
            <div class="text-center mt-5"><a href="#" class="btn-theme-primary"><i class=""></i>View All
                    Items</a></div>
        </div>
    </section>


    <!-- ============================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                         FIX 4 � MENU DETAIL POPUP MODAL
                                                                                                                                                                                                                                                                                                                                                                                                                                                         ============================================================ -->
    <div id="menuPop">
        <div class="mpbox">
            <button class="mpclose" id="mpClose"><i class="fas fa-times"></i></button>
            <div class="mpimg"><img id="mpImg" src="" alt="" /></div>
            <div class="mpbody">
                <div id="mpCat"></div>
                <div id="mpTitle"></div>
                <div id="mpStars"></div>
                <div id="mpDesc"></div>
                <div id="mpPrice"></div>
                <div class="mpmeta" id="mpMeta"></div>
                <div class="mpqty">
                    <button class="mpqbtn" id="mpMinus">-</button>
                    <span class="mpqnum" id="mpQnum">1</span>
                    <button class="mpqbtn" id="mpPlus">+</button>
                    <span style="font-size:.82rem;color:#aaa;margin-left:9px;">portion</span>
                </div>
                <div class="mptags" id="mpTags"></div>
                <button class="mpaddcart" id="mpAddCart"><i class="fas fa-shopping-cart"></i>Add to Cart</button>
            </div>
        </div>
    </div>
    <!-- SPECIAL OFFER -->
    <section id="special">
        <div class="spbg"></div>
        <div class="container" style="position:relative;z-index:2;">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="sptag"><i class="fas fa-bolt me-1"></i>Limited Time Offer</div>
                    <h2 class="sptitle">Get 30% Off<br />Our Signature<br /><span>Burger</span> Meal</h2>
                    <p class="spdesc">Don't miss our weekend special - grab our award-winning signature burger combo with
                        loaded fries and a premium shake at an unbeatable price.</p>
                    <div class="cdwrap">
                        <div class="cditem"><span class="cdnum" id="cdH">08</span><span
                                class="cdlbl">Hours</span></div>
                        <div class="cditem"><span class="cdnum" id="cdM">45</span><span
                                class="cdlbl">Minutes</span></div>
                        <div class="cditem"><span class="cdnum" id="cdS">30</span><span
                                class="cdlbl">Seconds</span></div>
                    </div>
                    <a href="#menu" class="btn-theme-primary"><i class="fas fa-shopping-cart"></i>Grab the Deal</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="spimgw">
                        <div class="spglow"></div>
                        <div class="sppbdg"><span class="old">$24.99</span><span class="np">$17.49</span></div>
                        <img src="{{ asset('themes/sarab/img/off-img.jpg') }}" alt="Special Burger" />
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ============================================================
                                                                                                                                                                                                                                                                                                                                                                                                                                                         GALLERY � FIX 7 (click opens detail popup)
                                                                                                                                                                                                                                                                                                                                                                                                                                                         ============================================================ -->
    <section id="gallery">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">PRODUCT SPOTLIGHT
                </span>
                <h2 class="stitle">See Every Product in Focus</h2>
                <div class="sline"></div>
            </div>
            <div class="ggrid" data-aos="fade-up">
                <div class="gitem" data-gi="0" data-gimg="img/portfolio/work1.jpg" data-gtitle="Gourmet Burgers"
                    data-gdesc="Our award-winning smash burgers, hand-crafted with 100% premium beef, aged cheddar and house-made sauces.">
                    <img src="{{ asset('themes/sarab/img/portfolio/work1.jpg') }}" alt="Burgers" />
                    <div class="gover"><span><i class="fas fa-expand-alt"></i> Gourmet Burgers</span></div>
                </div>
                <div class="gitem" data-gi="1" data-gimg="img/portfolio/work2.jpg" data-gtitle="Wood-Fired Pizza"
                    data-gdesc="Authentic Neapolitan-style pizzas fired at 900deg F in our wood-burning stone oven for the perfect char.">
                    <img src="{{ asset('themes/sarab/img/portfolio/work2.jpg') }}" alt="Pizza" />
                    <div class="gover"><span><i class="fas fa-expand-alt"></i> Wood-Fired Pizza</span></div>
                </div>
                <div class="gitem" data-gi="2" data-gimg="img/portfolio/work3.jpg"
                    data-gtitle="Crispy Fried Chicken"
                    data-gdesc="Double-brined, hand-battered chicken fried to golden perfection using our 15-spice secret blend.">
                    <img src="{{ asset('themes/sarab/img/portfolio/work3.jpg') }}" alt="Chicken" />
                    <div class="gover"><span><i class="fas fa-expand-alt"></i> Crispy Fried Chicken</span></div>
                </div>
                <div class="gitem" data-gi="3" data-gimg="img/portfolio/work4.jpg" data-gtitle="Sweet Desserts"
                    data-gdesc="Handcrafted desserts - from molten lava cakes to artisan ice cream sundaes and seasonal pastries.">
                    <img src="{{ asset('themes/sarab/img/portfolio/work4.jpg') }}" alt="Desserts" />
                    <div class="gover"><span><i class="fas fa-expand-alt"></i> Sweet Desserts</span></div>
                </div>
                <div class="gitem" data-gi="4" data-gimg="img/portfolio/work5.jpg"
                    data-gtitle="Fresh Wraps &amp; Rolls"
                    data-gdesc="Loaded fresh wraps packed with grilled proteins, crunchy vegetables and our house-made sauces.">
                    <img src="{{ asset('themes/sarab/img/portfolio/work5.jpg') }}" alt="Wraps" />
                    <div class="gover"><span><i class="fas fa-expand-alt"></i> Fresh Wraps &amp; Rolls</span></div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIX 7 � GALLERY POPUP -->
    <div id="galPop">
        <div class="gpbox">
            <button class="gpclose" id="gpClose"><i class="fas fa-times"></i></button>
            <img id="gpImg" src="" alt="" />
            <div class="gpcap">
                <h5 id="gpTitle"></h5>
                <p id="gpDesc"></p>
            </div>
            <div class="gpnav">
                <button id="gpPrev"><i class="fas fa-chevron-left me-1"></i>Prev</button>
                <button id="gpNext">Next <i class="fas fa-chevron-right ms-1"></i></button>
            </div>
        </div>
    </div>

    <!-- CHEFS -->
    <section id="chefs">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">FEATURED COLLECTION </span>
                <h2 class="stitle">Browse Our Product Highlights</h2>
                <div class="sline"></div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/1.jpg') }}" alt="" />

                        </div>
                        <div class="chbody">
                            <div class="chnm">Alice Mortal</div>
                            <div class="chrole">Head Chef</div>
                            <div class="chexp">12 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="80">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/2.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Michael Corn</div>
                            <div class="chrole">Grill Master</div>
                            <div class="chexp">8 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="160">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/3.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Faz Chowdel</div>
                            <div class="chrole">Pastry Chef</div>
                            <div class="chexp">10 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/4.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">William Latnum</div>
                            <div class="chrole">Pizza Artisan</div>
                            <div class="chexp">9 years experience</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/1.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Alice Mortal</div>
                            <div class="chrole">Head Chef</div>
                            <div class="chexp">12 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="80">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/2.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Michael Corn</div>
                            <div class="chrole">Grill Master</div>
                            <div class="chexp">8 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="160">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/3.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Faz Chowdel</div>
                            <div class="chrole">Pastry Chef</div>
                            <div class="chexp">10 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/4.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">William Latnum</div>
                            <div class="chrole">Pizza Artisan</div>
                            <div class="chexp">9 years experience</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="0">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/1.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Alice Mortal</div>
                            <div class="chrole">Head Chef</div>
                            <div class="chexp">12 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="80">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/2.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Michael Corn</div>
                            <div class="chrole">Grill Master</div>
                            <div class="chexp">8 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="160">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/3.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">Faz Chowdel</div>
                            <div class="chrole">Pastry Chef</div>
                            <div class="chexp">10 years experience</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="240">
                    <div class="chcard">
                        <div class="chimg">
                            <img src="{{ asset('themes/sarab/img/chefs/4.jpg') }}" alt="" />
                            <div class="chsoc"><a href="#"><i class="fab fa-instagram"></i></a><a
                                    href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-twitter"></i></a></div>
                        </div>
                        <div class="chbody">
                            <div class="chnm">William Latnum</div>
                            <div class="chrole">Pizza Artisan</div>
                            <div class="chexp">9 years experience</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- BLOG -->
    <section id="blog">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">INSIGHTS & UPDATES
                </span>
                <h2 class="stitle">Explore Our Technology Blogs
                </h2>
                <div class="sline"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="blcard">
                        <div class="blimg">
                            <img src="{{ asset('themes/sarab/img/blog/1.jpg') }}" alt="" />
                        </div>
                        <div class="blbody">
                            <div class="bltag">Food &amp; Health</div>
                            <div class="bltit"><a href="#">Healthy Fast Food: A Myth or Beautiful Reality</a></div>
                            <div class="blmeta"><span>Sarah Grain</span></div>
                            <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="80">
                    <div class="blcard">
                        <div class="blimg">
                            <img src="{{ asset('themes/sarab/img/blog/2.jpg') }}" alt="" />
                            <div class="bldatebdg"><span class="bd">28</span><span class="bm">Feb</span></div>
                        </div>
                        <div class="blbody">
                            <div class="bltag">Food Science</div>
                            <div class="bltit"><a href="#">Is Fast Food Getting Healthier? Here's What We Found</a>
                            </div>
                            <div class="blmeta"><span><i class="fas fa-user"></i>Sarah Grain</span><span><i
                                        class="fas fa-comment"></i>18 Comments</span></div>
                            <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="160">
                    <div class="blcard">
                        <div class="blimg">
                            <img src="{{ asset('themes/sarab/img/blog/3.jpg') }}" alt="" />
                            <div class="bldatebdg"><span class="bd">05</span><span class="bm">Jan</span></div>
                        </div>
                        <div class="blbody">
                            <div class="bltag">Recipes</div>
                            <div class="bltit"><a href="#">Innovative Hot Chickpeas Flake Crackin' Recipe at
                                    Home</a></div>
                            <div class="blmeta"><span><i class="fas fa-user"></i>Chef Marcus</span><span><i
                                        class="fas fa-comment"></i>32 Comments</span></div>
                            <a href="#" class="blmore">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
