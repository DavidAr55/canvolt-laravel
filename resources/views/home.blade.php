@extends('layouts.home-layout')

@section('title', '¡Bienvenido a Canvolt!')

@section('content')

@include('layouts.alerts')

<!-- main-slider -->
<section class="s-main-slider s-dark-slider">
    <ul class="main-soc-list">
        <li><a href="{{ config('app.social.instagram') }}" target="_blank">instagram</a></li>
        <li><a href="{{ config('app.social.facebook') }}" target="_blank">facebook</a></li>
        <li><a href="{{ config('app.social.tiktok') }}" target="_blank">tiktok</a></li>
    </ul>
    <div class="dark-slider">
        <div class="dark-slide" style="background-image: url('{{ asset('images/assets/bg-slider-4.png') }}');">
            <span class="bg-text-left">Xiaomi</span>
            <span class="bg-text-right">Scooter</span>
            <span class="effect-bg-dark" style="background-image: url('{{ asset('images/assets/effect-dark-slider.svg') }}');"></span>
            <div class="container">
                <div class="dark-slide-info">
                    <h2 class="name">T0s</h2>
                    <div class="model">T0S/ 36V / 7,8Ah</div>
                    <div class="price">$17,499.00 MX</div>
                    <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                </div>
                <img class="dark-slide-img" src="{{ asset('images/scooters/T0s.png') }}" alt="img">
            </div>
        </div>
        <div class="dark-slide" style="background-image: url('{{ asset('images/assets/bg-slider-4.png') }}');">
            <span class="bg-text-left">Best</span>
            <span class="bg-text-right">Scooter</span>
            <span class="effect-bg-dark" style="background-image: url('{{ asset('images/assets/effect-dark-slider.svg') }}');"></span>
            <div class="container">
                <div class="dark-slide-info">
                    <h2 class="name">system rx</h2>
                    <div class="model">best mode rx-210</div>
                    <div class="price">$1.799</div>
                    <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                </div>
                <img class="dark-slide-img" src="{{ asset('images/scooters/Suv S1.png') }}" alt="img">
            </div>
        </div>
        <div class="dark-slide" style="background-image: url('{{ asset('images/assets/bg-slider-4.png') }}');">
            <span class="bg-text-left">Best</span>
            <span class="bg-text-right">Scooter</span>
            <span class="effect-bg-dark" style="background-image: url('{{ asset('images/assets/effect-dark-slider.svg') }}');"></span>
            <div class="container">
                <div class="dark-slide-info">
                    <h2 class="name">system Z</h2>
                    <div class="model">best mode Z-300</div>
                    <div class="price">$2.899</div>
                    <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                </div>
                <img class="dark-slide-img" src="{{ asset('images/scooters/T3S.png') }}" alt="img">
            </div>
        </div>
    </div>
    <div class="dark-slide-navigation"></div>
</section>
<!-- main-slider end -->

<!-- S-DARK-CATEGORY -->
<section class="s-dark-category">
    <div class="container">
        <div class="dark-category-cover row">
            <div class="dark-category-left col-md-8">
                <a href="single-shop.html" class="dark-category-item dark-category-big" style="background-image: url('{{ asset('images/assets/dark-categ-1.png') }}');">
                    <div class="dark-categ-info">
                        <div class="name">find the bike</div>
                        <h3 class="title">bike rx 2000</h3>
                        <div class="price">
                            <div class="new-price">$ 1257</div>
                            <div class="old-price">$ 1357</div>
                        </div>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-categ-img-1.png') }}" alt="img">
                </a>
                <a href="shop.html" class="dark-category-item" style="background-image: url('{{ asset('images/assets/dark-categ-2.png') }}');">
                    <div class="dark-categ-info">
                        <div class="name">free shiping</div>
                        <h3 class="title">spare parts</h3>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-categ-img-2.png') }}" alt="img">
                </a>
                <a href="shop.html" class="dark-category-item" style="background-image: url('{{ asset('images/assets/dark-categ-2.png') }}');">
                    <div class="dark-categ-info">
                        <div class="name">free shiping</div>
                        <h3 class="title">accessories</h3>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-categ-img-3.png') }}" alt="img">
                </a>
            </div>
            <div class="dark-category-right col-md-4">
                <a href="shop.html" class="dark-category-item" style="background-image: url('{{ asset('images/assets/dark-categ-3.png') }}');">
                    <div class="dark-categ-info">
                        <h3 class="title">all bikes</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-categ-img-4.png') }}" alt="img">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- S-DARK-CATEGORY END -->

