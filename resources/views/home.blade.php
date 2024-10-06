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
        @foreach($products as $product)
            <div class="dark-slide" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/bg-slider-2.png');">
                <span class="bg-text-left">{{ $product->brand }}</span>
                <span class="bg-text-right">Scooter</span>
                <span class="effect-bg-dark" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/effect-dark-slider.svg');"></span>
                <div class="container">
                    <div class="dark-slide-info">
                        <h2 class="name">{{ $product->name }}</h2>
                        <div class="model">{{ $product->description_min }}</div>
                        @if ($product->discount > 0)
                            <div class="old-price">{{ price_formatted($product->price) }}</div>
                            <div class="price mt-0">{{ discounted_price($product->price, $product->discount) }}</div>
                        @else
                            <div class="price">{{ price_formatted($product->price) }}</div>
                        @endif
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <div class="dark-slide-info-buttons">
                                <button onclick="location.href = `{{ url('/productos/todos/'.$product->brand.' '.$product->name) }}`"
                                        type="button" class="btn btn-orange"><span>Ver detalles</span></button>
                                <button type="submit" class="btn btn-green"><span>¡Añadir al carro!</span></button>
                            </div>
                        </form>
                    </div>
                    <!-- <img class="dark-slide-img" src="{{ asset('storage/'.$product->photo_main) }}" alt="{{ $product->brand }} {{ $product->name }}"> -->
                    <img class="dark-slide-img" src="{{ config('app.canvolt_admin.url') . '/storage/' . $product->photo_main }}" alt="{{ $product->brand }} {{ $product->name }}">
                </div>
            </div>
        @endforeach  
    </div>
    <div class="dark-slide-navigation"></div>
</section>
<!-- main-slider end -->

<!-- S-DARK-CATEGORY -->
<section class="s-dark-category">
    <div class="container">
        <div class="dark-category-cover row">
            <div class="dark-category-left col-md-8">
                <a href="{{ url('/productos/todos/'.$cheapest->brand.' '.$cheapest->name) }}" class="dark-category-item dark-category-big" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-categ-1.png');">
                    <div class="dark-categ-info">
                        <div class="name">encuentra tu scooter</div>
                        <h3 class="title">{{ $cheapest->brand }} {{ $cheapest->name }}</h3>
                        <div class="price">
                        @if ($cheapest->discount > 0)
                            <div class="new-price">{{ discounted_price($cheapest->price, $cheapest->discount) }}</div>
                            <div class="old-price">{{ price_formatted($cheapest->price) }}</div>
                        @else
                            <div class="new-price">{{ price_formatted($cheapest->price) }}</div>
                        @endif
                        </div>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $cheapest->photo_main }}" alt="{{ $cheapest->brand }} {{ $cheapest->name }}">
                </a>
                <a href="{{ url('/productos/piezas') }}" class="dark-category-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-categ-2.png');">
                    <div class="dark-categ-info">
                        <div class="name">encuentra la pieza que necesitas</div>
                        <h3 class="title">piezas</h3>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $part->photo_main }}" alt="{{ $part->brand }} {{ $part->name }}">
                </a>
                <a href="{{ url('/productos/accesorios') }}" class="dark-category-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-categ-2.png');">
                    <div class="dark-categ-info">
                        <div class="name">todos los accesorios para scooter</div>
                        <h3 class="title">accesorios</h3>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $accessory->photo_main }}" alt="{{ $accessory->brand }} {{ $accessory->name }}">
                </a>
            </div>
            <div class="dark-category-right col-md-4">
                <a href="{{ url('/productos/scooters') }}" class="dark-category-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-categ-3.png');">
                    <div class="dark-categ-info">
                        <h3 class="title">Todos nuestros scooters</h3>
                        <p>¡Encuentra lo que estás buscando ahora!</p>
                    </div>
                    <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $general->photo_main }}" alt="{{ $general->brand }} {{ $general->name }}">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- S-DARK-CATEGORY END -->

