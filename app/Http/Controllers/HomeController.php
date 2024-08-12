<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Gallery;

class HomeController extends Controller
{
    /**
     * Display the home page with various products and galleries.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve product IDs for the slider
        $products_id = Slider::pluck('product_id')->toArray();
        
        // Retrieve products for the slider, ordered by price in ascending order
        $products = Product::whereIn('id', $products_id)
            ->orderBy('price', 'asc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'discount', 'photo_main')
            ->get();

        // Retrieve the cheapest product in category 1
        $cheapest = Product::where('category_id', 1)
            ->orderBy('price', 'asc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'photo_main')
            ->first();

        // Retrieve a specific part in category 2
        $part = Product::where('category_id', 2)
            ->where('name', 'Llanta Sólida 10 pulgadas x 2.75')
            ->orderBy('price', 'asc')
            ->select('brand', 'name', 'photo_main')
            ->first();

        // Retrieve a specific accessory in category 3
        $accessory = Product::where('category_id', 3)
            ->where('name', 'Guardabarros trasero')
            ->orderBy('price', 'asc')
            ->select('brand', 'name', 'photo_main')
            ->first();

        // Retrieve the most expensive product in category 1
        $general = Product::where('category_id', 1)
            ->orderBy('price', 'desc')
            ->select('brand', 'name', 'photo_main')
            ->first();

        // Retrieve a random selection of 8 products excluding services (category 4)
        $all_products = Product::where('category_id', '!=', 4)
            ->inRandomOrder()
            ->orderBy('name', 'desc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'discount', 'condition', 'photo_main')
            ->limit(8)
            ->get();

        // Retrieve a selection of 8 scooters in category 1, ordered by price in ascending order
        $all_scooters = Product::where('category_id', 1)
            ->orderBy('price', 'asc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'discount', 'condition', 'photo_main')
            ->limit(8)
            ->get();

        // Retrieve a selection of 8 parts in category 2, ordered by price in ascending order
        $all_parts = Product::where('category_id', 2)
            ->orderBy('price', 'asc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'discount', 'condition', 'photo_main')
            ->limit(8)
            ->get();

        // Retrieve a selection of 8 accessories in category 3, ordered by price in ascending order
        $all_accessories = Product::where('category_id', 3)
            ->orderBy('price', 'asc')
            ->select('id', 'brand', 'name', 'description_min', 'price', 'discount', 'condition', 'photo_main')
            ->limit(8)
            ->get();

        // Retrieve the 5 most recently updated galleries
        $galleries = Gallery::orderBy('updated_at', 'desc')->take(5)->get();

        // Prepare the latest photos from the galleries
        $photos = collect();
        foreach ($galleries as $gallery) {
            $galleryPhotos = collect(json_decode($gallery->photos))->map(function ($photo) use ($gallery) {
                return [
                    'photo' => $photo,
                    'title' => $gallery->title,
                    'updated_at' => $gallery->updated_at->isoFormat('dddd D [de] MMMM [del] YYYY [a las] h:mm A')
                ];
            });
            $photos = $photos->merge($galleryPhotos);
        }

        // Sort and take the 5 latest photos
        $latest_photos = $photos->sortByDesc('updated_at')->take(5);

        // Return the view with all the gathered data
        return view('home', [
            'products' => $products,
            'cheapest' => $cheapest,
            'part' => $part,
            'accessory' => $accessory,
            'general' => $general,
            'all_products' => $all_products,
            'all_scooters' => $all_scooters,
            'all_parts' => $all_parts,
            'all_accessories' => $all_accessories,
            'latest_photos' => $latest_photos,
        ]);
    }
}
