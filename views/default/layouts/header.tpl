<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$pageTitle}</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{$templateWebPath}css/style.css" type="text/css" />
<link rel="stylesheet" href="{$templateWebPath}css/lightbox.css" type="text/css" media="screen" />


<script src="{$templateWebPath}js/prototype.js" type="text/javascript"></script>
<script src="{$templateWebPath}js/scriptaculous.js?load=effects" type="text/javascript"></script>
<script src="{$templateWebPath}js/lightbox.js" type="text/javascript"></script>
<script src="{$templateWebPath}js/java.js" type="text/javascript" ></script>
<script src="/js/query-3.3.1.min.js" type="text/javascript" ></script>
<script src="/js/main.js" type="text/javascript" ></script>

</head>
<body>
    
<div id="wrap">
  <div class="header">
    <div class="logo"><a href="/"><img src="{$templateWebPath}images/logo.gif" alt="" border="0" /></a></div>
    <div id="menu">
      <ul>
        <li class="selected"><a href="/">Главная</a></li>
        <li><a href="/catalog">Каталог</a></li>
        {if isset($loggedUser) }
            <li><a href="/cabinet">Кабинет</a></li>
            <li><a href="#" onclick='logout(); return false;'>Выход</a></li>
        {else}
            <li><a href="/user/showRegisterForm">Регистрация</a></li>
            <li><a href="/user/showLoginForm">Вход</a></li>
        {/if}
        <li><a href="/about">О нас</a></li>
        <li><a href="/contacts">Контакты</a></li>
      </ul>
    </div>
  </div>