<?php

namespace App\Models;

use Framework\Models\Model;
use Framework\Configs\Config;
use PHPShopify;
use Exception;

class Shop extends Model
{
    protected $table = "shop_auth";
    public $tableKey = "shop_name";

    public $config = null;

    private $shopify     = null;
    public $shop_name    = null;
    private $scopes      = null;
    private $redirectUrl = null;

    public function setup(Config $config, String $shop_name)
    {
        $this->setupRedirectUrl($config);
        $this->setupShopifyConfig($config);

        $this->shop_name = $shop_name;

        $this->getConfigWithoutToken();
        return $this;
    }

    private function setupRedirectUrl(Config $config)
    {
        $app_path = $config->getConfig("application")["app_path"];

        if($app_path !== null)
        {
            $this->redirectUrl = $app_path . "auth/callback";
        } else {
            throw new Exception("Could not find redirect path", 1);
        }
    }

    private function setupShopifyConfig(Config $config)
    {
        $this->config = $config->getConfig("shopify");
        if($this->config == null)
        {
            throw new Exception("Could not get the shopify config file", 1);
        }
    }

    public function getConfigWithoutToken($shop_name = null)
    {
        if($this->config["api_key"] !== null && $this->config["shared_secret"] !== null && $this->config["scopes"] !== null)
        {
            $this->scopes = $this->config["scopes"];
            $config = array(
                "ShopUrl"      => ($shop_name == null) ? $this->shop_name : $shop_name,
                "ApiKey"       => $this->config["api_key"],
                "SharedSecret" => $this->config["shared_secret"],
            );
        } else {
            throw new \Exception("Did not found the shopify config", 1);
        }

        $this->shopify = PHPShopify\ShopifySDK::config($config);
        return $this->shopify;
    }

    public function getConfigWithToken(String $shop_name = null, $token)
    {
        $config = array(
            "ShopUrl"     => ($shop_name == null) ? $this->shop_name : $shop_name,
            "AccessToken" => $token,
        );

        $this->shopify = PHPShopify\ShopifySDK::config($config);
        return $this->shopify;
    }

    public function getToken()
    {
        if($this->scopes !== null)
        {
            \PHPShopify\AuthHelper::createAuthRequest($this->scopes, $this->redirectUrl);
        } else {
            throw new Exception("Token was not found", 1);
        }
    }

    public function receiveCallback()
    {
        $this->getConfigWithoutToken();
        $token = PHPShopify\AuthHelper::getAccessToken();

        $this->saveNewShop($token);
    }

    private function saveNewShop(String $token)
    {
        if($this->shopIsUnique() == true)
        {
            $this->create([
                "shop_name"  => $this->shop_name,
                "shop_token" => $token
            ]);
        } else {
            $this->where("shop_name", "=", $this->shop_name)->update([
                "shop_token" => $token
            ]);
        }
    }

    private function shopIsUnique()
    {
        $shop = $this->getShopByName($this->shop_name);
        return ($shop == null) ? true : false;
    }

    public function shops()
    {
        return $this->selectAll();
    }

    public function getShopByName(String $shop_name)
    {
        return $this->where("shop_name", "=", $shop_name)->selectOne();
    }

    public function getApi(String $shop_name)
    {
        $shop = $this->getShopByName($shop_name);
        return $this->getConfigWithToken($shop->shop_name, $shop->shop_token);
    }

    /**
     *
     * @param shop_name as String
     * @return id of the main theme for a specific shop
     **/
    public function getMainThemeId(String $shop_name)
    {
        $api = $this->getApi($shop_name);
        $themes = $api->Theme->get();

        foreach($themes as $theme)
        {
            if($theme["role"] == "main")
            {
                return $theme["id"];
            }
        }
    }
}
