<?php
/* Smarty version 3.1.33, created on 2019-04-17 13:06:52
  from '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/history.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb708ccdc5aa7_16148881',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08c972d7ca3dbc01bcf38be104be9261cf15121f' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/history.tpl',
      1 => 1555499208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb708ccdc5aa7_16148881 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a>
            &gt;&gt;
            <a href="/cabinet">Личный кабинет</a>
            &gt;&gt;
            История заказов 
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        <?php if (count($_smarty_tpl->tpl_vars['userOrders']->value) > 0) {?>
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Дата оформления</th>
            <th>Дата изменения</th>
            <th>Дата оплаты</th>
            <th>Имя клиента</th>
            <th>Сумма</th>
            <th>Статус</th>
            <th>Дейтсвие</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userOrders']->value, 'order');
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
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['username'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['total'];?>
 грн.</td>
              <td><?php echo $_smarty_tpl->tpl_vars['order']->value['status_description'];?>
</td>
              <td>
                  <a id="toggleProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" href='#' onclick="toggleOrderProductsView(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
); return false;">
                      Показать товары
                  </a>
              </td>
            </tr>
            <tr id="orderProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" style="display: none;">
                <td colspan='7'>
                    <table>
                        <tr>
                            <th>№</th>
                            <th>ID товара</th>
                            <th>Название</th>
                            <th>Код товара</th>
                            <th>Цена за единицу</th>
                            <th>Количество</th>
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
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['product_price'];?>
 грн.</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</td>
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
