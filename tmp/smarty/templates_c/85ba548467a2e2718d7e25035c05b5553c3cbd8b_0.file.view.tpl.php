<?php
/* Smarty version 3.1.33, created on 2019-04-17 17:17:26
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb74386ab3063_44737260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85ba548467a2e2718d7e25035c05b5553c3cbd8b' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/orders/view.tpl',
      1 => 1555514167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb74386ab3063_44737260 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
       <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/order/page-1">Управление заказами</a> &gt;&gt;
            Просмотр данных о заказе
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        <?php if (isset($_smarty_tpl->tpl_vars['order']->value)) {?>
        <table class="cart_table">
            <tr>
              <th>ID заказа:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
            </tr>
            
            <tr>
              <th>Дата оформления:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</td>
            </tr>
            
            <tr>
              <th>Дата обновления:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_updated'];?>
</td>
            </tr>
            
            <tr>
              <th>Дата оплаты:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
</td>
            </tr>
            
            <tr>
              <th>Имя заказчика:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
</td>
            </tr>
            
            <tr>
              <th>Адресс заказчика:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['useraddress'];?>
</td>
            </tr>
            
            <tr>
              <th>Телефон заказчика:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['userphone'];?>
</td>
            </tr>
            
            <tr style="color: red;">
              <th>Сумма заказа:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['total'];?>
 грн.</td>
            </tr>
            
            <tr>
              <th>Комментарий:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['comment'];?>
</td>
            </tr>
            
            <tr>
              <th>Статус заказа:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['status_description'];?>
</td>
            </tr>
            
            <tr>
                <th colspan="2" style="color: blue; font-size: 16px;">Товары заказа:</th>
            </tr>
            
            <tr id="orderProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" >
                <td colspan='6'>
                    <table>
                        <tr>
                            <th>№</th>
                            <th>ID товара</th>
                            <th>Название</th>
                            <th>Код товара</th>
                            <th>Цена за единицу х Количество = </th>
                            <th>Итого</th>
                        </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value['items'], 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
                        <tr>
                            <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
</td>
                            <td><a href='/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['product_id'];?>
'><?php echo $_smarty_tpl->tpl_vars['item']->value['product_name'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_code'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
 х <?php echo $_smarty_tpl->tpl_vars['item']->value['product_price'];?>
 грн.</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['subtotal'];?>
 грн.</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                </td>
            </tr>
          </table>
          <?php } else { ?>
              <h4>Нет заказов</h4>
          <?php }?>
          
      </div>
      <div class="clear"></div>
    </div><?php }
}
