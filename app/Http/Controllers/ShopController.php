<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ShopController extends Controller
{
    public function index($categorySlug): View|RedirectResponse
    {
        // Use match to determine the query based on the category
        $page = match ($categorySlug) {
            'scooters'   => 'Scooters',
            'piezas'     => 'Priezas y Refacciones',
            'accesorios' => 'Accesorios y Más',
            'todos'      => 'Todos los productos',
            default      => 404,  // If no category is specified
        };

        // If the category does not exist, redirect to 404
        if($page === 404) {
            return redirect('/404');
        }

        // New varaibles
        $categories = Category::select('id', 'name')->where('id', '!=', 4)->orderBy('name', 'desc')->get();
        $brands = Product::select('brand')->distinct()->where('brand', '!=', null)->orderBy('brand', 'desc')->get();

        // Return the view with the total number of products, products, and category
        return view('shop.shop', ['categorySlug' => $categorySlug,
                                  'page'       => $page,
                                  'categories' => $categories,
                                  'brands'     => $brands]);
    }

    public function show($categorySlug, $productSlug): View|RedirectResponse
    {
        // Use match to determine the query based on the category
        $page = match ($categorySlug) {
            'scooters'   => 200,
            'piezas'     => 200,
            'accesorios' => 200,
            'todos'      => 200,
            default      => 404,  // If no category is specified
        };

        // Realizar la consulta con whereRaw
        $product = Product::join('inventory', 'products.id', '=', 'inventory.product_id')
                          ->whereRaw("CONCAT(`brand`, ' ', `name`) = ?", [$productSlug])
                          ->select('products.*', 'inventory.stock')
                          ->first();

        // If the category does not exist, redirect to 404
        if (!$product || $page === 404) {
            // Si no se encuentra el producto, lanzar una excepción 404
            return redirect('/404');
        }

        // Retrieve the photos for the product
        $photos = collect();
        if ($product->photos) {
            $productPhotos = json_decode($product->photos);
            foreach ($productPhotos as $photo) {
                $photos->push(['photo' => $photo]);
            }
        }

        return view('shop.product', ['product' => $product,
                                     'photos'  => $photos]);
    }
}
