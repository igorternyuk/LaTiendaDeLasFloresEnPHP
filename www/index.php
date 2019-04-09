<?php 
session_start(); //starts the session
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require_once ("../config/config.php");
require_once ("../components/Autoload.php");
require_once ("../components/Router.php");

//Utils::debug($smarty);
$router = new Router($smarty);
$router->run();