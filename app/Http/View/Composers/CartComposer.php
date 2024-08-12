<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{
    /**
     * Bind data to the view.
     *
     * This method retrieves the cart from the session, counts the total quantity of products,
     * and shares this data with the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        // Get the cart from the session
        $cart = Session::get('cart', []);

        // Count the total quantity of products in the cart
        $cartCount = 0;
        foreach ($cart as $quantity) {
            $cartCount += $quantity;
        }

        // Share the total quantity of products with the view
        $view->with('cartCount', $cartCount);
    }
}