<!-- S-OUR-ADVANTAGES -->
<section class="s-dark-advantages">
    <div class="container">
        <h2 class="title">Our Advantages</h2>
        <div class="dark-advantage-wrap row">
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('{{ asset('images/assets/dark-adv-bg.png') }}');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-1.svg') }}" alt="icon">
                    <h5>Free shipping <span>from $500</span></h5>
                </div>
            </div>
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('{{ asset('images/assets/dark-adv-bg.png') }}');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-2.svg') }}" alt="icon">
                    <h5>Warranty service <span>for 3 months</span></h5>
                </div>
            </div>
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('{{ asset('images/assets/dark-adv-bg.png') }}');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-3.svg') }}" alt="icon">
                    <h5>Discounts for <span>customers</span></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- S-OUR-ADVANTAGES END -->

<!-- S-PRODUCTS -->
<section class="s-products s-dark-product">
    <div class="container">
        <div class="tab-wrap">
            <div class="products-title-cover">
                <h2 class="title">our products</h2>
                <ul class="tab-nav product-tabs">
                    <li class="item" rel="tab1"><span>All</span></li>
                    <li class="item" rel="tab2"><span>Road bike</span></li>
                    <li class="item" rel="tab3"><span>City bike</span></li>
                    <li class="item" rel="tab4"><span>BMX bike</span></li>
                </ul>
            </div>
            <div class="tabs-content">
                <div class="tab tab1">
                    <div class="row product-cover">
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="top-sale">top sale</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-1.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-2.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-3.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="sale">11%</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-4.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-5.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-6.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-7.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-8.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab2">
                    <div class="row product-cover">
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-5.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-6.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-7.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-8.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="top-sale">top sale</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-1.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-2.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-3.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="sale">11%</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-4.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab3">
                    <div class="row product-cover">
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="top-sale">top sale</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-1.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-2.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-3.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="sale">11%</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-4.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-5.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-6.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-7.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-8.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab4">
                    <div class="row product-cover">
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-5.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-6.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-7.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-8.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="top-sale">top sale</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-1.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-2.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-3.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.499</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="product-item product-item-dark">
                                <span class="sale">11%</span>
                                <ul class="product-icon-top">
                                    <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                </ul>
                                <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-4.jpg') }}" alt="product"></a>
                                <div class="product-item-content">
                                    <div class="product-item-cover">
                                        <div class="price-cover">
                                            <div class="new-price">$1.699</div>
                                            <div class="old-price">$1.799</div>
                                        </div>
                                        <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                                        <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                                    </div>
                                    <div class="prod-info">
                                        <ul class="prod-list">
                                            <li>Frame Size: <span>17</span></li>
                                            <li>Class: <span>City</span></li>
                                            <li>Number of speeds: <span>7</span></li>
                                            <li>Type: <span>Rigid</span></li>
                                            <li>Country registration: <span>USA</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="prod-btn-cover"><a href="shop.html" class="btn btn-green"><span>view more</span></a></div>
    </div>
</section>
<!--= S-PRODUCTS END =-->

<!-- S-SUBSCRIBE -->
<section class="s-subscribe s-dark-subscribe" style="background-image: url('{{ asset('images/assets/bg-dark-subscribe.jpg') }}');">
    <span class="mask"></span>
    <span class="subscribe-effect" style="background-image: url('{{ asset('images/assets/effect-subscribe-img.svg') }}');"></span>
    <div class="container">
        <div class="subscribe-left">
            <h2 class="title"><span>Subscribe</span></h2>
            <p>Subscribe us and you won't miss the new arrivals, as well as discounts and sales.</p>
            <form class="subscribe-form">
                <i class="fa fa-at" aria-hidden="true"></i>
                <input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
                <button type="submit" class="btn btn-form btn-green"><span>send</span></button>
            </form>
        </div>
        <img class="wow fadeInRightBlur rx-lazy" data-wow-duration=".8s" data-wow-delay=".2s" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/subscribe-img.png') }}" alt="img">
    </div>
</section>
<!--= S-SUBSCRIBE END =-->

