<?php

namespace App\Services;

use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;

class MercadoPagoService
{
    public function __construct()
    {
        MercadoPagoConfig::setAccessToken(config('services.mercadopago.access_token'));
    }

    public function createPreference($data)
    {
        $client = new PreferenceClient();

        try {
            $preference = $client->create($data);
            return $preference;
        } catch (MPApiException $e) {
            throw new \Exception("Error en la API de Mercado Pago: " . $e->getMessage());
        } catch (\Exception $e) {
            throw new \Exception("Error: " . $e->getMessage());
        }
    }
}
