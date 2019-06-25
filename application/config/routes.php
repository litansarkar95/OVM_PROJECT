<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = 'page_not_found';
$route['translate_uri_dashes'] = FALSE;
$route['politacal-party'] = 'party_list/politacal_party';
$route['logout'] = 'login/logout';


$arr = array(
    "brand_management" => "brand-management",
    "national_parliament_election" => "national-parliament-election",
    
);

foreach ($arr as $key => $value) {
    $route["{$value}"] = "{$key}";
    $route["{$value}/insert"] = "{$key}/insert";
    $route["{$value}/view"] = "{$key}/view";
    $route["{$value}/delete/(:num)"] = "{$key}/delete/$1";
    $route["{$value}/edit/(:num)"] = "{$key}/edit/$1";
    $route["{$value}/update"] = "{$key}/update";
}

function ReplaceR($data) {
    $data = trim($data);
    $data = str_replace("'", "", $data);
    $data = str_replace("!", "", $data);
    $data = str_replace("@", "", $data);
    $data = str_replace("#", "", $data);
    $data = str_replace("$", "", $data);
    $data = str_replace("%", "", $data);
    $data = str_replace("^", "", $data);
    $data = str_replace("&", "", $data);
    $data = str_replace("*", "", $data);
    $data = str_replace("(", "", $data);
    $data = str_replace(")", "", $data);
    $data = str_replace("+", "", $data);
    $data = str_replace("=", "", $data);
    $data = str_replace(",", "", $data);
    $data = str_replace(":", "", $data);
    $data = str_replace(";", "", $data);
    $data = str_replace("|", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace('"', "", $data);
    $data = str_replace("?", "", $data);
    $data = str_replace("'", "", $data);
    $data = str_replace(".", "-", $data);
    $data = strtolower(str_replace("  ", "-", $data));
    $data = strtolower(str_replace(" ", "-", $data));
    $data = strtolower(str_replace("__", "-", $data));
    $data = strtolower(str_replace("_", "-", $data));
    $data = strtolower(str_replace("--", "-", $data));
    return $data;
}

