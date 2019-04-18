<?php
/* Smarty version 3.1.33, created on 2019-04-17 17:43:25
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb7499d467cf7_42904358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bf9dadac49b164771115e5e3313b40b6edacafb' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/index.tpl',
      1 => 1555513363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb7499d467cf7_42904358 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Управление заказами
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        <?php if (count($_smarty_tpl->tpl_vars['orders']->value) > 0) {?>
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Дата оформления</th>
            <th>Дата изменения</th>
            <th>Имя клиента</th>
            <th>Статус</th>
            <th colspan="2">Дейтсвие</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
            <tr>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_updated'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['status_description'];?>
</td>
              <td>
                  <a id="viewOrder_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" href='/admin/order/view/<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
'>
                      Просмореть
                  </a>
              </td>
              <td>
                  <a id="viewOrder_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" href='/admin/order/update/<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
'>
                      Обновить
                  </a>
              </td>
            </tr>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
          <span><?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
</span>
          <?php } else { ?>
              <h4>Нет заказов</h4>
          <?php }?>
          
      </div>
      <div class="clear"></div>
    </div><?php }
}
