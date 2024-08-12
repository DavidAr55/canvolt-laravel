@extends('layouts.home-layout')

@section('title', 'Datos de entrega')

@section('content')

@include('layouts.alerts')

<div class="container-my-products">
    <h2 class="text-light mb-3 address-title">Dirección de envío</h2>
    <div class="row justify-content-md-center">
        <div class="col-6 justify-center container-info-pago">
            <h4 class="text-light mb-3">Datos personales</h4>
            <form id="personal-info-form" class="personal-info-form" action="{{ route('cart.save.client') }}" method="post" novalidate>
                @csrf
                
                <!-- Información del Cliente -->
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-signature"></i>
                        <input class="inp-form" id="first_name" type="text" name="first_name" placeholder="Nombre" value="{{ $purchaseInformation['client']->first_name ?? '' }}" {{ ($purchaseInformation['client']) ? 'disabled' : '' }} required>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        El nombre es obligatorio
                    </div>
                </div>
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-signature"></i>
                        <input class="inp-form" id="last_name" type="text" name="last_name" placeholder="Apellidos" value="{{ $purchaseInformation['client']->last_name ?? '' }}" {{ ($purchaseInformation['client']) ? 'disabled' : '' }} required>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        Los apellidos son obligatorios
                    </div>
                </div>  
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-phone"></i>
                        <input class="inp-form" id="phone" type="tel" name="phone" placeholder="Teléfono" value="{{ $purchaseInformation['client']->phone ?? '' }}" {{ ($purchaseInformation['client']) ? 'disabled' : '' }} required>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        El numero de teléfono ingresado no es válido
                    </div>
                </div>  
            
                <h4 class="text-light mt-5 mb-3">Dirección de Entrega</h4>
                <!-- Dirección -->
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-road"></i>
                        <input class="inp-form" id="street" type="text" name="street" placeholder="Calle" required>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        La calle es obligatoria
                    </div>
                </div>  
                <div class="row">
                    <div class="col-6">
                        <div class="container-inputs-extra">
                            <div class="subscribe-form" style="margin: 10px 0;">
                                <i class="fas fa-hashtag"></i>
                                <input class="inp-form" id="external_number" type="number" name="external_number" placeholder="Número exterior" required style="padding: 15px 20px 15px 44px;">
                            </div>
                            <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                                El número exterior es obligatorio
                            </div>
                        </div> 
                    </div>
                    <div class="col-6">
                        <div class="container-inputs-extra">
                            <div class="subscribe-form" style="margin: 10px 0;">
                                <i class="fas fa-hashtag"></i>
                                <input class="inp-form" id="internal_number" type="number" name="internal_number" placeholder="Número interior (Opcional)" required style="padding: 15px 20px 15px 44px;">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-map-marker-alt"></i>
                        <input class="inp-form" id="neighborhood" type="text" name="neighborhood" placeholder="Colonia" required>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        La colonia es obligatoria
                    </div>
                </div>
                <div class="container-inputs-extra">
                    <div class="subscribe-form mt-4">
                        <i class="fas fa-city"></i>
                        <select id="state_select" class="inp-form" id="state" name="state" style="padding: 15px 20px 15px 44px;" required>
                            <option value="" selected>Selecciona un estado</option>
                        </select>
                    </div>
                    <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                        Selecciona un estado
                    </div>
                </div> 
                <div class="row">
                    <div class="col-6">
                        <div class="container-inputs-extra">
                            <div class="subscribe-form" id="container_city" style="margin: 10px 0;">
                                <i class="fas fa-map-marked-alt"></i>
                                <select id="city_select" class="inp-form" name="city" style="padding: 15px 20px 15px 44px;" required>
                                    <option value="" selected>Selecciona un municipio</option>
                                </select>
                            </div>
                            <div class="subscribe-form" id="container_city_f" style="margin: 10px 0; display: none;">
                                <i class="fas fa-map-marked-alt"></i>
                                <select id="city_select_f" class="inp-form" style="padding: 15px 20px 15px 44px;" disabled>
                                </select>
                            </div>
                            <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                                Selecciona un municipio
                            </div>
                        </div> 
                    </div>
                    <div class="col-6">
                        <div class="container-inputs-extra">
                            <div class="subscribe-form" style="margin: 10px 0;">
                                <i class="fas fa-mail-bulk"></i>
                                <input class="inp-form" id="postal_code" type="number" name="postal_code" placeholder="Código Postal" min="10000" max="99999" oninput="if(this.value.length > 5) this.value = this.value.slice(0, 5);" style="padding: 15px 20px 15px 44px;" required>
                            </div>
                            <div class="error-message" style="color: red; display: none; font-size: 14px; margin-top: 5px;">
                                El código postal es obligatorio
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="container-inputs-extra">
                    <div class="subscribe-form">
                        <i class="fas fa-street-view" style="margin-top: -57px;"></i>
                        <textarea class="inp-form" id="reference" name="reference" placeholder="Referencia (Opcional)" style="padding-top: 20px; font-size: 18px;"></textarea>
                    </div>
                </div>

                <!-- Botón de Envío -->
                <div class="row justify-content-md-center">
                    <div class="col-4 justify-center">
                        <div class="d-flex">
                            <input type="hidden" name="saved_address">
                            <input type="hidden" name="saved_client" value="{{ $purchaseInformation['client']->token ?? '' }}">
                            <button type="submit" class="btn btn-form btn-green"><span>Continuar</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-4 justify-center">
            <div id="address-container" class="container-info-pago">
                <h4 class="text-light mb-3">Tus direcciones</h4>
                <ul id="address-list" class="description-toggle">
                    <!-- Las direcciones se agregarán aquí dinámicamente -->
                </ul>
            </div>
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
    document.addEventListener('DOMContentLoaded', function() {
        // URL de la API
        const apiUrl = 'http://127.0.0.1:8000/api/v1/users-address';

        // Hacer la solicitud a la API
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const addressContainer = document.getElementById('address-container');
                const addressList = document.getElementById('address-list');

                if (!data || data.length === 0) {
                    addressContainer.style.display = 'none';
                    return;
                }

                data.forEach((address) => {
                    const addressItem = document.createElement('li');

                    const radioButton = document.createElement('input');
                    radioButton.type = 'radio';
                    radioButton.name = 'direccion';
                    radioButton.id = `direccion-${address.token}`;
                    radioButton.value = address.token;

                    const titleSpan = document.createElement('span');
                    titleSpan.className = 'title product-info';
                    titleSpan.style.color = 'white';
                    titleSpan.innerHTML = `${address.city} ${address.street} ${address.external_number} <i class="fa fa-angle-down" aria-hidden="true"></i>`;

                    titleSpan.addEventListener('click', function() {
                        radioButton.checked = !radioButton.checked; 
                        if (radioButton.checked) {
                            fillForm(address);
                            updateHiddenInput(radioButton.value);
                        } else {
                            clearForm();
                            updateHiddenInput(null);
                        }
                    });

                    radioButton.addEventListener('change', function() {
                        if (this.checked) {
                            fillForm(address);
                            updateHiddenInput(this.value);
                        } else {
                            clearForm();
                            updateHiddenInput(null);
                        }
                    });

                    const detailList = document.createElement('ul');
                    detailList.className = 'description-toggle-info';
                    detailList.innerHTML = `
                        <li>Calle: <span>${address.street}</span></li>
                        <li>Numero exterior: <span>${address.external_number}</span></li>
                        <li>Numero interno: <span>${address.internal_number || ''}</span></li>
                        <li>Colonia: <span>${address.neighborhood}</span></li>
                        <li>Estado: <span>${address.state}</span></li>
                        <li>Minicipio: <span>${address.city}</span></li>
                        <li>Código postal: <span>${address.postal_code}</span></li>
                        <li>Referencia: <span>${address.reference || ''}</span></li>
                    `;

                    addressItem.appendChild(radioButton);
                    addressItem.appendChild(titleSpan);
                    addressItem.appendChild(detailList);

                    addressList.appendChild(addressItem);
                });
            })
            .catch(error => {
                console.error('Error al obtener las direcciones:', error);
            });

        // Función para actualizar el valor del input hidden
        function updateHiddenInput(value) {
            const hiddenInput = document.querySelector('input[name="saved_address"]');
            hiddenInput.value = value || '';
        }

        // Función para rellenar el formulario con los datos de la dirección seleccionada
        function fillForm(address) {
            document.getElementById('street').value = address.street;
            document.getElementById('external_number').value = address.external_number;
            document.getElementById('internal_number').value = address.internal_number || '';
            document.getElementById('neighborhood').value = address.neighborhood;
            document.getElementById('state_select').value = address.state;
            document.getElementById('city_select').value = address.city;
            document.getElementById('postal_code').value = address.postal_code;
            document.getElementById('reference').value = address.reference || '';

            document.getElementById('street').disabled = true;
            document.getElementById('external_number').disabled = true;
            document.getElementById('internal_number').disabled = true;
            document.getElementById('neighborhood').disabled = true;
            document.getElementById('state_select').disabled = true;

            document.getElementById('city_select').disabled = true;
            document.getElementById('city_select').required = false;
            document.getElementById('container_city').style.display = 'none';
            document.getElementById('container_city_f').style.display= 'block'
            document.getElementById('city_select_f').innerHTML = `<option>${address.city}</option>`;

            document.getElementById('postal_code').disabled = true;
            document.getElementById('reference').disabled = true;
        }

        // Función para limpiar y habilitar los campos del formulario
        function clearForm() {
            document.getElementById('street').value = '';
            document.getElementById('external_number').value = '';
            document.getElementById('internal_number').value = '';
            document.getElementById('neighborhood').value = '';
            document.getElementById('state_select').value = '';
            document.getElementById('city_select').value = '';
            document.getElementById('postal_code').value = '';
            document.getElementById('reference').value = '';

            document.getElementById('street').disabled = false;
            document.getElementById('external_number').disabled = false;
            document.getElementById('internal_number').disabled = false;
            document.getElementById('neighborhood').disabled = false;
            document.getElementById('state_select').disabled = false;

            document.getElementById('city_select').disabled = false;
            document.getElementById('city_select').required = true;
            document.getElementById('container_city').style.display = 'block';
            document.getElementById('container_city_f').style.display= 'none'
            document.getElementById('city_select_f').value = '';

            document.getElementById('postal_code').disabled = false;
            document.getElementById('reference').disabled = false;
        }

        // Añadir eventos de cambio a los radio buttons para limpiar el formulario si no hay ninguno seleccionado
        const addressTitles = document.querySelectorAll('.title');

        addressTitles.forEach(title => {
            title.addEventListener('click', function() {
                const radio = this.parentElement.querySelector('input[type="radio"]');
                radio.checked = !radio.checked; 
                if (!radio.checked) {
                    clearForm();
                    updateHiddenInput(null);
                }
            });
        });

        const form = document.getElementById('personal-info-form');

        form.addEventListener('submit', function(event) {
            let isValid = true;

            const fieldsToValidate = [
                { id: 'first_name', errorMessage: 'El nombre es obligatorio' },
                { id: 'last_name', errorMessage: 'Los apellidos son obligatorios' },
                { id: 'phone', errorMessage: 'El numero de teléfono ingresado no es válido' },
                { id: 'street', errorMessage: 'La calle es obligatoria' },
                { id: 'external_number', errorMessage: 'El número exterior es obligatorio' },
                { id: 'neighborhood', errorMessage: 'La colonia es obligatoria' },
                { id: 'state_select', errorMessage: 'Selecciona un estado' },
                { id: 'city_select', errorMessage: 'Selecciona un municipio' },
                { id: 'postal_code', errorMessage: 'El código postal es obligatorio' }
            ];

            fieldsToValidate.forEach(field => {
                const input = document.getElementById(field.id);
                const errorMessage = input.closest('.container-inputs-extra').querySelector('.error-message');
                errorMessage.style.display = 'none';

                if (field.id !== 'city_select' || input.required) {
                    // Validar si no es city_select o si es city_select y es requerido
                    if (!input.value.trim()) {
                        errorMessage.textContent = field.errorMessage;
                        errorMessage.style.display = 'block';
                        isValid = false;
                    }
                }
                else if (input.type === 'number' && input.value < 1) {
                    errorMessage.textContent = field.errorMessage;
                    errorMessage.style.display = 'block';
                    isValid = false;
                }
            });

            if (!isValid) {
                event.preventDefault();
            }
        });

        const phoneInput = document.getElementById('phone');

        phoneInput.addEventListener('input', function() {
            let input = phoneInput.value;
            input = input.replace(/\D/g, '');

            let formattedNumber = input.substring(0, 2);  
            if (input.length > 2) {
                formattedNumber += ' ' + input.substring(2, 6);  
            }
            if (input.length > 6) {
                formattedNumber += ' ' + input.substring(6, 10); 
            }

            phoneInput.value = formattedNumber;
        });

        const stateSelect = document.getElementById('state_select');
        const citySelect = document.getElementById('city_select');

        function capitalizeFirstLetter(str) {
            if (str.length === 0) return "";
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }

        fetch('https://raw.githubusercontent.com/martinciscap/json-estados-municipios-mexico/master/estados.json')
            .then(response => response.json())
            .then(data => {
                data.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.nombre;
                    option.textContent = state.nombre;
                    stateSelect.appendChild(option);
                });
            });

        stateSelect.addEventListener('change', function() {
            const selectedState = capitalizeFirstLetter(this.value);
            citySelect.innerHTML = '<option value="" selected>Selecciona un municipio</option>';

            if (selectedState) {
                fetch('https://raw.githubusercontent.com/martinciscap/json-estados-municipios-mexico/master/estados-municipios.json')
                    .then(response => response.json())
                    .then(data => {
                        const municipios = data[selectedState];
                        if (municipios) {
                            municipios.forEach(city => {
                                const option = document.createElement('option');
                                option.value = city;
                                option.textContent = city;
                                citySelect.appendChild(option);
                            });
                        } else {
                            console.error('No se encontraron municipios para el estado seleccionado.');
                        }
                    })
                    .catch(error => {
                        console.error('Hubo un problema al cargar los municipios:', error);
                    });
            }
        });
    });
</script>

@endsection