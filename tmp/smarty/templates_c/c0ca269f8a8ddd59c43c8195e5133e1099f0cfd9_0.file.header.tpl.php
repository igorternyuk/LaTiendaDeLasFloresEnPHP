<?php
/* Smarty version 3.1.33, created on 2019-04-13 18:23:03
  from '/opt/lampp/htdocs/flower-shop.local/views/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb20ce7926e65_73151865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0ca269f8a8ddd59c43c8195e5133e1099f0cfd9' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/header.tpl',
      1 => 1555172580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb20ce7926e65_73151865 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/lightbox.css" type="text/css" media="screen" />


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/prototype.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/scriptaculous.js?load=effects" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/lightbox.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/java.js" type="text/javascript" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/query-3.3.1.min.js" type="text/javascript" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/js/main.js" type="text/javascript" ><?php echo '</script'; ?>
>

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
        <?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?>
            <li><a href="/cabinet">Кабинет</a></li>
            <li><a href="/user/logout">Выход</a></li>
        <?php } else { ?>
            <li><a href="/user/showRegisterForm">Регистрация</a></li>
            <li><a href="/user/showLoginForm">Вход</a></li>
        <?php }?>
        <li><a href="/about">О нас</a></li>
        <li><a href="/contacts">Контакты</a></li>
      </ul>
    </div>
  </div><?php }
}
