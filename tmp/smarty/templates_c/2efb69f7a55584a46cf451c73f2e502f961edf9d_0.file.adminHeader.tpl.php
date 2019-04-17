<?php
/* Smarty version 3.1.33, created on 2019-04-17 13:52:17
  from '/opt/lampp/htdocs/flower-shop.local/views/default/layouts/adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb71371c1c8b1_51874727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2efb69f7a55584a46cf451c73f2e502f961edf9d' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/layouts/adminHeader.tpl',
      1 => 1555501934,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb71371c1c8b1_51874727 (Smarty_Internal_Template $_smarty_tpl) {
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
        <li <?php if (isset($_smarty_tpl->tpl_vars['mainPageActive']->value)) {?>class="selected"<?php }?>><a href="/">Главная</a></li>
        <li <?php if (isset($_smarty_tpl->tpl_vars['catalogPageActive']->value)) {?>class="selected"<?php }?>><a href="/catalog">Каталог</a></li>
        <?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?>
            <li <?php if (isset($_smarty_tpl->tpl_vars['cabinetPageActive']->value)) {?>class="selected"<?php }?>><a href="/cabinet">Кабинет</a></li>
            <li><a href="#" onclick='logout(); return false;'>Выход</a></li>
        <?php } else { ?>
            <li <?php if (isset($_smarty_tpl->tpl_vars['registrationPageActive']->value)) {?>class="selected"<?php }?>><a href="/user/showRegisterForm">Регистрация</a></li>
            <li <?php if (isset($_smarty_tpl->tpl_vars['loginPageActive']->value)) {?>class="selected"<?php }?>><a href="/user/showLoginForm">Вход</a></li>
        <?php }?>
        <li <?php if (isset($_smarty_tpl->tpl_vars['abountPageActive']->value)) {?>class="selected"<?php }?>><a href="/about">О нас</a></li>
        <li <?php if (isset($_smarty_tpl->tpl_vars['contactPageActive']->value)) {?>class="selected"<?php }?>><a href="/contacts">Контакты</a></li>
        <li <?php if (isset($_smarty_tpl->tpl_vars['adminPageActive']->value)) {?>class="selected"<?php }?>><a href="/admin">Управление</a></li>
      </ul>
    </div>
  </div><?php }
}
