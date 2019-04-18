<?php
/* Smarty version 3.1.33, created on 2019-04-17 18:51:45
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb759a10cd6b0_93331903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '407da54194c927ac1a78f9c1b64c0bc80592adbe' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/edit.tpl',
      1 => 1555519824,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb759a10cd6b0_93331903 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/order/page-1">Управление заказами</a> &gt;&gt;
            Редактирование заказа
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Редактирование заказа</div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование заказа </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Редактирование заказа</div>
          <form id="editOrderForm" name="editOrderForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>ID Заказа:</strong></label>
              <input type="text" id="orderId" name="orderId" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" class="contact_input" readonly/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Дата:</strong></label>
              <input type="datetime" id="paymentDate" name="paymentDate" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
" class="contact_input" required/>
            </div>
            
            <div class="form_row">
              <select id="orderStatus" name="orderStatus">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderStatusOptions']->value, 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                  <option value='<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
' <?php if ($_smarty_tpl->tpl_vars['order']->value['status'] == $_smarty_tpl->tpl_vars['option']->value['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['description'];?>
</option>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
              
            <div class="form_row">
                <input type="button" class="register" value="Обновить" onclick='updateOrder(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
)'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
