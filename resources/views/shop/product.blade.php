@extends('layouts.home-layout')

@section('title', is_valid_brand($product->brand).' '.$product->name)

@section('content')

@include('layouts.alerts')

<!-- ============== S-SINGLE-PRODUCT ============== -->
<section class="s-single-product">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <!--===== SLIDER-SINGLE-FOR =====-->
                <div class="slider-single-for">
                    @foreach($photos as $photo)
                        <div class="slide-single-for">
                            <a href="{{ config('app.canvolt_admin.url') . '/storage/' . $photo['photo'] }}" class="single-for-img" data-fancybox="prod1">
                                <img src="{{ config('app.canvolt_admin.url') . '/storage/' . $photo['photo'] }}" alt="img">
                            </a>
                        </div>
                    @endforeach
                </div>
                <!--=== SLIDER-SINGLE-FOR END ===-->
                <!--===== SLIDER-SINGLE-NAV =====-->
                <div class="slider-single-nav">
                    @foreach($photos as $photo)
                        <div class="slide-single-nav">
                            <div class="single-nav-img">
                                <img src="{{ config('app.canvolt_admin.url') . '/storage/' . $photo['photo'] }}" alt="img">
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--=== SLIDER-SINGLE-NAV END ===-->
            </div>
            <div class="col-12 col-md-7 single-shop-left">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <h2 class="title">{{ is_valid_brand($product->brand).' '.$product->name }}</h2>
                    <div class="single-price">
                        @if ($product->discount > 0)
                            <div class="new-price">{{ discounted_price($product->price, $product->discount) }}</div>
                            <div class="old-price">{{ price_formatted($product->price) }}</div>
                        @else
                            <div class="new-price">{{ price_formatted($product->price) }}</div>
                        @endif
                    </div>
                    <div class="single-short-description">
                        <span class="single-name">Descripcion corta:</span>
                        <p>{{ $product->description_min }}</p>
                    </div>
                    <div class="storage-quanity">
                        <span class="single-name">Displonibles: </span>
                        <span class="single-data">{{ $product->stock }}</span>
                    </div>
                    <div class="single-quanity">
                        <span class="single-name"><label>Cantidad:</label></span>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" readonly>
                    </div>
                    <div class="single-btn-cover">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <button type="submit" name="buy" class="btn btn-buy-now white" style="color: white;"><span>¡Comprar ahora!</span></button>
                        <button type="submit" name="add" class="btn btn-wishlist white" style="color: white;"><span>Agregar <i class="fas fa-shopping-cart white"></i></span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ============ S-SINGLE-PRODUCT END ============ -->

<!--=============== SINGLE-SHOP-TABS ===============-->
<section class="single-shop-tabs">
    <div class="container">
        <div class="tab-wrap">
            <ul class="tab-nav product-tabs">
                <li class="item" rel="tab1"><span>Descripción</span></li>
                <li class="item" rel="tab2"><span>Reseñas (2)</span></li>
            </ul>
            <div class="tabs-content">
                <div class="tab tab1">
                    <div class="row">
                        <div class="col-lg-6">
                            <p>{{ $product->description }}</p>
                            <ul class="description-toggle">
                                <li>
                                    <span class="title">Velocidad Máxima <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    <ul class="description-toggle-info">
                                        <li>Sport: <span>25 km/h</span></li>
                                        <li>Eco: <span>15 km/h</span></li>
                                        <li>Peatón: <span>6 km/h</span></li>
                                        <li>Type: <span>Rigid</span></li>
                                        <li>Modos: <span>3</span></li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="title">General <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    <ul class="description-toggle-info">
                                        <li>Batería: <span>36V / 7,8Ah </span></li>
                                        <li>Motor: <span>350w - 30*3mm (imán de acero) IP65 resistente al agua</span></li>
                                        <li>Tiempo de Carga: <span>4-8 h</span></li>
                                        <li>Inclinación máxima: <span>10º</span></li>
                                        <li>Autonomía: <span>25 - 30 km</span></li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="title">Secundario <i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                    <ul class="description-toggle-info">
                                        <li>Luces: <span>LED integradas</span></li>
                                        <li>Neumáticos: <span>10x2 pulgadas (rueda trasera-delantera de aire)</span></li>
                                        <li>Material: <span>Aleación de aluminio de aviación</span></li>
                                        <li>Dimensiones del embalaje: <span>1150mm * 580mm * 153mm</span></li>
                                        <li>Suspensión: <span>Sí</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-video">
                                <a href="#" class="popup-open play_video btn-video" rel="action1" style="background-image: url('https://assets.canvolt.com.mx/assets-canvolt/thumbnail-vid.jpg');"><i class="fa fa-play" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab2">
                    <ul class="reviews-list">
                        <li class="item">
                            <div class="review-item">
                                <div class="review-content">
                                    <div class="name">Sam Piters</div>
                                    <div class="date">Agosto 01, 2024</div>
                                    <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis cupiditate vel dicta animi nostrum delectus at doloremque nam eligendi unde! Nulla temporibus ut, libero, architecto tempora impedit ipsa mollitia unde.</p>
                                    <a href="#" class="review-btn"><i class="fa fa-reply" aria-hidden="true"></i> Responder</a>
                                </div>
                            </div>
                            <ul class="child">
                                <li class="item">
                                    <div class="review-item">
                                        <div class="review-content">
                                            <div class="name">Anna Smith</div>
                                            <div class="date">Agosto 02, 2024</div>
                                            <p class="review-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla eligendi a cum corporis, minus reprehenderit quo aut at, quas quisquam?</p>
                                            <a href="#" class="review-btn"><i class="fa fa-reply" aria-hidden="true"></i> Responder</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="reviews-form">
                        <h3 class="title">Deja un comentario</h3>
                        <form action="https://html.rovadex.com/">
                            <ul class="form-cover">
                                <li class="inp-text"><textarea name="your-text" placeholder="Opinion del producto"></textarea></li>
                            </ul>
                            <div class="btn-form-cover">
                                <button type="submit" class="btn"><span style="color: white;">enviar comentario</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--============= SINGLE-SHOP-TABS END =============-->

<script>
    $(document).ready(function() {
        const stock = parseInt('{{ $product->stock }}');
        
        if ($('#quantity')[0]) {
            $("#quantity").spinner({
                max: stock,
                min: 1,
                spin: function(event, ui) {
                    console.log("ui.value: " + ui.value);
                    $('#quantity').val(ui.value);
                }
            });
        }
    });
</script>

@endsection