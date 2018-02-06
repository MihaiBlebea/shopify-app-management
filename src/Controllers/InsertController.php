<?php

namespace App\Controllers;

use App\Models\Shop;

class InsertController
{
    function index()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");
        $themes = $api->Theme->get();
        dd($themes);
    }
}
