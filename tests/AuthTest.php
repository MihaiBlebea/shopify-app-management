<?php

use PHPUnit\Framework\TestCase;
use App\Models\Shop;
use Framework\Configs\Config;

final class AuthTest extends TestCase
{
    public function testShopNameInsertedInSetupMethodComesOutTheSame()
    {
        $shop = new Shop();

        dd($shop);
        $shop_name = "mihaidev.shopify.com";
        $shop->setup($config, $shop_name);

        $this->assertEquals($shop->shop_name, $shop_name);
    }
}
