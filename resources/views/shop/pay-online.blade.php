@extends('layouts.home-layout')

@section('title', 'Datos de entrega')

@section('content')

@include('layouts.alerts')

<div class="container-my-products">
    <h2 class="text-light mb-3 address-title">Datos de la compra</h2>
    <div class="row justify-content-md-center">
        <div class="col-6 justify-center container-info-pago">
            <h4 class="text-light mb-3">Datos personales</h4>
            <form id="personal-info-form" class="personal-info-form" action="{{ route('cart.save.client') }}" method="post" novalidate>
                @csrf

                <div class="row">
                    @foreach ($clientInfo as $key => $value)
                        <div class="col-6">
                            <p><span class="product-info">{{ ucfirst($key) }}:</span> <span class="product-info" style="color: var(--background-10);">{{ $value }}</span></p>
                        </div>
                    @endforeach
                    @foreach ($addressInfo as $key => $value)
                        <div class="col-6">
                            <p><span class="product-info">{{ ucfirst($key) }}:</span> <span class="product-info" style="color: var(--background-10);">{{ $value }}</span></p>
                        </div>
                    @endforeach
                </div>
                
                <!-- MeracadoPago button container  -->
                <div style="height: 100px; width: 100%; background-color: transparent; margin: auto; margin-top: 25px;">
                    <div id="wallet_container"></div>
                </div>
            </form>
        </div>
        <div class="col-4 justify-center">
            <div class="container-info-pago">
                <h4 class="text-light" style="margin-bottom: 15px;">Resumen del Pedido</h4>
                <div class="form-group price-section">
                    @foreach ($purchaseInformation['products'] as $product)
                        <p><span class="product-info" style="color: white;">{{ is_valid_brand($product->brand) }} {{ $product->name }}</span> <span class="product-info" style="color: var(--background-10);">(x{{ $product['quantity'] }})</span>: <span class="product-info">{{ price_formatted($product['quantity'] * $product->price) }}</span></p>
                    @endforeach
                    <br>
                    <h5 class="text-light">Envío: <span id="shipping-price" style="color: var(--background-7);">{{ price_formatted($purchaseInformation['shippingCost']) }}</span></h5>
                    <h5 class="text-light">Total: <span id="total-price" style="color: var(--background-7);">{{ price_formatted($purchaseInformation['totalPrice']) }}</span></h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initializes the MercadoPago object with PUBLIC_KEY
    const mp = new MercadoPago(`{{ config('services.mercadopago.public_key') }}`, {
        locale: 'es-MX'
    });

    // Create a MercadoPago wallet component in the container with id "wallet_container".
    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: `{{ $preference->id }}`,
            redirectMode: 'self'
        },
        customization: {
            texts: {
                action: "pay",
                valueProp: 'security_safety',
            },
        },
    });
</script>

@endsection