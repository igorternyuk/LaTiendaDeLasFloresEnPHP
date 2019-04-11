<?php
/* Smarty version 3.1.33, created on 2019-04-11 18:52:33
  from '/opt/lampp/htdocs/flower-shop.local/views/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5caf70d1c81862_93777525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0ca269f8a8ddd59c43c8195e5133e1099f0cfd9' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/header.tpl',
      1 => 1555001539,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caf70d1c81862_93777525 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Олюсин магазин</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/style.css" />
</head>
<body>
    
<div id="wrap">
  <div class="header">
    <div class="logo"><a href="/"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/logo.gif" alt="" border="0" /></a></div>
    <div id="menu">
      <ul>
        <li class="selected"><a href="/">Главная</a></li>
        <li><a href="/catalog">Каталог</a></li>
        <li><a href="/user/register">Регистрация</a></li>
        <li><a href="/user/login">Вход</a></li>
        <li><a href="/cabinet">Кабинет</a></li>
        <li><a href="/about">Про нас</a></li>
        <li><a href="/contacts">Контакты</a></li>
      </ul>
    </div>
  </div><?php }
}
