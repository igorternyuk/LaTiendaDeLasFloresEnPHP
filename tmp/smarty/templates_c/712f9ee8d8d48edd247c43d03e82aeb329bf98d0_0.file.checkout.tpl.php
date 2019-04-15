<?php
/* Smarty version 3.1.33, created on 2019-04-15 16:46:28
  from '/opt/lampp/htdocs/flower-shop.local/views/default/cart/checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb49944748020_38278320',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '712f9ee8d8d48edd247c43d03e82aeb329bf98d0' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/cart/checkout.tpl',
      1 => 1555339586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb49944748020_38278320 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Оформление заказа</div>
      <div class="feat_prod_box_details">
        <p class="details"> Заполните форму </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Параметры заказа</div>
          <form id="checkOutForm" name="checkOutForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>Имя получателя:</strong></label>
              <input type="text" id="email" name="username" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['name'];?>
 <?php }?>" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон получателя:</strong></label>
              <input type="text" id="phone" name="phone" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['phone'];?>
 <?php }?>" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес получателя:</strong></label>
              <input type="text" id="address" name="address" class="contact_input" value="<?php if (isset($_smarty_tpl->tpl_vars['loggedUser']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['address'];?>
 <?php }?>" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Комментарий:</strong></label>
              <textarea id="comment" name="comment" class="contact_textarea" ></textarea>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="Заказать" onclick='saveorder();'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
