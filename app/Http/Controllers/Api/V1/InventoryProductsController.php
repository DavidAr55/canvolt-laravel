<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Inventory::join('products', 'inventory.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'inventory.id as inventory_id',
                'products.id as product_id',
                'categories.id as category_id',
                'categories.name as category_name',
                'products.code',
                'products.brand',
                'products.name as product_name',
                'inventory.stock',
                'products.description',
                'products.description_min',
                'products.price',
                'products.discount',
                'products.condition',
                'products.type',
                'products.photo_main',
                'products.photos',
                'products.created_at as product_created_at',
                'products.updated_at as product_updated_at',
            );

        // Filtrar por categorías
        if ($request->has('categories') && !empty($request->categories)) {
            $categories = explode(',', $request->categories);
            $query->whereIn('categories.id', $categories);
        }

        // Filtrar por marcas
        if ($request->has('brands') && !empty($request->brands)) {
            $brands = explode(',', $request->brands);
            $query->whereIn('products.brand', $brands);
        }

        // Filtrar por rango de precios
        if ($request->has('min_price')) {
            $query->where('products.price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('products.price', '<=', $request->max_price);
        }

        // Ordenar productos
        if ($request->has('order_by')) {
            switch ($request->order_by) {
                case 'price_asc':
                    $query->orderBy('products.price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('products.price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('products.name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('products.name', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('products.created_at', 'desc');
                    break;
                case 'in_stock':
                default:
                    $query->orderBy('inventory.stock', 'desc');
                    break;
            }
        } else {
            $query->orderBy('inventory.stock', 'desc');
        }

        // Paginación
        $perPage = $request->has('per_page') ? (int)$request->per_page : 9;
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    public function getData()
    {
        $query = Inventory::rightJoin('products', 'inventory.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select(
                'products.category_id',
                'products.brand',
                'products.name as product_name',
                'inventory.stock',
                'products.description_min',
                'products.photo_main',
                'products.price',
                'products.discount'
            )->get();

        // Si no se encuentran productos, devolver una respuesta vacía
        if ($query->isEmpty()) {
            return response()->json(['message' => 'No products found'], 404);
        }

        // Formatear los datos de los productos
        $queryFormatted = $query->map(function ($product) {
            return [
                'type' => ($product["category_id"] == 4) ? 'service' : 'product',
                'product' => "{$product["brand"]} - {$product["product_name"]}",
                'description_min' => $product["description_min"],
                'photo_main' => $product["photo_main"],
                'price' => price_formatted(round($product["price"] * (1 - $product["discount"] / 100), 2)),
                'discount' => $product["discount"],
                'stock' => $product["stock"],
            ];
        });

        // Retornar los datos en formato JSON
        return response()->json($queryFormatted, 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
