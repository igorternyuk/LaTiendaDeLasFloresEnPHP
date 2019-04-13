<?php
/* Smarty version 3.1.33, created on 2019-04-13 18:00:26
  from '/opt/lampp/htdocs/flower-shop.local/views/default/cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb2079ae3b439_73473798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8aafeecff2f0d8f6f1883977bf4d0f1eb3df5c7' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/cart.tpl',
      1 => 1555160435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb2079ae3b439_73473798 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; category name </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Корзина
      </div>
        
      <div class="feat_prod_box_details">
        <?php if (count($_smarty_tpl->tpl_vars['productsInCart']->value) > 0) {?>
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID товара</th>
            <th>Название</th>
            <!--th>Код товара</th-->
            <th>Изображение</th>
            <th>Цена за единицу</th>
            <th>Количество</th>
            <th>Итого</th>
            <th>Дейтсвие</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productsInCart']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <tr id="productRow_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
              <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a></td>
              <!--td><?php echo $_smarty_tpl->tpl_vars['product']->value['code'];?>
</td-->
              <td>
                  <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='85' alt="" border="0" class="cart_thumb" />
                  </a>
              </td>              
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
              <td width='60' >
                  <input width='50' id="productCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"
                         name="productCount_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" type='number' min=0 max='<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
'
                         value="<?php echo $_smarty_tpl->tpl_vars['product']->value['count'];?>
"
                                    onchange="updateProductCount(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
);"
                  >
                  
              </td>
              <td>
                  <span  id="subtotal_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" name="subtotal_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['product']->value['subtotal'];?>

                  </span> грн.
              </td>
              <td><a href='#' onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
); return false;">Удалить</a></td>
            </tr>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          
          <tr>
            <td colspan="6" class="cart_total">
                <span class="red">Сумма заказа:</span>
            </td>
            <td>
                <span id="cartTotalSumInTable" name='cartTotalSumInTable'>
                    <?php echo $_smarty_tpl->tpl_vars['cartTotalSum']->value;?>

                </span> грн.
            </td>
          </tr>
        </table>
            <a href="/catalog" class="continue">
                &lt; Назад
            </a>
          <a href="/order/checkout" class="checkout">
              Заказать &gt;
          </a>
        <?php } else { ?>
            <h3>Ваша корзина пуста.</h3>
        <?php }?>
          
      </div>
      <div class="clear"></div>
    </div><?php }
}
