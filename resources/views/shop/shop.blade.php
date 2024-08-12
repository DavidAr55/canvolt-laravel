@extends('layouts.home-layout')

@section('title', 'Productos de Canvolt')

@section('content')

@include('layouts.alerts')
<!--===================== SHOP =====================-->
<section class="s-shop">
    <div class="container">
        <div class="shop-sidebar-btn btn"><span>Filtrar</span></div>
        <div class="row">
            <div class="col-12 col-lg-3 shop-sidebar">
                <ul class="widgets wigets-shop">
                    <li class="widget wiget-shop-category">
                        <h5 class="title">Ordenar productos</h5>
                        <div class="subscribe-form">
                            <i class="fas fa-filter"></i>
                            <select class="inp-form" style="padding: 10px 20px 10px 44px;" name="order_by" id="order-by">
                                <option value="in_stock" selected>En existencia</option>
                                <option value="price_asc">Menor a mayor precio</option>
                                <option value="price_desc">Mayor a menor precio</option>
                                <option value="name_asc">Nombre [A - Z]</option>
                                <option value="name_desc">Nombre [Z - A]</option>
                                <option value="newest">Lo más nuevo</option>
                            </select>
                        </div>
                    </li>
                    <li class="widget wiget-shop-category">
                        <h5 class="title">Categorias</h5>
                        <ul id="category-filters">
                            @php    $categoryFound = false;    @endphp
                            @foreach ($categories as $category)
                                @if (strtolower($category->name) === $categorySlug)
                                    <li><p><input type="checkbox" value="{{ $category->id }}" id="check-category-{{ $category->name }}" checked disabled><span>{{ $category->name }}</span></p></li>
                                    @php
                                        $categoryFound = true;
                                        break;
                                    @endphp
                                @endif
                            @endforeach

                            @if (!$categoryFound)
                                @foreach ($categories as $category)
                                    <li><p><input type="checkbox" value="{{ $category->id }}"><span>{{ $category->name }}</span></p></li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li class="widget wiget-price">
                        <h5 class="title">Rango de precio ($MXN)</h5>
                        <div id="slider-range"></div>
                        <div class="amount-cover">
                            <input type="text" readonly id="amount-min">
                            <span>&mdash;</span>
                            <input type="text" readonly id="amount-max">
                        </div>
                    </li>
                    <li class="widget wiget-brand">
                        <h5 class="title">Marcas</h5>
                        <ul id="brand-filters">
                            @foreach ($brands as $brand)
                                <li><p><input type="checkbox" value="{{ $brand->brand }}"><span>{{ $brand->brand }}</span></p></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <button type="button" class="btn btn-wishlist mt-5" style="width: 100%; color: white;" id="reset-filters"><span>Restablecer filtros</span></button>
            </div>
            <div class="col-12 col-lg-9 shop-cover">
                <h2 class="title">{{ $page }}</h2>
                <div class="shop-sort-cover">
                    <div class="sort-left" id="total-products">0 productos encontrados</div>
                    <div class="sort-right">
                        <div class="sort-by">
                            <span class="sort-name">Visualizar como:</span>
                        </div>
                        <ul class="sort-form">
                            <li data-atr="large"><i class="fa fa-th-large" aria-hidden="true"></i></li>
                            <li data-atr="block" class="active"><i class="fa fa-th" aria-hidden="true"></i></li>
                            <li data-atr="list"><i class="fa fa-list" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="shop-product-cover">
                    <div class="row product-cover block" id="product-list">
                        <!-- Productos serán insertados aquí -->
                    </div>
                    <div class="pagination-cover">
                        <ul class="pagination" id="pagination">
                            <!-- Botones de paginación serán insertados aquí -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=================== SHOP END ===================-->

