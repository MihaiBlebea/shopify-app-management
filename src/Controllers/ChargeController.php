<?php

namespace App\Controllers;

use App\Models\Shop;
use Framework\Router\Request;

class ChargeController
{
    function oneTimeCharge()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");

        $charge = [
            "name"       => "Super Duper Expensive action",
            "price"      => 100.0,
            "return_url" => "http://localhost:8888/shopify-app-management/public/charge/callback",
            "test"       => true
        ];

        $response = $api->ApplicationCharge->post($charge);

        if($response["status"] == "pending")
        {
            header("Location: " . $response["confirmation_url"]);
            die();
        } else {
            dd($response);
        }
    }

    function recurringCharge()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");

        $charge = [
            "name"       => "Super Duper Plan",
            "price"      => 10.0,
            "return_url" => "http://localhost:8888/shopify-app-management/public/charge/callback",
            "test"       => true
        ];

        $response = $api->RecurringApplicationCharge->post($charge);

        if($response["status"] == "pending")
        {
            header("Location: " . $response["confirmation_url"]);
            die();
        } else {
            dd($response);
        }
    }

    function usageCharge()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");

        $charge = [
            "name"       => "Super Duper Plan",
            "price"      => 10.0,
            "return_url" => "http://localhost:8888/shopify-app-management/public/charge/callback",
            "test"       => true
        ];

        $response = $api->RecurringApplicationCharge->post($charge);

        if($response["status"] == "pending")
        {
            header("Location: " . $response["confirmation_url"]);
            die();
        } else {
            dd($response);
        }
    }

    function chargeCallback(Request $request)
    {
        dd($request->getAllPayload());
    }

    function getAllRecurringCharges()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");
        $response = $api->RecurringApplicationCharge->get();
        dd($response);
    }

    function activateRecurringCharge($id)
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");

        $response = $api->RecurringApplicationCharge($id)->activate();
        dd($response);
    }
}