<!-- S-TOP-SALE -->
<section class="s-top-sale">
    <div class="container">
        <h2 class="title">Top sale</h2>
        <div class="row product-cover">
            <div class="col-sm-6 col-lg-3">
                <div class="product-item product-item-dark">
                    <ul class="product-icon-top">
                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    </ul>
                    <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-1.jpg') }}" alt="product"></a>
                    <div class="product-item-content">
                        <div class="product-item-cover">
                            <div class="price-cover">
                                <div class="new-price">$1.499</div>
                                <div class="old-price">$1.799</div>
                            </div>
                            <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                            <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                        </div>
                        <div class="prod-info">
                            <ul class="prod-list">
                                <li>Frame Size: <span>17</span></li>
                                <li>Class: <span>City</span></li>
                                <li>Number of speeds: <span>7</span></li>
                                <li>Type: <span>Rigid</span></li>
                                <li>Country registration: <span>USA</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item product-item-dark">
                    <ul class="product-icon-top">
                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    </ul>
                    <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-2.jpg') }}" alt="product"></a>
                    <div class="product-item-content">
                        <div class="product-item-cover">
                            <div class="price-cover">
                                <div class="new-price">$1.499</div>
                                <div class="old-price">$1.799</div>
                            </div>
                            <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                            <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                        </div>
                        <div class="prod-info">
                            <ul class="prod-list">
                                <li>Frame Size: <span>17</span></li>
                                <li>Class: <span>City</span></li>
                                <li>Number of speeds: <span>7</span></li>
                                <li>Type: <span>Rigid</span></li>
                                <li>Country registration: <span>USA</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item product-item-dark">
                    <ul class="product-icon-top">
                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    </ul>
                    <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-3.jpg') }}" alt="product"></a>
                    <div class="product-item-content">
                        <div class="product-item-cover">
                            <div class="price-cover">
                                <div class="new-price">$1.499</div>
                                <div class="old-price">$1.799</div>
                            </div>
                            <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                            <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                        </div>
                        <div class="prod-info">
                            <ul class="prod-list">
                                <li>Frame Size: <span>17</span></li>
                                <li>Class: <span>City</span></li>
                                <li>Number of speeds: <span>7</span></li>
                                <li>Type: <span>Rigid</span></li>
                                <li>Country registration: <span>USA</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="product-item product-item-dark">
                    <ul class="product-icon-top">
                        <li><a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
                    </ul>
                    <a href="single-shop.html" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-prod-4.jpg') }}" alt="product"></a>
                    <div class="product-item-content">
                        <div class="product-item-cover">
                            <div class="price-cover">
                                <div class="new-price">$1.499</div>
                                <div class="old-price">$1.799</div>
                            </div>
                            <h6 class="prod-title"><a href="single-shop.html">Granite Peak 24" <br>Girls Mountain Bike</a></h6>
                            <a href="single-shop.html" class="btn btn-green"><span>¡Comprar ahora!</span></a>
                        </div>
                        <div class="prod-info">
                            <ul class="prod-list">
                                <li>Frame Size: <span>17</span></li>
                                <li>Class: <span>City</span></li>
                                <li>Number of speeds: <span>7</span></li>
                                <li>Type: <span>Rigid</span></li>
                                <li>Country registration: <span>USA</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--= S-TOP-SALE END =-->

<!-- S-FEEDBACK -->
<section class="s-feedback s-dark-feedback" style="background-image: url('{{ asset('images/assets/bg-dark-feedback.jpg') }}');">
    <span class="effwct-bg-feedback" style="background-image: url('{{ asset('images/assets/dark-effect-img.svg') }}');"></span>
    <span class="mask" style="background-image: url('{{ asset('images/assets/dark-effect-bg.png') }}');"></span>
    <div class="container">
        <h2 class="title">feedback</h2>
        <div class="feedback-slider">
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="{{ asset('images/assets/feedback-photo-1.png') }}" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><span>Li piters</span></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="{{ asset('images/assets/feedback-photo-2.png') }}" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><span>Sam Barton</span></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="{{ asset('images/assets/feedback-photo-3.png') }}" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><span>Zoe Tyler</span></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempoinc ididunt ut magna aliqua dolor sit amet, consectetur adipiscing elit magna”</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="{{ asset('images/assets/feedback-photo-2.png') }}" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><span>Sam Barton</span></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-not-bg"><i class="fa fa-star-o" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--= S-FEEDBACK END =-->

<!-- S-OUR-NEWS -->
<section class="s-our-news dark-our-news">
    <div class="container">
        <h2 class="title">Our News</h2>
        <div class="news-cover row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="news-item">
                    <h5 class="title"><a href="news.html">doloremque laudantium, totam rem aperiam, eaque ipsa quae</a></h5>
                    <div class="news-post-thumbnail">
                        <a href="news.html"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/news-1.jpg') }}" alt="news"></a>
                    </div>
                    <div class="meta">
                        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
                        <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
                    </div>
                    <div class="post-content">
                        <p>Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque lauda ntium, totam rem aperiam, eaque.</p>
                    </div>
                    <a href="news.html" class="btn-news">read more</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="news-item">
                    <h5 class="title"><a href="news.html">At vero eos et accusamus et iusto odio dignissimos ducim</a></h5>
                    <div class="news-post-thumbnail">
                        <a href="single-news.html"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/news-2.jpg') }}" alt="news"></a>
                    </div>
                    <div class="meta">
                        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
                        <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
                    </div>
                    <div class="post-content">
                        <p>Corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui.</p>
                    </div>
                    <a href="single-news.html" class="btn-news">read more</a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="news-item">
                    <h5 class="title"><a href="news.html">On the other hand, we denounce with righteous indignation a</a></h5>
                    <div class="news-post-thumbnail">
                        <a href="news.html"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/news-3.jpg') }}" alt="news"></a>
                    </div>
                    <div class="meta">
                        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> Dec 26,2019</span>
                        <span class="post-by"><i class="fa fa-user" aria-hidden="true"></i> By <a href="#">Samson</a></span>
                    </div>
                    <div class="post-content">
                        <p>Blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those.</p>
                    </div>
                    <a href="single-news.html" class="btn-news">read more</a>
                </div>
            </div>
        </div>
        <div class="btn-cover"><a class="btn btn-green" href="news.html"><span>view more</span></a></div>
    </div>