<!-- S-OUR-ADVANTAGES -->
<section class="s-dark-advantages">
    <div class="container">
        <h2 class="title">nuestro servicios</h2>
        <div class="dark-advantage-wrap row">
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-adv-bg.png');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-1.svg') }}" class="service-icon" alt="icon">
                    <h5>Diagnostico de Scooter <span>por $350.00 MXN</span></h5>
                </div>
            </div>
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-adv-bg.png');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-2.svg') }}" class="service-icon" alt="icon">
                    <h5>Cambio de ruedas <span>de cualquier medida</span></h5>
                </div>
            </div>
            <div class="col-sm-4 dark-advantage-col">
                <div class="dark-advantage-item" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-adv-bg.png');">
                    <span class="mask"></span>
                    <img src="{{ asset('images/assets/advantages-dark-3.svg') }}" class="service-icon" alt="icon">
                    <h5>Servicios generales<span>Frenos, suspenciones, etc</span></h5>
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
                <h2 class="title">Nuestros productos</h2>
                <ul class="tab-nav product-tabs">
                    <li class="item" rel="tab1"><span>Todo</span></li>
                    <li class="item" rel="tab2"><span>Scooters</span></li>
                    <li class="item" rel="tab3"><span>Piezas</span></li>
                    <li class="item" rel="tab4"><span>Accesorios</span></li>
                </ul>
            </div>
            <div class="tabs-content">
                <div class="tab tab1">
                    <div class="row product-cover">
                        @foreach($all_products as $product)
                            <div class="col-sm-6 col-lg-3">
                                <div class="product-item product-item-dark">
                                    @if ($product->discount > 0)
                                        <span class="sale">-{{ $product->discount }}%</span>
                                    @endif
                                    <a href="{{ url('/productos/todos/'.$product->brand.' '.$product->name) }}" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $product->photo_main }}" alt="{{ $product->brand }} {{ $product->name }}"></a>
                                    <div class="product-item-content">
                                        <div class="product-item-cover">
                                            <div class="price-cover">
                                                @if ($product->discount > 0)
                                                    <div class="new-price">{{ discounted_price($product->price, $product->discount) }}</div>
                                                    <div class="old-price">{{ price_formatted($product->price) }}</div>
                                                @else
                                                    <div class="new-price">{{ price_formatted($product->price) }}</div>
                                                @endif
                                            </div>
                                            <h6 class="prod-title"><a href="{{ url('/productos/todos/'.$product->brand.' '.$product->name) }}">{{ is_valid_brand($product->brand) }} <br>{{ $product->name }}</a></h6>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-green"><span>¡Añadir al carro!</span></button>
                                            </form>
                                        </div>
                                        <div class="prod-info">
                                            <ul class="prod-list">
                                                <li>Descripción: <span>{{ $product->description_min }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab tab2">
                    <div class="row product-cover">
                        @foreach($all_scooters as $scooter)
                            <div class="col-sm-6 col-lg-3">
                                <div class="product-item product-item-dark">
                                    @if ($scooter->discount > 0)
                                        <span class="sale">-{{ $scooter->discount }}%</span>
                                    @endif
                                    <a href="{{ url('/productos/scooters/'.$scooter->brand.' '.$scooter->name) }}" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $scooter->photo_main }}" alt="{{ $scooter->brand }} {{ $scooter->name }}"></a>
                                    <div class="product-item-content">
                                        <div class="product-item-cover">
                                            <div class="price-cover">
                                                @if ($scooter->discount > 0)
                                                    <div class="new-price">{{ discounted_price($scooter->price, $scooter->discount) }}</div>
                                                    <div class="old-price">{{ price_formatted($scooter->price) }}</div>
                                                @else
                                                    <div class="new-price">{{ price_formatted($scooter->price) }}</div>
                                                @endif
                                            </div>
                                            <h6 class="prod-title"><a href="{{ url('/productos/scooters/'.$scooter->brand.' '.$scooter->name) }}">{{ $scooter->brand }} <br>{{ $scooter->name }}</a></h6>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $scooter->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-green"><span>¡Añadir al carro!</span></button>
                                            </form>
                                        </div>
                                        <div class="prod-info">
                                            <ul class="prod-list">
                                                <li>Descripción: <span>{{ $scooter->description_min }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab tab3">
                    <div class="row product-cover">
                        @foreach($all_parts as $part)
                            <div class="col-sm-6 col-lg-3">
                                <div class="product-item product-item-dark">
                                    @if ($part->discount > 0)
                                        <span class="sale">-{{ $part->discount }}%</span>
                                    @endif
                                    <a href="{{ url('/productos/piezas/'.$part->brand.' '.$part->name) }}" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $part->photo_main }}" alt="{{ $part->brand }} {{ $part->name }}"></a>
                                    <div class="product-item-content">
                                        <div class="product-item-cover">
                                            <div class="price-cover">
                                                @if ($part->discount > 0)
                                                    <div class="new-price">{{ discounted_price($part->price, $part->discount) }}</div>
                                                    <div class="old-price">{{ price_formatted($part->price) }}</div>
                                                @else
                                                    <div class="new-price">{{ price_formatted($part->price) }}</div>
                                                @endif
                                            </div>
                                            <h6 class="prod-title"><a href="{{ url('/productos/piezas/'.$part->brand.' '.$part->name) }}">{{ $part->brand }} <br>{{ $part->name }}</a></h6>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $part->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-green"><span>¡Añadir al carro!</span></button>
                                            </form>
                                        </div>
                                        <div class="prod-info">
                                            <ul class="prod-list">
                                                <li>Descripción: <span>{{ $part->description_min }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab tab4">
                    <div class="row product-cover">
                        @foreach($all_accessories as $accessory)
                            <div class="col-sm-6 col-lg-3">
                                <div class="product-item product-item-dark">
                                    @if ($accessory->discount > 0)
                                        <span class="sale">-{{ $accessory->discount }}%</span>
                                    @endif
                                    <a href="{{ url('/productos/accesorios/'.$accessory->brand.' '.$accessory->name) }}" class="product-img"><img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $accessory->photo_main }}" alt="{{ $accessory->brand }} {{ $accessory->name }}"></a>
                                    <div class="product-item-content">
                                        <div class="product-item-cover">
                                            <div class="price-cover">
                                                @if ($accessory->discount > 0)
                                                    <div class="new-price">{{ discounted_price($accessory->price, $accessory->discount) }}</div>
                                                    <div class="old-price">{{ price_formatted($accessory->price) }}</div>
                                                @else
                                                    <div class="new-price">{{ price_formatted($accessory->price) }}</div>
                                                @endif
                                            </div>
                                            <h6 class="prod-title"><a href="{{ url('/productos/accesorios/'.$accessory->brand.' '.$accessory->name) }}">{{ $accessory->brand }} <br>{{ $accessory->name }}</a></h6>
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $accessory->id }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-green"><span>¡Añadir al carro!</span></button>
                                            </form>
                                        </div>
                                        <div class="prod-info">
                                            <ul class="prod-list">
                                                <li>Descripción: <span>{{ $accessory->description_min }}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="prod-btn-cover"><a href="{{ url('/productos/todos') }}" class="btn btn-green"><span>Ver más</span></a></div>
    </div>
