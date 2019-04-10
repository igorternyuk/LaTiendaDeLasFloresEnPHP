<?php

$template = 'default';
define('TemplatePrefix', "../views/{$template}/");
#define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', ".tpl");
define('TemplateWebPath',"/templates/{$template}/");
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PathToProductImages', "/upload/images/product/");
define('NoImage', "no-image.jpg");
include_once '../components/Utils.php';
require '../library/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');
$smarty->assign('templateWebPath', TemplateWebPath);
$smarty->assign('PathToProductImages', PathToProductImages);
//Utils::debug($smarty);
/*
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');


//Used template

$templateAdmin = 'admin';

//Preffix and suffix for template pathes
define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', ".tpl");

define('TemplateWebPath',"/templates/{$template}/");
define('TemplateAdminWebPath',"/templates/{$templateAdmin}/");
define('MaxImageFileSize', 1 * 1024 * 1024);
define('ImageExtensions', ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tif']);

require '../library/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');
$smarty->assign('templateWebPath', TemplateWebPath);


*/
