<?php
/* Smarty version 3.1.33, created on 2019-04-19 16:35:28
  from '/opt/lampp/htdocs/flower-shop.local/views/default/rightColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb9dcb1007278_71918398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '397cf2f43fd23510e0e8894b89b355deeb555060' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/rightColumn.tpl',
      1 => 1555684460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb9dcb1007278_71918398 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right_content">
        <div class="cart">
            <div class="title">
                <span class="title_icon">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/cart.gif" alt="" />
                </span>
                <a href='/cart'>Корзина</a>
            </div>
        <div class="home_cart_content"> Товаров: <span id="cartTotalItems" name="cartTotalItems"><?php echo $_smarty_tpl->tpl_vars['cartTotalItems']->value;?>
</span> | <span class="red">Сумма:<span id="cartTotalSum" name="cartTotalSum" class="red"><?php echo $_smarty_tpl->tpl_vars['cartTotalSum']->value;?>
</span>&nbsp;грн.</span> </div>
        </div>
        
      <div class="title"><span class="title_icon"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet3.gif" alt="" /></span>О нашем магазине</div>
      <div class="about">
        <p> <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/about.gif" alt="" class="right" />
            <span style='font-size: 16px'><?php echo $_smarty_tpl->tpl_vars['aboutShopInfo']->value['content'];?>
</span>
        </p>
      </div>
      <div class="right_box">
        <div class="title">
            <span class="title_icon">
                <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet4.gif" alt="" />
            </span>
            Товары со скидками
        </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productsWithDiscount']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
        <div class="new_prod_box"> <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
          <div class="new_prod_bg">
              <span class="new_icon">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/promo_icon.gif" alt="" />
              </span>
              <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='90' alt="" class="thumb" border="0" />
              </a>
          </div>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet5.gif" alt="" /></span>Категории</div>
        <ul class="list">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCategories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
              <li ><a href="/catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
(<?php echo $_smarty_tpl->tpl_vars['category']->value['count'];?>
)</a></li>
            <?php if ($_smarty_tpl->tpl_vars['category']->value['children'] != false) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
                <li ><a class="sub" href="/catalog/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
(<?php echo $_smarty_tpl->tpl_vars['child']->value['count'];?>
)</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
      </div>
    </div><?php }
}