</section>
<!--= S-PRODUCTS END =-->

{{--
<!-- S-TOP-SALE --
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
                            <a href="single-shop.html" class="btn btn-green"><span>¡Añadir al carro!</span></a>
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
                            <a href="single-shop.html" class="btn btn-green"><span>¡Añadir al carro!</span></a>
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
                            <a href="single-shop.html" class="btn btn-green"><span>¡Añadir al carro!</span></a>
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
                            <a href="single-shop.html" class="btn btn-green"><span>¡Añadir al carro!</span></a>
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
!--= S-TOP-SALE END =-->
--}}

<!-- S-FEEDBACK -->
<section class="s-feedback s-dark-feedback" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/bg-dark-feedback.jpg');">
    <span class="effwct-bg-feedback" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-effect-img.svg');"></span>
    <span class="mask" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-effect-bg.png');"></span>
    <div class="container">
        <h2 class="title">Comentarios</h2>
        <div class="feedback-slider">
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>Excelente servicio por parte de Marco y todo su equipo, llevé mi patín a hacer cambio de llantas y lo dejaron al 100 !! Y el trato hacia uno como cliente es excelente !!! Te ayudan con buena info y te brindan opciones para ponerle lo mejor conforme a tu patín !!! A confianza con ojos vendados !!!!</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjUjBPWyh-JSWrek9YoSRHhzgiclvxYTLGds51wiXqQU3ELbwSrJ=w36-h36-p-rp-mo-br100" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><a href="https://www.google.com/maps/contrib/111562888027643301103/place/ChIJS9a9mkOvKIQRi_FlPuQXagU/@20.723508,-103.3904721,16z/data=!4m6!1m5!8m4!1e2!2s111562888027643301103!3m1!1e1?hl=es-419&entry=ttu" target="_blank"><span>Jorge Sotomayor Rivera</span></a></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>Servicio y explicación al 💯, buena opción para traer tu equipo móvil a mantenimiento. Su horario de cierre a las 8:30pm 👍</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjUhB5bQO2Jzz0pzZ87mpeeUaPPEtEh-XpnHxK_-QT-b2f1ufMhlGg=w36-h36-p-rp-mo-ba4-br100" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><a href="https://www.google.com/maps/contrib/113141489145157800996/place/ChIJS9a9mkOvKIQRi_FlPuQXagU/@20.7213969,-103.3910422,15z/data=!4m6!1m5!8m4!1e2!2s113141489145157800996!3m1!1e1?hl=es-419&entry=ttu" target="_blank"><span>Israel Martinez Franco</span></a></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>Excelente servicio! La atención es super profesional desde que llegas al lugar. Acudí para reparar mi scooter el cual tuvo una avería en temporal de lluvias, fueron los únicos en Guadalajara que me pudieron solucionar el problema técnico y dejarlo al 100% apesar de que no es un scooter de la marca que promocionan y venden en el lugar.</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjV-djZyqlcPDTHsMcCKVJDJa5sFY4fbVFf1-eqPQq88ReofXeiO0Q=w60-h60-p-rp-mo-ba5-br100" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><a href="https://www.google.com/maps/contrib/103782277012658804659/place/ChIJS9a9mkOvKIQRi_FlPuQXagU/@20.7254937,-103.3904092,16z/data=!4m6!1m5!8m4!1e2!2s103782277012658804659!3m1!1e1?hl=es-419&entry=ttu" target="_blank"><span>Guillermo Amezcua</span></a></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feedback-slide">
                <div class="feedback-item">
                    <div class="feedback-content">
                        <p>Fue una excelente experiencia, llevamos el patin ponchado y con algunos detalles considerables a reparar. Tanto la atención como el servicio son de alta calidad y lo mejor de todo es que fue muy rápido! Para quienes somos usuarios de patines eléctricos y queremos un buen trato para nuestro medio de transporte, este es el mejor lugar de la ciudad. Súper recomendado!</p>
                    </div>
                    <div class="feedback-item-top">
                        <img src="https://lh3.googleusercontent.com/a-/ALV-UjWhYmqR_Aino63dx2-OClMZwQQ9meF4b5Yp1zdUThydVSNipRP-yw=w60-h60-p-rp-mo-br100" alt="photo">
                        <div class="feedback-title">
                            <h5 class="title"><a href="https://www.google.com/maps/contrib/105618382364723308993/place/ChIJS9a9mkOvKIQRi_FlPuQXagU/@20.7253369,-103.3934892,15.79z/data=!4m6!1m5!8m4!1e1!2s105618382364723308993!3m1!1e1?hl=es-419&entry=ttu" target="_blank"><span>Sr. Quetzatl Torres</span></a></h5>
                            <ul class="rating">
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li class="star-bg"><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--= S-FEEDBACK END =-->