</section>
<!--= S-OUR-NEWS END =-->

<!--= S-CLIENTS =-->
<section class="s-clients s-dark-clients">
    <div class="container">
        <div class="clients-cover">
            <div class="client-slide">
                <div class="client-slide-cover">
                    <img src="{{ asset('images/assets/client-1.svg') }}" alt="img">
                </div>
            </div>
            <div class="client-slide">
                <div class="client-slide-cover">
                    <img src="{{ asset('images/assets/client-2.svg') }}" alt="img">
                </div>
            </div>
            <div class="client-slide">
                <div class="client-slide-cover">
                    <img src="{{ asset('images/assets/client-4.svg') }}" alt="img">
                </div>
            </div>
            <div class="client-slide">
                <div class="client-slide-cover">
                    <img src="{{ asset('images/assets/client-5.svg') }}" alt="img">
                </div>
            </div>
            <div class="client-slide">
                <div class="client-slide-cover">
                    <img src="{{ asset('images/assets/client-6.svg') }}" alt="img">
                </div>
            </div>
        </div>
    </div>
</section>
<!--== S-CLIENTS END ==-->

<!--= S-BANNER =-->
<section class="s-banner s-dark-banner" style="background-image: url('{{ asset('images/assets/dark-bg-banner.jpg') }}');">
    <span class="mask" style="background-image: url('{{ asset('images/assets/effect-bg-banner.png') }}');"></span>
    <div class="banner-img">
        <div class="banner-img-bg" style="background-image: url('{{ asset('images/assets/dark-effect-banner.svg') }}');"></div>
        <img class="wow fadeInLeftBlur rx-lazy" data-wow-duration=".8s" data-wow-delay=".2s" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-bike-banner.png') }}" alt="img">
    </div>
    <div class="container">
        <h2 class="title">Hyper E-Ride Bike 700C</h2>
        <p class="slogan">Maecenas consequat ex id lobortis venenatis. Mauris id erat enim. Morbi dolor dolor, auctor tincidunt lorem.</p>
        <div class="banner-price">
            <div class="new-price">$1.699</div>
            <div class="old-price">$1.799</div>
        </div>
        <div id="clockdiv">
            <div>
                <span class="days"></span>
                <div class="smalltext">Days</div>
            </div>
            <div>
                <span class="hours"></span>
                <div class="smalltext">Hours</div>
            </div>
            <div>
                <span class="minutes"></span>
                <div class="smalltext">Minutes</div>
            </div>
            <div>
                <span class="seconds"></span>
                <div class="smalltext">Seconds</div>
            </div>
        </div>
    </div>
</section>
<!--== S-BANNER END ==-->

<!-- S-INSTAGRAM -->
<section class="s-instagram s-dark-instagram">
    <div class="instagram-cover">
        <a href="#" class="instagram-item">
            <ul>
                <li class="comments">234 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
                <li class="like">134 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
            </ul>
            <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-instagram-1.jpg') }}" alt="img">
        </a>
        <a href="#" class="instagram-item">
            <ul>
                <li class="comments">222 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
                <li class="like">118 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
            </ul>
            <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-instagram-2.jpg') }}" alt="img">
        </a>
        <a href="#" class="instagram-item">
            <ul>
                <li class="comments">224 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
                <li class="like">124 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
            </ul>
            <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-instagram-3.jpg') }}" alt="img">
        </a>
        <a href="#" class="instagram-item">
            <ul>
                <li class="comments">155 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
                <li class="like">107 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
            </ul>
            <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-instagram-4.jpg') }}" alt="img">
        </a>
        <a href="#" class="instagram-item">
            <ul>
                <li class="comments">350 <i class="fa fa-comment-o" aria-hidden="true"></i></li>
                <li class="like">140 <i class="fa fa-heart-o" aria-hidden="true"></i></li>
            </ul>
            <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ asset('images/assets/dark-instagram-5.jpg') }}" alt="img">
        </a>
    </div>
</section>
<!--= S-INSTAGRAM END =-->

@endsection