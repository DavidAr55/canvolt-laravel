<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\PickupOrder;
use App\Models\BranchOffice;
use App\Models\ShippingMethod;
use App\Services\MercadoPagoService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $mercadoPagoService;

    public function __construct(MercadoPagoService $mercadoPagoService)
    {
        $this->mercadoPagoService = $mercadoPagoService;
    }

    /**
     * Display the contents of the cart.
     *
     * This method retrieves the cart from the session, gets the product details
     * for the items in the cart, and then returns the 'shop.cart' view with the
     * product details.
     *
     * @return \Illuminate\View\View
     */
    public function viewCart(): View|RedirectResponse
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);

        // If car is empty, redirect the user to Products with a message
        if (empty($cart)) {
            return redirect('/productos/todos');
        }

        // Get the IDs of the products in the cart
        $productIds = array_keys($cart);

        // Get details of the products in the cart, including the stock from the inventory
        $products = Product::whereIn('id', $productIds)
            ->with('inventory') // Load the inventory relationship to get the stock
            ->get();

        // Add quantity and total to each product, and calculate total price
        $totalPrice = 0;

        foreach ($products as $product) {
            $product->stock = $product->inventory->stock ?? 0; // Use stock from the loaded inventory relation
            $product->quantity = $cart[$product->id];
            $product->total = $product->price * $product->quantity;
            $totalPrice += $product->total;
        }

        // Get the shipping methods to retorun it to the view
        $shippingMethods = ShippingMethod::where('is_active', 1)->get();

        // Get the branch offices to return it to the view
        $branchOffices = BranchOffice::where('status', 'active')->get();

        // Return the view with the product details, total price, and preference ID
        return view('shop.cart', [
            'products'        => $products,
            'totalPrice'      => $totalPrice,
            'shippingMethods' => $shippingMethods,
            'branchOffices'   => $branchOffices,
        ]);
    }

    public function mercadopagoSuccess()
    {
        return view('shop.mercadopago-success');
    }

    public function mercadopagoPending()
    {
        return view('shop.mercadopago-pending');
    }

    public function mercadopagoFailure()
    {
        return view('shop.mercadopago-failure');
    }

    /**
     * Display the contents of the cart.
     *
     * This method retrieves the cart from the session, gets the product details
     * for the items in the cart, and then returns the 'shop.cart' view with the
     * product details.
     *
     * @return \Illuminate\View\View
     */
    public function checkoutForm(Request $request)
    {
        $this->storeHiddenInputsInSession($request);

        $shippingCost = $this->getShippingCost($request->input_shipping_id);
        $cart = Session::get('cart', []);
        $purchaseInformation = $this->calculateTotalPrice($cart, $shippingCost);

        return $this->getCheckoutView($request, $purchaseInformation);
    }

    /**
     * Store the hidden input values in the session.
     */
    protected function storeHiddenInputsInSession(Request $request): void
    {
        Session::put('hidden_inputs', $request->only([
            'input_shipping_method',
            'input_payment_method',
            'input_shipping_id'
        ]));
    }

    /**
     * Retrieve the shipping cost based on the provided shipping ID.
     */
    protected function getShippingCost($shippingId): float
    {
        return ShippingMethod::where('id', $shippingId)->value('cost') ?? 0;
    }

    /**
     * Determine the correct view or redirect based on the shipping and payment methods.
     */
    protected function getCheckoutView(Request $request, array $purchaseInformation)
    {
        $shippingMethod = $request->input_shipping_method;
        $paymentMethod = $request->input_payment_method;
        
        return match (true) {
            $shippingMethod === 'home-delivery' => view('shop.checkout-delivery', [
                'purchaseInformation' => $purchaseInformation
            ]),

            $shippingMethod === 'store-pickup' && $paymentMethod === 'in-store' => $this->createPickupOrder($purchaseInformation),

            $shippingMethod === 'store-pickup' && $paymentMethod === 'online' => view('shop.checkout-online-pickup', [
                'purchaseInformation' => $purchaseInformation,
                'clientInfo' => get_client_info(),
                'preference' => $this->returnPreference($purchaseInformation)
            ]),

            default => redirect('/404'),
        };
    }
    
    protected function createPickupOrder($purchaseInformation)
    {
        // Convierte el modelo User y la colección de productos en arrays
        $purchaseInformationArray = [
            'client' => $purchaseInformation['client']->toArray(),
            'products' => $purchaseInformation['products']->toArray(),
            'quantity' => $purchaseInformation['quantity'],
            'shippingCost' => $purchaseInformation['shippingCost'],
            'totalPrice' => $purchaseInformation['totalPrice'],
        ];

        // Generar código QR (o cualquier identificador único necesario)
        $qrCode = Str::random(12); // Puedes ajustar la generación del QR según tus necesidades

        // Crear la orden de recogida en la base de datos
        $pickupOrder = PickupOrder::create([
            'qr_code' => $qrCode,
            'user_id' => auth()->id(),
            'status' => 'pending',
            'payment_method' => 'in-store',
            'total_price' => $purchaseInformation['totalPrice'],
            'items' => json_encode($purchaseInformationArray['products']),
        ]);

        // Enviar la solicitud POST a la API con los datos de la orden de recogida
        $response = Http::post(config('app.admin_url') . '/api/v1/pickup-order', [
            'qr_code' => $pickupOrder->qr_code,
            'user_id' => $pickupOrder->user_id,
            'status' => $pickupOrder->status,
            'payment_method' => $pickupOrder->payment_method,
            'total_price' => $pickupOrder->total_price,
            'items' => $pickupOrder->items,
        ]);

        // Opcional: Manejar la respuesta de la API
        if ($response->successful()) {
            // Realiza alguna acción si es necesario cuando la solicitud es exitosa
            echo '<h2 style="color: green;">Orden de recogida enviada a la API correctamente</h2>';
        } else {
            // Maneja el caso en que la solicitud falle
            echo '<h2 style="color: red;">Error al enviar la solicitud a la API</h2>';
        }
    }

    public function validateClientData(Request $request)
    {
        // Obtener los inputs hidden
        $clientToken = $request->input('saved_client');
        $addressToken = $request->input('saved_address');

        // Si el cliente no selecciona una dirección guardada, guardar la que ingresó
        if (!$request->filled('saved_address')) {
            $address = Address::create([
                'token'           => Str::uuid(),  // Generar un token único
                'user_id'         => auth()->id(),
                'street'          => $request->street,
                'external_number' => $request->external_number,
                'internal_number' => $request->internal_number,
                'neighborhood'    => $request->neighborhood,
                'state'           => $request->state,
                'city'            => $request->city,
                'postal_code'     => $request->postal_code,
                'reference'       => $request->reference,
            ]);

            $addressToken = $address->token;  // Guardar el token único recién creado
        }

        // Calcular el total de la compra
        $shippingCost = ShippingMethod::select('cost')->where('id', Session::get('hidden_inputs')['input_shipping_id'])->first();
        $cart = Session::get('cart', []);

        $purchaseInformation = $this->calculateTotalPrice($cart, $shippingCost->cost);

        // Crear la preferencia de Mercado Pago
        $preference = $this->returnPreference($purchaseInformation);

        $clientInfo = User::select('name', 'last_name', 'email', 'phone')->where('user_token', $clientToken)->first()->toArray();
        $addressInfo = Address::select('street', 'external_number', 'internal_number', 'neighborhood', 'city', 'state', 'postal_code', 'country', 'reference')->where('token', $addressToken)->first()->toArray();

        // Pasar la preferencia a la vista junto con otra información
        return view('shop.pay-online', [
            'purchaseInformation' => $purchaseInformation,
            'clientInfo'          => $clientInfo,
            'addressInfo'         => $addressInfo,
            'preference'          => $preference, // Pasar la preferencia a la vista
        ]);
    }

    /**
     * Add a product to the cart.
     *
     * This method validates the request to ensure the product exists,
     * then adds or updates the product in the cart stored in the session.
     * If the product already exists in the cart, it increments the quantity
     * or sets it to the requested quantity.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        // Validate the request to ensure the product exists and quantity is valid
        $validated = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity'   => ['nullable', 'integer', 'min:1'],
        ]);

        // Extract product_id and quantity from the validated data
        $productId = $validated['product_id'];
        $quantity = $validated['quantity'] ?? 1;

        // Retrieve the cart from the session or initialize it if it doesn't exist
        $cart = Session::get('cart', []);

        // Check if the product already exists in the cart
        if (isset($cart[$productId])) {
            // Check if the quantity exceeds the available stock
            if ($this->isQuantityExceedingStock($productId, ($cart[$productId] + $quantity))) {
                return redirect()->back()->with('error', 'La cantidad seleccionada excede el stock disponible para este producto.');
            } else {
                // If it exists, increment the quantity
                $cart[$productId] += $quantity;
            }
        } else {
            // If it doesn't exist, set the quantity
            $cart[$productId] = $quantity;
        }

        // Save the updated cart back to the session
        Session::put('cart', $cart);

        // Message based on the presence of the 'buy' parameter in the request
        $message = $request->has('buy')
            ? 'Producto agregado correctamente. Procede al pago.'
            : 'Producto agregado al carrito de compras';


        if ($request->has('buy')) {
            // Redirect to payment route with success message
            return redirect()->route('cart')->with('success', $message);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success-cart', $message);
    }

    /**
     * Update the quantity of a product in the cart.
     *
     * This method validates the request to ensure the product exists and the quantity is valid,
     * then updates the quantity of the specified product in the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuantity(Request $request)
    {
        // Validate the request to ensure the product exists and the quantity is valid
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Determine the quantity change based on which button was clicked
        $quantityDelta = match (true) {
            $request->has('plus')  => 1,
            $request->has('minus') => -1,
            default                => null
        };

        $productId = $request->product_id;
        $quantity = ($request->quantity + $quantityDelta);

        // Get the cart from the session
        $cart = Session::get('cart', []);

        // If the product exists in the cart, update its quantity
        if (isset($cart[$productId])) {
            // Check if the quantity exceeds the available stock
            if ($this->isQuantityExceedingStock($productId, $quantity)) {
                return redirect()->back()->with('error', 'La cantidad seleccionada excede el stock disponible para este producto.');
            }

            // If quantity is 0, remove the product from the cart
            if ($quantity === 0) {
                unset($cart[$productId]);
            } else {
                // Otherwise, update the quantity in the cart
                $cart[$productId] = $quantity;
            }

            // Save the updated cart to the session
            Session::put('cart', $cart);
        }

        // Redirect back to the cart view
        return redirect()->back();
    }

    /**
     * Remove a product from the cart.
     *
     * This method validates the request to ensure the product exists,
     * then removes the product from the cart in the session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Request $request)
    {
        // Validate the request to ensure the product exists
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $productId = $request->product_id;

        // Get the cart from the session
        $cart = Session::get('cart', []);

        // If the product exists in the cart, remove it
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }

        // Redirect to the cart view with a success message
        return redirect()->route('cart')->with('success', 'Producto eliminado del carrito de compras');
    }

    /**
     * Check if the requested quantity exceeds the available stock for a product.
     *
     * @param int $productId The ID of the product to check stock for.
     * @param int $quantity The quantity to check against the available stock.
     * @return bool True if the quantity exceeds the available stock, false otherwise.
     */
    public function isQuantityExceedingStock(int $productId, int $quantity): bool
    {
        // Retrieve the available stock for the given product ID
        $stockAvailable = Inventory::where('product_id', $productId)->value('stock');

        // Return true if the requested quantity exceeds the available stock, otherwise false
        return $quantity > $stockAvailable;
    }

    public function calculateTotalPrice($cart, $shippingCost = 0)
    {
        // If car is empty, redirect the user to Products with a message
        if (empty($cart)) {
            return redirect('/productos/todos');
        }

        // Get the IDs of the products in the cart
        $productIds = array_keys($cart);

        // Get details of the products in the cart, including the stock from the inventory
        $products = Product::whereIn('id', $productIds)
            ->with('inventory') // Load the inventory relationship to get the stock
            ->get();

        // Add quantity and total to each product, and calculate total price
        $totalPrice = 0;

        foreach ($products as $product) {
            $product->stock = $product->inventory->stock ?? 0; // Use stock from the loaded inventory relation
            $product->quantity = (int) $cart[$product->id];
            $product->total = $product->price * $product->quantity;
            $totalPrice += $product->total;
        }

        // Sumamos el costo de envio al final en caso de que haya costo de envio
        $totalPrice += $shippingCost;

        return [
            'client'          => User::select('user_token', 'name', 'last_name', 'email', 'phone')->where('id', Auth::user()->id)->first(),
            'products'        => $products,
            'quantity'        => $cart[$product->id],
            'shippingCost'    => $shippingCost,
            'totalPrice'      => $totalPrice,
        ];
    }

    /**
     * Return the preference for the online payment.
     *
     * @param array $purchaseInformation
     * @return array
     */
    private function returnPreference($purchaseInformation)
    {
        $preferenceData = [
            'items' => $purchaseInformation['products']->map(function ($product) {
                return [
                    'title' => $product->name,
                    'quantity' => (int) $product->quantity,
                    'unit_price' => (float) $product->price,
                ];
            })->values()->toArray(),
            
            // Configura las URLs de retorno y el redireccionamiento automático
            'back_urls' => [
                'success' => route('mercadopago.success'),   // URL para pago aprobado
                'failure' => route('mercadopago.failure'),   // URL para pago rechazado
                'pending' => route('mercadopago.pending')    // URL para pago pendiente
            ],
            'auto_return' => 'approved', // Redirección automática solo para pagos aprobados
        ];

        return $this->mercadoPagoService->createPreference($preferenceData);
    }
}
