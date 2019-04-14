<?php
/* Smarty version 3.1.33, created on 2019-04-13 18:23:44
  from '/opt/lampp/htdocs/flower-shop.local/views/default/user/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb20d10998463_49033897',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1aafa799541d2cf4421c033177f76a3f44fb0516' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/user/login.tpl',
      1 => 1555172224,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb20d10998463_49033897 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Авторизация</div>
      <div class="feat_prod_box_details">
        <p class="details"> Вход на сайт </p>
        <div class="contact_form">
          <div class="form_subtitle">Вход в личный кабинет</div>
          <form name="register" href="#">
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" class="contact_input" />
            </div>
              <div class="form_row">
              <label class="contact"><strong>Пароль:</strong></label>
              <input type="password" id="pwd1" name="pwd" class="contact_input" />
            </div>
            <div class="form_row">
              <input type="submit" class="register" value="Войти" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
