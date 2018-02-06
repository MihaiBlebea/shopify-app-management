<?php

namespace App\Controllers;

use App\Models\Shop;
use Framework\Router\Request;
use Framework\Configs\Config;

class AuthController
{
    function index(Request $request)
    {
        $auth = new Shop();
        $config = new Config();
        $auth->setup($config, $request->out("shop"));
        $auth->getToken();
    }

    function callback(Request $request)
    {
        $auth = new Shop();
        $config = new Config();
        $auth->setup($config, $request->out("shop"));
        $auth->receiveCallback();
    }

    function getTheme()
    {
        $shop = new Shop();
        $id = $shop->getMainThemeId("mihaidev.myshopify.com");
        $assets = $shop->getApi("mihaidev.myshopify.com")->Theme($id)->Asset->get();
        dd($assets);
    }

    function installSnippet()
    {
        $shop = new Shop();
        $id = $shop->getMainThemeId("mihaidev.myshopify.com");

        $asset = [
            "key" => "sections/mihai.liquid",
            "value" => file_get_contents("http://localhost:8888/shopify-app/public/snippets/mihai.liquid")
        ];

        $response = $shop->getApi("mihaidev.myshopify.com")->Theme($id)->Asset->put($asset);

        dd($response);
    }

    function getScriptTags()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");
        $scriptTags = $api->ScriptTag->get();
        dd($scriptTags);
    }

    function addScriptTag()
    {
        $shop = new Shop();
        $api = $shop->getApi("mihaidev.myshopify.com");

        $script_tag = [
            "event" => "onload",
            "src"   => "http://localhost:8888/shopify-app/public/script-tags/mihai.js"
        ];

        $response = $api->ScriptTag->post($script_tag);
        dd($response);
    }
}