<script>
    $(document).ready(function() {
        const categorySlug = '{{ $categorySlug }}';
        const perPage = 9;
        let currentPage = 1;

        // Configuración del slider de rango de precio
        if ($('#slider-range')[0]) {
            $("#slider-range").slider({
                range: true,
                min: 1,
                max: 60000,
                values: [1, 60000],
                slide: function(event, ui) {
                    $("#amount-min").val(ui.values[0]);
                    $("#amount-max").val(ui.values[1]);
                },
                stop: function(event, ui) {
                    fetchProducts();
                }
            });
            $("#amount-min").val($("#slider-range").slider("values", 0));
            $("#amount-max").val($("#slider-range").slider("values", 1));
        }

        // Event listeners para filtros de categoría y marca
        $('#category-filters input, #brand-filters input').on('change', fetchProducts);
        $('#order-by').on('change', fetchProducts);
        $('#reset-filters').on('click', resetFilters);

        // Función para obtener los productos de la API
        function fetchProducts(page = 1) {
            currentPage = page;
            let categories = [];
            let brands = [];

            $('#category-filters input:checked').each(function() {
                categories.push($(this).val());
            });

            $('#brand-filters input:checked').each(function() {
                brands.push($(this).val());
            });

            let minPrice = $('#amount-min').val();
            let maxPrice = $('#amount-max').val();
            let orderBy = $('#order-by').val();

            $.ajax({
                url: "{{ url('api/v1/inventory-products') }}",
                method: 'GET',
                data: {
                    categories: categories.join(','),
                    brands: brands.join(','),
                    min_price: minPrice,
                    max_price: maxPrice,
                    order_by: orderBy,
                    page: currentPage,
                    per_page: perPage
                },
                success: function(response) {
                    renderProducts(response.data);
                    renderPagination(response);
                }
            });
        }

        function priceFormatted(price) {
            return '$' + Number(price).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MXN';
        }
        
        function capitalizeFirstLetter(str) {
            if (str.length === 0) return "";
            return str.charAt(0).toUpperCase() + str.slice(1).toLowerCase();
        }

        function isValidBrand(brand) {
            if(brand === 'Genericos') {
                return '';
            }

            return brand;
        }

        // Función para renderizar los productos
        function renderProducts(products) {
            let productList = $('#product-list');
            productList.empty();
            $('#total-products').text(products.length + ' productos encontrados');
            products.forEach(product => {
                let priceSection = ``;
                let discount = ``;

                if(product.discount > 0) {
                    discount = `<span class="sale">-${product.discount}%</span>`;
                    priceSection = `
                        <div class="new-price">${priceFormatted(product.price - (product.price * (product.discount / 100)))}</div>
                        <div class="old-price">${priceFormatted(product.price)}</div>
                    `
                } else {
                    priceSection = `
                        <div class="new-price">${priceFormatted(product.price)}</div>
                    `
                }

                let productItem = `
                    <form action="{{ route('cart.add') }}" method="POST" class="col-12 col-sm-4 prod-item-col">
                        @csrf
                        <div class="product-item product-item-dark">
                            ${discount}
                            <a href="{{ url('/productos/${categorySlug}/${product.brand} ${product.product_name}') }}" class="product-img"><img src="{{ config('app.canvolt_admin.url') . '/storage/' }}${product.photo_main}" alt="${product.brand} ${product.product_name}"></a>
                            <div class="product-item-wrap">
                                <div class="product-item-cover">
                                    <div class="price-cover">
                                        ${priceSection}
                                    </div>
                                    <h6 class="prod-title"><a href="single-shop.html">${isValidBrand(product.brand)} <br>${product.product_name}</a></h6>
                                    <input type="hidden" name="product_id" value="${product.product_id}">
                                    <button class="btn btn-green" type="submit"><span>Agregar <i class="fas fa-shopping-cart" style="color: white;"></i></span></button>
                                </div>
                                <div class="prod-info">
                                    <ul class="prod-list">
                                        <li>Descripción: <span>${product.description_min}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                `;
                productList.append(productItem);
            });
        }

        // Función para renderizar la paginación
        function renderPagination(response) {
            let pagination = $('#pagination');
            pagination.empty();

            const totalPages = response.last_page;
            const currentPage = response.current_page;

            if (currentPage > 1) {
                pagination.append(`
                    <li class="pagination-item item-prev"><a href="#" data-page="${currentPage - 1}"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                `);
            }

            for (let page = 1; page <= totalPages; page++) {
                pagination.append(`
                    <li class="pagination-item ${page === currentPage ? 'active' : ''}"><a href="#" data-page="${page}">${page}</a></li>
                `);
            }

            if (currentPage < totalPages) {
                pagination.append(`
                    <li class="pagination-item item-next"><a href="#" data-page="${currentPage + 1}"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                `);
            }

            // Add click event to pagination items
            $('.pagination-item a').on('click', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                fetchProducts(page);
            });
        }

        // Función para restablecer los filtros
        function resetFilters(e) {
            e.preventDefault();
            $('#category-filters input, #brand-filters input').prop('checked', false);
            if(categorySlug !== 'todos') {
                console.log(`#check-category-${capitalizeFirstLetter(categorySlug)}`);
                $(`#check-category-${capitalizeFirstLetter(categorySlug)}`).prop('checked', true);
            }
            $("#slider-range").slider("values", [1, 60000]);
            $("#amount-min").val(1);
            $("#amount-max").val(60000);
            $('#order-by').val('in_stock');
            fetchProducts();
        }

        // Inicializar la carga de productos
        fetchProducts();
    });
</script>

@endsection