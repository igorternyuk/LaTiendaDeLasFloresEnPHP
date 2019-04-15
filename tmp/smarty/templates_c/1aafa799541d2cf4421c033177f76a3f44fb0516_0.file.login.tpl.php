<?php
/* Smarty version 3.1.33, created on 2019-04-15 10:14:21
  from '/opt/lampp/htdocs/flower-shop.local/views/default/user/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb43d5d2d82f8_53786880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1aafa799541d2cf4421c033177f76a3f44fb0516' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/user/login.tpl',
      1 => 1555314793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb43d5d2d82f8_53786880 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Авторизация</div>
      <div class="feat_prod_box_details">
        <p class="details"> Вход на сайт </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Вход в личный кабинет</div>
          <form id="loginForm" name="loginForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input" required/>
            </div>
              <div class="form_row">
              <label class="contact"><strong>Пароль:</strong></label>
              <input type="password" id="password" name="password" class="contact_input" required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="Войти" onclick='login();'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
