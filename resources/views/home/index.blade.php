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
                <span class="slbl">What We Offer</span>
                <h2 class="stitle">Browse by <span>Category</span></h2>
                <div class="sline"></div>
                <p class="sdesc mx-auto" style="max-width:520px;">Explore thoughtfully curated technology categories
                    designed to simplify product discovery.</p>
            </div>
            <div class="row g-4 justify-content-center category-grid">
                @forelse ($homeCategories as $category)
                    @php
                        $categoryUrl = url('/products/' . $category->url);
                    @endphp
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3" data-aos="fade-up"
                        data-aos-delay="{{ min($loop->index * 70, 280) }}">
                        <article class="catcard">
                            <a class="catcard-main" href="{{ $categoryUrl }}"
                                aria-label="Explore {{ $category->name }}">
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
                        <div class="aexp"><span class="anum">12+</span><small>Years of<br />Excellence</small></div>
                        <div class="amain"><img src="{{ asset('themes/sarab/img/about1.jpg') }}" alt="Restaurant" />
                        </div>
                        <div class="asm"><img src="{{ asset('themes/sarab/img/about2.jpg') }}" alt="" /></div>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left">
                    <span class="slbl">Our Story</span>
                    <h2 class="stitle text-start">We Invite You to Visit<br />Our <span>Food Restaurant</span></h2>
                    <div class="sline lft"></div>
                    <p class="sdesc mb-4">Founded in 2012, Sarab began as a small corner joint with a big dream - to serve
                        food that brings people together. Today we're proud to serve thousands of happy customers every week
                        with the same passion that started it all.</p>
                    <div class="mb-4">
                        <div class="fti">
                            <div class="ftico r"><i class="fas fa-leaf"></i></div>
                            <div>
                                <h6>100% Fresh Ingredients</h6>
                                <p>We source locally and sustainably. Every ingredient is hand-picked daily for maximum
                                    freshness.</p>
                            </div>
                        </div>
                        <div class="fti">
                            <div class="ftico y"><i class="fas fa-award"></i></div>
                            <div>
                                <h6>Award-Winning Recipes</h6>
                                <p>Our signature recipes have won national culinary awards 5 years in a row.</p>
                            </div>
                        </div>
                        <div class="fti">
                            <div class="ftico g"><i class="fas fa-shipping-fast"></i></div>
                            <div>
                                <h6>Lightning-Fast Delivery</h6>
                                <p>Order online and get hot, fresh food at your door in under 25 minutes, guaranteed.</p>
                            </div>
                        </div>
                    </div>
                    <a href="#menu" class="btn-theme-primary"><i class="fas fa-book-open"></i>View Full Menu</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================
                                                                                                                                                                                         MENU � FIX 3 (filter works) + FIX 4 (plus opens popup)
                                                                                                                                                                                         ============================================================ -->
    <section id="menu">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="slbl">What's Cooking</span>
                <h2 class="stitle">Our Delicious <span>Menu</span></h2>
                <div class="sline"></div>
            </div>
            <!-- FIX 3 � filter buttons -->
            <div class="text-center mb-4" data-aos="fade-up">
                <button class="filtbtn active" data-f="all">All</button>
                <button class="filtbtn" data-f="burgers">Burgers</button>
                <button class="filtbtn" data-f="pizza">Pizza</button>
                <button class="filtbtn" data-f="chicken">Chicken</button>
                <button class="filtbtn" data-f="wraps">Wraps</button>
                <button class="filtbtn" data-f="desserts">Desserts</button>
                <button class="filtbtn" data-f="pasta">Pasta</button>
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
                            <div class="mbdg hot"><i class="fas fa-star"></i> Hot</div>
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Burgers</div>
                            <div class="mtit">Classic Smash Burger</div>
                            <div class="mdesc">Double smashed patty, cheddar, caramelized onions, pickles &amp; special
                                sauce</div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$14.99 <small>$18.99</small></div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(128)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD 2: Pizza -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="pizza" data-aos="fade-up" data-aos-delay="80">
                    <div class="mcard" data-img="img/menu/2.jpg" data-title="Margherita Royale" data-cat="Pizza"
                        data-price="$19.99" data-old="$24.99" data-rating="4.8" data-reviews="95" data-cal="480"
                        data-time="18"
                        data-desc="San Marzano tomatoes, fresh buffalo mozzarella, fragrant basil leaves, drizzled with Italian truffle oil on a hand-stretched sourdough base."
                        data-tags="Vegetarian,New,Italian">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/2.jpg') }}" alt="Pizza" />
                            <div class="mbdg new"><i class="fas fa-star"></i> New</div>
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Pizza</div>
                            <div class="mtit">Margherita Royale</div>
                            <div class="mdesc">San Marzano tomatoes, buffalo mozzarella, basil &amp; truffle oil on
                                sourdough</div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$19.99 <small>$24.99</small></div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(95)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD 3: Chicken -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="chicken" data-aos="fade-up" data-aos-delay="160">
                    <div class="mcard" data-img="img/menu/3.jpg" data-title="Nashville Hot Chicken" data-cat="Chicken"
                        data-price="$12.99" data-old="$16.99" data-rating="5.0" data-reviews="210" data-cal="710"
                        data-time="15"
                        data-desc="Extra-crispy fried chicken tossed in our signature fiery Nashville spice blend, served with honey drizzle and house pickles on a toasted brioche bun."
                        data-tags="Spicy,Bestseller,Crispy">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/3.jpg') }}" alt="Chicken" />
                            <div class="mbdg"><i class="fas fa-star"></i> Best Seller</div>
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Chicken</div>
                            <div class="mtit">Nashville Hot Chicken</div>
                            <div class="mdesc">Crispy fried chicken in fiery Nashville spice blend with honey drizzle
                            </div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$12.99 <small>$16.99</small></div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(210)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD 4: Wraps -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="wraps" data-aos="fade-up">
                    <div class="mcard" data-img="img/menu/4.jpg" data-title="Loaded Fajita Wrap" data-cat="Wraps"
                        data-price="$10.99" data-old="" data-rating="4.5" data-reviews="74" data-cal="520"
                        data-time="10"
                        data-desc="Grilled chicken strips, saut�ed bell peppers and onions, sour cream, fresh guacamole and salsa wrapped in a warm flour tortilla with melted cheddar."
                        data-tags="Grilled,Fresh,Mexican">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/4.jpg') }}" alt="Wrap" />
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Wraps</div>
                            <div class="mtit">Loaded Fajita Wrap</div>
                            <div class="mdesc">Grilled chicken, peppers, sour cream &amp; guacamole in a warm tortilla
                            </div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$10.99</div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(74)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD 5: Desserts -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="desserts" data-aos="fade-up" data-aos-delay="80">
                    <div class="mcard" data-img="img/menu/5.jpg" data-title="Nutella Lava Cake" data-cat="Desserts"
                        data-price="$8.99" data-old="$11.99" data-rating="4.9" data-reviews="56" data-cal="390"
                        data-time="8"
                        data-desc="Warm molten chocolate cake with a gooey Nutella center, served alongside Madagascar vanilla bean ice cream with salted caramel drizzle and fresh berries."
                        data-tags="Sweet,New,Chocolate">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/5.jpg') }}" alt="Lava Cake" />
                            <div class="mbdg new"><i class="fas fa-star"></i> New</div>
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Desserts</div>
                            <div class="mtit">Nutella Lava Cake</div>
                            <div class="mdesc">Molten chocolate cake with Nutella center, vanilla ice cream &amp; caramel
                            </div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$8.99 <small>$11.99</small></div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(56)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- CARD 6: Pasta -->
                <div class="col-sm-6 col-lg-4 mwrap" data-c="pasta" data-aos="fade-up" data-aos-delay="160">
                    <div class="mcard" data-img="img/menu/6.jpg" data-title="Truffle Mushroom Pasta" data-cat="Pasta"
                        data-price="$16.99" data-old="" data-rating="4.9" data-reviews="88" data-cal="560"
                        data-time="20"
                        data-desc="Al dente tagliatelle tossed with mixed wild mushrooms, freshly shaved black truffle, aged parmesan, fresh thyme and a touch of cream in garlic butter."
                        data-tags="Vegetarian,Chef's Pick,Italian">
                        <div class="mimg">
                            <img src="{{ asset('themes/sarab/img/menu/6.jpg') }}" alt="Pasta" />
                            <div class="mbdg hot">Chef's Pick</div>
                            <div class="mhrt"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="mbody">
                            <div class="mcat">Pasta</div>
                            <div class="mtit">Truffle Mushroom Pasta</div>
                            <div class="mdesc">Al dente tagliatelle, wild mushrooms, black truffle, parmesan &amp; thyme
                            </div>
                            <div class="mfoot">
                                <div>
                                    <div class="mprice">$16.99</div>
                                    <div class="mstars"><i class="fas fa-star"></i> <span
                                            style="color:#bbb;font-size:.7rem;">(88)</span></div>
                                </div>
                                <button class="madd" title="View Details"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end #mgrid -->
            <div class="text-center mt-5"><a href="#" class="btn-theme-primary"><i
                        class="fas fa-th-large"></i>View Full Menu</a></div>
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
                <span class="slbl">Food Showcase</span>
                <h2 class="stitle">Let's See Our <span>Fast Food</span></h2>
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
                <span class="slbl">The Culinary Team</span>
                <h2 class="stitle">Meet Our Expert <span>Chefs</span></h2>
                <div class="sline"></div>
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
                <span class="slbl">News &amp; Updates</span>
                <h2 class="stitle">Our Latest <span>Blog</span> Posts</h2>
                <div class="sline"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="blcard">
                        <div class="blimg">
                            <img src="{{ asset('themes/sarab/img/blog/1.jpg') }}" alt="" />
                            <div class="bldatebdg"><span class="bd">14</span><span class="bm">Mar</span></div>
                        </div>
                        <div class="blbody">
                            <div class="bltag">Food &amp; Health</div>
                            <div class="bltit"><a href="#">Healthy Fast Food: A Myth or Beautiful Reality</a></div>
                            <div class="blmeta"><span><i class="fas fa-user"></i>James Writer</span><span><i
                                        class="fas fa-comment"></i>24 Comments</span></div>
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
