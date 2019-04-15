<?php
/* Smarty version 3.1.33, created on 2019-04-15 11:27:16
  from '/opt/lampp/htdocs/flower-shop.local/views/default/user/register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb44e74f1bc14_37021441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1235cff8a8b9a334bd3ef637ffbc218e9e992255' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/user/register.tpl',
      1 => 1555315452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb44e74f1bc14_37021441 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
         Регистрация
      </div>
      <div class="feat_prod_box_details">
        <p class="details"> Для регистрации заполните, пожалуйста, форму </p>
        <span id="errors"></span>
        <br />
        <div class="contact_form">
          <div class="form_subtitle">Создать новую учетную запись</div>
          <form id="registerForm" name="registerForm" href="#" method="post">
            <div class="form_row">
              <label class="contact"><strong>Имя:</strong></label>
              <input type="text" id="username" name="username" class="contact_input" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Пароль:</strong></label>
              <input type="password" id="pwd1" name="pwd1" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Повторите пароль:</strong></label>
              <input type="password" id="pwd2" name="pwd2" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон:</strong></label>
              <input type="text" id="userphone" name="userphone" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес:</strong></label>
              <input type="text" id="useraddress" name="useraddress" class="contact_input"  required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="ОК" onclick="register(); return false;"/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
