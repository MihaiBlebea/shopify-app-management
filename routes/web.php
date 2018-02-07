<?php

$this->group([
    "name" => "install-group",
    "prefix" => "install"
]);

$this->group([
    "name" => "charge-group",
    "prefix" => "charge"
]);


$this->get("home", "App\\Controllers\\IndexController@index");


/**
 * This group is responsible for installing the app
 * and all it's dependencies and also auth jobs
 *
 */
$this->get("auth", "App\\Controllers\\AuthController@index")
     ->belongsTo("install-group");

$this->get("auth/callback", "App\\Controllers\\AuthController@callback")
     ->belongsTo("install-group");

$this->get("assets", "App\\Controllers\\AuthController@getTheme")
     ->belongsTo("install-group");

$this->get("asset", "App\\Controllers\\AuthController@installSnippet")
     ->belongsTo("install-group");

$this->get("script-tags", "App\\Controllers\\AuthController@getScriptTags")
     ->belongsTo("install-group");

$this->get("add-script-tag", "App\\Controllers\\AuthController@addScriptTag")
     ->belongsTo("install-group");

/**
 * This group is responsible for charging the shops
 * on a monthly basics or just one time
 *
 */
$this->get("one-time", "App\\Controllers\\ChargeController@oneTimeCharge")
     ->belongsTo("charge-group");

$this->get("recurring", "App\\Controllers\\ChargeController@recurringCharge")
     ->belongsTo("charge-group");

$this->get("usage", "App\\Controllers\\ChargeController@usageCharge")
     ->belongsTo("charge-group");

$this->get("callback", "App\\Controllers\\ChargeController@chargeCallback")
     ->belongsTo("charge-group");

$this->get("get-all-recurring", "App\\Controllers\\ChargeController@getAllRecurringCharges")
     ->belongsTo("charge-group");

$this->get("activate-recurring/:id", "App\\Controllers\\ChargeController@activateRecurringCharge")
     ->belongsTo("charge-group");
