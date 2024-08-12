<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- Agregar SweetAlert2 CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<!-- SDK MercadoPago.js -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <!-- Agregar Estilo CSS -->
    <link rel="stylesheet" href="{{ asset('css/slick.min.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/nice-select.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('css/animate.css')  }}">
	<link rel="stylesheet" href="{{ asset('css/style.css')  }}">

	@if (Request::is('productos/*/*') || Request::is('carrito'))
		<!-- =================== STYLE =================== -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')  }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css')  }}">
	@endif

    <!-- Agregar Scripts JS -->
    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('js/nav-bar.js') }}"></script>
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
	<header class="header header-dark" id="nav-bar">
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
                            <li><a class="header-cart" href="{{ url('/carrito') }}">{{ $cartCount }} <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<nav class="nav-menu">
					<ul class="nav-list">
						<li><a href="{{ url('/inicio') }}">Inicio</a></li>
						<li><a href="{{ url('/') }}">Servicios</a></li>
						<li class="dropdown">
							<a href="#">Productos <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="{{ url('/productos/todos') }}">Todo</a></li>
								<li><a href="{{ url('/productos/scooters') }}">Scooters</a></li>
								<li><a href="{{ url('/productos/piezas') }}">Piezas</a></li>
								<li><a href="{{ url('/productos/accesorios') }}">Accesorios</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/') }}">Sucursales</a></li>
						<li class="dropdown">
							<a href="#">Contacto <i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul>
								<li><a href="{{ url('/') }}">Donde encontrarnos</a></li>
								<li><a href="{{ url('/') }}">Ultimas novedades</a></li>
							</ul>
						</li>
						<li><a href="{{ url('/') }}">Nosotros</a></li>
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
					<h6>Contactanos</h6>
					<p>Envianos un mensaje y cuentanos en que podemos ayudarte.</p>
					<form class="">
						<div class="subscribe-form">
							<i class="fas fa-signature"></i>
							<input class="inp-form" type="text" name="name" placeholder="Escribe tu nombre">
						</div>
						<div class="subscribe-form">
							<i class="fas fa-at"></i>
							<input class="inp-form" type="email" name="email" placeholder="Escribe tu correo electrónico">
						</div>
						<div class="subscribe-form">
							<i class="far fa-envelope" style="margin-top: -57px;"></i>
							<textarea class="inp-form" name="message" placeholder="Escríbenos un mensaje" style="padding-top: 20px; font-size: 18px;"></textarea>
						</div>
						<div class="subscribe-form">
							<button type="submit" class="btn btn-form btn-green" style="margin-left: -1px;"><span>Enviar</span></button>
						</div>
					</form>
				</div>
				<div class="footer-item col-md-5 col-lg-4">
					<h6>Información</h6>
					<ul class="footer-list">
						<li><a href="{{ url('/inicio') }}">Inicio</a></li>
						<li><a href="#">Servicios</a></li>
						<li><a href="{{ url('/productos/todos') }}">Productos</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#">Nosotros</a></li>
					</ul>
					<div class="m-5"></div>
					<h6>Productos</h6>
					<ul class="footer-list">
						<li><a href="{{ url('/productos/scooters') }}">Scooters</a></li>
						<li><a href="{{ url('/productos/piezas') }}">Piezas</a></li>
						<li><a href="{{ url('/productos/accesorios') }}">Accesorios</a></li>
					</ul>
				</div>
			</div>
			<div class="row footer-item-cover">
				<div class="footer-touch col-md-7 col-lg-8">
					<h6>Mantente en contacto con nosotros</h6>
					<ul class="footer-soc social-list">
						<li><a href="{{ config('app.social.facebook') }}" target="_blank"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="{{ config('app.social.instagram') }}" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="{{ config('app.social.tiktok') }}" target="_blank"><i class="fab fa-tiktok" aria-hidden="true"></i></a></li>
					</ul>
					<div class="footer-autor">¿Tienes preguntas? Escribenos a: <a href="mailto:{{ config('app.business.email') }}">{{ config('app.business.email') }}</a></div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-copyright"><a target="_blank" href="">Canvolt Mx</a> © {{ current_year() }}. Todos los derechos reservados.</div>
				<ul class="footer-pay">
					<li><img src="{{ asset('images/assets/footer-mercadopago-1.png') }}" alt="img"></li>
					<li><img src="{{ asset('images/assets/footer-pay-2.png') }}" alt="img"></li>
					<li><img src="{{ asset('images/assets/footer-pay-3.png') }}" alt="img"></li>
				</ul>
			</div>
		</div>
	</footer>
	<!-- Footer end -->

	<!--===================== TO TOP =====================-->
	<a class="to-whatsapp" href="{{ config('app.social.whatsapp') }}" target="_blank">
		<i class="fab fa-whatsapp" aria-hidden="true"></i>
	</a>
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->

	@if (Request::is('productos/*/*') || Request::is('carrito'))
		<!--=================== POPUP VIDEO ===================-->
		<div class="overlay close_vid"></div>
		<div class="popup popup-action1 popup-wideo">
			<div class="popup-close close_vid"></div>
			<div class="popup-video">
				<iframe src="https://www.youtube.com/embed/XHOmBV4js_E?enablejsapi=1&amp;rel=0&amp;showinfo=0;" allowfullscreen  id="video-modal"></iframe>
			</div>
		</div>
		<!--================ POPUP VIDEO END ================-->
		
		<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
	@endif

    <!-- Agregar Scripts JS -->
	<script src="{{ asset('js/slick.min.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.js') }}"></script>
	<script src="{{ asset('js/jquery.nice-select.js') }}"></script>
	<script src="{{ asset('js/wow.js') }}"></script>
	<script src="{{ asset('js/rx-lazy.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>