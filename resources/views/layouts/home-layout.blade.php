<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Agregar SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Agregar Estilo CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.min.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/animate.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/style.css')  }}">
</head>
<body id="home" class="home-dark">
    <!--= Preloader =-->
	<div class="preloader-cover">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- Preloader end -->
	<!-- Header -->
	<header class="header header-dark">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<div class="top-panel">
			<div class="container">
				<div class="top-panel-cover">
					<div class="top-panel-left">
						<ul class="header-cont">
							<li><a href="tel:+912345687"><i class="fa fa-phone"></i>{{ config('app.business.phone') }}</a></li>
							<li><a href="mailto:{{ config('app.business.email') }}"><i class="fa fa-envelope" aria-hidden="true"></i>{{ config('app.business.email') }}</a></li>
						</ul>
					</div>
					<div class="top-panel-center">
						<a href="{{ url('/inicio') }}" class="logo"><img src="{{ asset('images/logo-4-canvolt.png') }}" alt="logo"></a>
					</div>
					<div class="top-panel-right">
                        <ul class="icon-right-list">
                            <!-- Si no hay una sesión iniciada -->
                            @guest
                                <li><a class="header-user" href="{{ url('/iniciar-sesion') }}">Iniciar sesión <i class="fa fa-user" aria-hidden="true"></i></a></li>
                            @endguest

                            <!-- Si hay sesión iniciada -->
                            @auth
                                <ul class="nav-list">
                                    <li class="dropdown">
                                        <a href="#">{{ Auth::user()->name }} <i class="fa fa-user" aria-hidden="true"></i></a>
                                        <ul>
                                            <li><a href="{{ url('/mi-perfil') }}">Mi perfil</a></li>
                                            <li><a href="{{ url('/opciones') }}">Ajustes</a></li>
                                            <li><hr></li>
                                            <li><a href="{{ route('auth.logout') }}">Cerrar sesión</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            @endauth
                            <li><a class="header-cart" href="{{ url('/mi-carrito') }}">0 <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<nav class="nav-menu">
					<ul class="nav-list">
						<li><a href="url('/inicio')">Inicio</a></li>
						<li><a href="url('/')">Servicios</a></li>
						<li><a href="url('/')">Scooter</a></li>
						<li><a href="url('/')">Piezas</a></li>
						<li class="dropdown">
							<a href="#">Contacto <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="url('/')">Donde encontrarnos</a></li>
								<li><a href="url('/')">Mandanos un mensaje</a></li>
								<li><a href="url('/')">Ultimas novedades</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- Header end -->

    <!-- Content Section -->
    @yield('content')
    <!-- Content Section end -->

    <!-- Footer -->
	<footer class="footer-dark">
		<div class="container">
			<div class="row footer-item-cover">
				<div class="footer-subscribe col-md-7 col-lg-8">
					<h6>subscribe</h6>
					<p>Subscribe us and you won't miss the new arrivals, as well as discounts and sales.</p>
					<form class="subscribe-form">
						<i class="fa fa-at" aria-hidden="true"></i>
						<input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
						<button type="submit" class="btn btn-form btn-green"><span>send</span></button>
					</form>
				</div>
				<div class="footer-item col-md-5 col-lg-4">
					<h6>info</h6>
					<ul class="footer-list">
						<li><a href="shop.html">FAQ</a></li>
						<li><a href="shop.html">Contacts</a></li>
						<li><a href="shop.html">Shipping + Heading</a></li>
						<li><a href="shop.html">Exchanges</a></li>
						<li><a href="shop.html">2019 Catalog</a></li>
						<li><a href="shop.html">Returns</a></li>
						<li><a href="shop.html">Search</a></li>
					</ul>
				</div>
			</div>
			<div class="row footer-item-cover">
				<div class="footer-touch col-md-7 col-lg-8">
					<h6>stay in touch</h6>
					<ul class="footer-soc social-list">
						<li><a target="_blank" href="https://www.facebook.com/rovadex"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://twitter.com/RovadexStudio"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.instagram.com/rovadex"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a target="_blank" href="https://www.youtube.com/"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					</ul>
					<div class="footer-autor">Questions? Please write us at: <a href="mailto:rovadex@gmail.com">rovadex@gmail.com</a></div>
				</div>
				<div class="footer-item col-md-5 col-lg-4">
					<h6>shop</h6>
					<ul class="footer-list">
						<li><a href="shop.html">Road Bike</a></li>
						<li><a href="shop.html">City Bike</a></li>
						<li><a href="shop.html">Mountain Bike</a></li>
						<li><a href="shop.html">Kids Bike</a></li>
						<li><a href="shop.html">BMX Bike</a></li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-copyright"><a target="_blank" href="https://rovadex.com/">Rovadex</a> © 2019. All Rights Reserved.</div>
				<ul class="footer-pay">
					<li><a href="#"><img src="{{ asset('images/assets/footer-pay-1.png') }}" alt="img"></a></li>
					<li><a href="#"><img src="{{ asset('images/assets/footer-pay-2.png') }}" alt="img"></a></li>
					<li><a href="#"><img src="{{ asset('images/assets/footer-pay-3.png') }}" alt="img"></a></li>
					<li><a href="#"><img src="{{ asset('images/assets/footer-pay-4.png') }}" alt="img"></a></li>
				</ul>
			</div>
		</div>
	</footer>
	<!-- Footer end -->

    <!-- Agregar Scripts JS -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/jquery.nice-select.js') }}"></script>
	<script src="{{ asset('js/wow.js') }}"></script>
	<script src="{{ asset('js/rx-lazy.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>

    <!-- Agregar JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>