<?php

use App\Models\User;
use Carbon\Carbon;

/**
 * Get the current year.
 *
 * This function returns the current year using the Carbon library.
 * The Carbon library provides a simple and elegant way to handle date and time.
 *
 * @return int The current year.
 */
if (!function_exists('current_year')) 
{
    function current_year()
    {
        return Carbon::now()->year;
    }
}

/**
 * Format quantity price.
 *
 * This function returns the received price formatted.
 *
 * @param float $price The price of the product.
 * @return string The price formatted.
 */
if (!function_exists('price_formatted')) 
{
    function price_formatted(float $price)
    {
        return '$' . number_format($price, 2) . ' MXN';
    }
}

/**
 * Format product brand.
 *
 * This function returns the received brand formatted.
 *
 * @param float $price The product brand.
 * @return string The brand formatted.
 */
if (!function_exists('is_valid_brand')) 
{
    function is_valid_brand(string $brand)
    {
        if($brand === 'Genericos') {
            return '';
        }

        return $brand;
    }
}

/**
 * Calculate discounted price.
 *
 * This function returns the price after applying the given discount percentage.
 *
 * @param float $price The original price of the product.
 * @param float $discount The discount percentage to be applied (e.g., 20 for 20%).
 * @return float The price after the discount has been applied.
 */
if (!function_exists('discounted_price')) 
{
    function discounted_price(float $price, float $discount)
    {
        // Calcula el monto de descuento
        $discountAmount = ($discount / 100) * $price;
        
        // Resta el descuento del precio original
        $finalPrice = $price - $discountAmount;
        
        return price_formatted($finalPrice);
    }
}

if (!function_exists('get_client_info')) 
{
    /**
     * Get client information.
     *
     * This function returns the client information.
     *
     * @return array The client information.
     */
    function get_client_info(): array
    {
        return User::select('name', 'last_name', 'email', 'phone')
            ->where('id', auth()->id())
            ->first()
            ->toArray();
    }
}