{{--
<!-- S-OUR-NEWS --
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
!--= S-OUR-NEWS END =-->
--}}

<!--= S-CLIENTS =-->
<section class="s-clients s-dark-clients pt-5">
    <div class="container">
        <h2 class="title pt-5 pb-5">Somos distribuidores autorizados de</h2>
        <div class="clients-cover pt-5">
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
                    <img src="{{ asset('images/assets/client-3.svg') }}" alt="img">
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
        </div>
    </div>
</section>
<!--== S-CLIENTS END ==-->

<!--= S-BANNER =-->
<section class="s-banner s-dark-banner" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-bg-banner.jpg');">
    <span class="mask" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/effect-bg-banner.png');"></span>
    <div class="banner-img">
        <div class="banner-img-bg" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/dark-effect-banner.svg');"></div>
        <img class="wow fadeInLeftBlur rx-lazy" data-wow-duration=".8s" data-wow-delay=".2s" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $cheapest->photo_main }}" alt="{{ $product->brand }} {{ $product->name }}">
    </div>
    <div class="container">
        <h2 class="title">{{ $cheapest->brand }} {{ $cheapest->name }}</h2>
        <p class="slogan">{{ $cheapest->description_min }}</p>
        <div class="banner-price">
            <div class="new-price">{{ $cheapest->formatted_price }}</div>
            <div class="old-price">$17,699.00 MXN</div>
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
        @foreach($latest_photos as $photo)
            <a href="#" class="instagram-item">
                <ul>
                    <li class="comments">{{ $photo['title'] }}</li>
                </ul>
                <img class="rx-lazy" src="{{ asset('images/assets/placeholder-all.png') }}" data-src="{{ config('app.canvolt_admin.url') . '/storage/' . $photo['photo'] }}" alt="img">
            </a>
        @endforeach
    </div>
</section>
<!--= S-INSTAGRAM END =-->

@endsection