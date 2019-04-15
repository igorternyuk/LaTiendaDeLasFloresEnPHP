<?php
/* Smarty version 3.1.33, created on 2019-04-15 11:24:27
  from '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb44dcb322972_54689537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c524fe5d0f8f6deee4368a75930c55a4f1b7d5' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/edit.tpl',
      1 => 1555318674,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb44dcb322972_54689537 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a>
            &gt;&gt;
            <a href="/cabinet">Личный кабинет</a>
            &gt;&gt;
            Редактирование профиля
        </div>
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
         Редактирование профиля
      </div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование профиля </p>
        <span id="errors"></span>
        <br />
        <div class="contact_form">
          <div class="form_subtitle">Ректирование данных профиля</div>
          <form id="userEditForm" name="userEditForm" href="#" method="post">
            <div class="form_row">
              <label class="contact"><strong>Имя:</strong></label>
              <input type="text" id="username" name="username" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['name'];?>
 <?php }?>" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Новый пароль:</strong></label>
              <input type="password" id="pwd1" name="pwd1" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Повторите новый пароль:</strong></label>
              <input type="password" id="pwd2" name="pwd2" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['email'];?>
 <?php }?>" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон:</strong></label>
              <input type="text" id="phone" name="phone" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['phone'];?>
 <?php }?>"  />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес:</strong></label>
              <input type="text" id="address" name="address" class="contact_input"  value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['address'];?>
 <?php }?>" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Текущий пароль:</strong></label>
              <input type="password" id="currentPassword" name="currentPassword" class="contact_input"  required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="ОК" onclick="updateUser(); return false;"/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
