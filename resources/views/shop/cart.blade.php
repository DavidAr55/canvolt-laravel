@extends('layouts.home-layout')

@section('title', 'Canvolt - Mi carrito')

@section('content')

@include('layouts.alerts')

<div class="container-my-products">
    <h2 class="text-light mb-3">Mi Carrito</h2>
    <table class="table table-dark" style="border: 2px solid #23c050;">
        <thead class="table-bordered">
            <tr>
                <th class="cart-description"><b>Imagen</b></th>
                <th class="cart-product-name"><b>Descripción de producto</b></th>
                <th class="cart-qty"><b>Cantidad</b></th>
                <th class="cart-total last"><b>Precio unitario</b></th>
                <th class="cart-total last"><b>Precio total</b></th>
                <th class="cart-romove"><b>Eliminar</b></th>
            </tr>
        </thead>
        <tbody class="products-resume">
            @foreach($products as $product)
                <tr class="{{ $product->id }}">
                    <td class="cart-image">
                        <a href="{{ url('/productos/todos/'.$product->brand.' '.$product->name) }}" target="_blank" title="{{ $product->name }}" class="entry-thumbnail" href="#">
                            <img alt="{{ $product->name }}" class="img-responsive center-block" style="background-color: white; padding: 15px;" src="{{ config('app.canvolt_admin.url') . '/storage/' . $product->photo_main }}" />
                        </a>
                    </td>
                    <td class="cart-product-name-info">
                        <h4 class="cart-product-description">
                            <a href="{{ url('/productos/todos/'.$product->brand.' '.$product->name) }}" target="_blank" title="{{ $product->name }}" class="cart-product-description" href="#">
                                {{ is_valid_brand($product->brand) }} {{ $product->name }}
                            </a>
                        </h4>
                        <div class="cart-product-info">
                            <span class="product-imel">
                                <span class="product-info">CÓDIGO:</span>
                                <span class="product-desc">{{ $product->code }}</span>
                            </span>
                            <br>
                            <span class="product-color">
                                <span class="product-info">Descripción:</span>
                                <span class="product-desc">{{ $product->description_min }}</span>
                            </span>
                        </div>
                    </td>
                    <td class="cart-product-grand-total">
                        <form action="{{ route('cart.update') }}" class="update-quantity-form number-input" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" name="minus" class="minus"><i class="fas fa-minus"></i></button>
                            <input class="fancy-input-number quantity" min="1" max="{{ $product->stock }}" name="quantity" value="{{ $product->quantity }}" type="number" readonly>
                            <button type="submit" name="plus" class="plus"><i class="fas fa-plus"></i></button>
                        </form>
                    </td>
                    <td class="cart-product-grand-total">
                        <h5 class="cart-grand-total-price product_unit_price">
                            ${{ number_format($product->price, 2) }}
                        </h5>
                    </td>
                    <td class="cart-product-grand-total">
                        <h5 class="cart-grand-total-price product_total_price">
                            ${{ number_format($product->total, 2) }}
                        </h5>
                    </td>
                    <td class="romove-item">
                        <form method="post" action="{{ route('cart.remove') }}" class="remove-product-form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-red"><span><i class="fas fa-trash" style="color: white;"></i></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row payment-info">
        <!-- Columna 1: Tipo de Envío -->
         @auth
            <div class="col-md-4 container-payment-info">
                <h4 class="text-light">Tipo de Entrega</h4>
                <div class="form-group">
                    <div class="subscribe-form">
                        <select class="inp-form" style="padding: 10px 10px; margin: 15px 0; width: 100%;" id="shipping-method">
                            <option value="store-pickup" selected>Recoger en una sucursal Canvolt</option>
                            <option value="home-delivery">Envío a domicilio</option>
                        </select>
                    </div>
                </div>

                <div id="store-pickup-options" class="mt-3">
                    <h5 class="text-light">Opciones de entrega</h5>
                    <div class="form-group">
                        <label><input type="radio" name="payment_method" value="in-store" checked> Pagar en sucursal</label><br>
                        <label><input type="radio" name="payment_method" value="online"> Pago en Línea</label>
                    </div>
                </div>

                <div id="home-delivery-options" class="mt-3" style="display: none;">
                    <h5 class="text-light">Opciones de Envío</h5>
                    <div class="form-group">
                        @foreach ($shippingMethods as $shippingMethod)
                            <label><input type="radio" name="shipping-option" value="{{ $shippingMethod->id }}"> <span style="color: var(--background-7);">{{ price_formatted($shippingMethod->cost) }}</span> {{ $shippingMethod->name }}</label><br>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Columna 2: Seleccion de sucursal -->
            <div class="col-md-4 container-payment-info" id="branch-office-container">
                <h4 class="text-light">Sucursal Seleccionada</h4>
                <div class="form-group">
                    <div class="subscribe-form">
                        <select class="inp-form" style="padding: 10px 10px; margin: 15px 0; width: 100%;" name="branch_office" id="branch-office">
                            @foreach ($branchOffices as $branchOffice)
                                <option value="{{ $branchOffice->id }}">{{ $branchOffice->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div id="store-pickup-options" class="mt-3">
                    <iframe src="{{ $branchOffices->first()->map_url }}" width="100%" height="250px" frameborder="0"></iframe>
                </div>
            </div>
        @endauth

        <!-- Columna 4: Información del Envío y Total -->
        <div class="col-md-4 container-payment-info">
            <h4 class="text-light" style="margin-bottom: 15px;">Resumen del Pedido</h4>
            <div class="form-group price-section" style="padding-bottom: 85px;">
                <h5 class="text-light">Envío: <span id="shipping-price" style="color: var(--background-7);">{{ price_formatted(0) }}</span></h5>
                <h5 class="text-light">Total: <span id="total-price" style="color: var(--background-7);">{{ price_formatted($totalPrice) }}</span></h5>
            </div>
            @guest
                <div style="height: 100px; margin: auto; margin-top: 25px;">
                    <a class="btn btn-orange" style="width: 100%;" href="{{ route('login.redirect') }}"><span>Continuar compra</span></a>
                </div>
            @endguest
            @auth
                <form id="checkout-form" action="{{ route('cart.checkout.form') }}" class="payment-form" method="post" novalidate>
                    @csrf
                    <label>
                        <input type="checkbox" name="terms" id="terms-checkbox" required title="Si quieres continuar tienes que aceptar los términos y condiciones">
                        Acepto los <a href="#" target="_blank">Términos y condiciones</a>
                    </label>
                    <div id="terms-error" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        Debes aceptar los términos y condiciones para continuar.
                    </div>

                    <input type="hidden" id="input-shipping-method" name="input_shipping_method">
                    <input type="hidden" id="input-payment_method" name="input_payment_method">
                    <input type="hidden" id="input-shipping-id" name="input_shipping_id">
                    <input type="hidden" id="input-terms" name="input_terms">

                    <div style="margin: auto; margin-top: 15px;">
                        <button type="submit" class="btn btn-orange" style="width: 100%;"><span>Continuar compra</span></button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
</div>

<script>
    document.getElementById('checkout-form').addEventListener('submit', function(event) {
        const termsCheckbox = document.getElementById('terms-checkbox');
        const termsError = document.getElementById('terms-error');

        if (!termsCheckbox.checked) {
            event.preventDefault();
            termsError.style.display = 'block';
        } else {
            termsError.style.display = 'none';
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
        const shippingMethod = document.getElementById('shipping-method');
        const storePickupOptions = document.getElementById('store-pickup-options');
        const homeDeliveryOptions = document.getElementById('home-delivery-options');
        const branchOfficeContainer = document.getElementById('branch-office-container');
        const shippingPriceElement = document.getElementById('shipping-price');
        const totalPriceElement = document.getElementById('total-price');
        let totalPrice = parseFloat('{{ $totalPrice }}');

        // Campos hidden
        const inputShippingMethod = document.getElementById('input-shipping-method');
        const inputPaymentMethod = document.getElementById('input-payment_method');
        const inputShippingPrice = document.getElementById('input-shipping-id');

        // Actualiza el campo hidden cuando cambia el método de envío
        shippingMethod.addEventListener('change', function () {
            inputShippingMethod.value = this.value;

            if (this.value === 'store-pickup') {
                storePickupOptions.style.display = 'block';
                homeDeliveryOptions.style.display = 'none';
                if (paymentMethod.value === 'in-store') {
                    branchOfficeContainer.style.display = 'block';
                } else {
                    branchOfficeContainer.style.display = 'none';
                }
                shippingPriceElement.textContent = priceFormatted(0.00);
                inputShippingPrice.value = '0.00';
            } else {
                storePickupOptions.style.display = 'none';
                homeDeliveryOptions.style.display = 'block';
                branchOfficeContainer.style.display = 'none';
                updateShippingPrice();
            }
            updateTotalPrice();
        });

        // Actualiza el campo hidden cuando cambia la opción de envío
        const shippingOptions = document.querySelectorAll('input[name="shipping-option"]');
        shippingOptions.forEach(option => {
            option.addEventListener('change', function () {
                updateShippingPrice();
                updateTotalPrice();
            });
        });

        // Actualiza el campo hidden del método de pago
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        paymentMethods.forEach(method => {
            method.addEventListener('change', function () {
                inputPaymentMethod.value = this.value;
            });
        });

        // Actualiza el precio de envío
        function updateShippingPrice() {
            const selectedOption = document.querySelector('input[name="shipping-option"]:checked');
            if (selectedOption) {
                let shippingMethods = @json($shippingMethods);
                const shippingId = parseFloat(selectedOption.value);

                // Encontrar el método de envío por id
                const selectedShippingMethod = shippingMethods.find(method => method.id === shippingId);
                
                shippingPriceElement.textContent = priceFormatted(selectedShippingMethod.cost);
                inputShippingPrice.value = shippingId;
            } else {
                shippingPriceElement.textContent = priceFormatted(0.00);
                inputShippingPrice.value = null;
            }
        }

        // Actualiza el precio total
        function updateTotalPrice() {
            const shippingPrice = parseFloat(shippingPriceElement.textContent.replace('$', '')) || 0;
            const finalTotalPrice = totalPrice + shippingPrice;
            totalPriceElement.textContent = priceFormatted(finalTotalPrice.toFixed(2));
        }

        // Inicializa los valores al cargar la página
        inputShippingMethod.value = shippingMethod.value;
        const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (selectedPaymentMethod) {
            inputPaymentMethod.value = selectedPaymentMethod.value;
        }
        const selectedShippingOption = document.querySelector('input[name="shipping-option"]:checked');
        if (selectedShippingOption) {
            inputShippingPrice.value = selectedShippingOption.value;
        }

        function priceFormatted(price) {
            return '$' + Number(price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MXN';
        }
    });
</script>

@endsection