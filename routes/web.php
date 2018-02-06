<?php

$this->group([
    "name" => "install-group",
    "prefix" => "install"
]);


$this->get("home", "App\\Controllers\\IndexController@index");

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
