<?php
/* Smarty version 3.1.33, created on 2019-04-11 18:50:42
  from '/opt/lampp/htdocs/flower-shop.local/views/default/rightColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5caf7062de1b82_48714847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '397cf2f43fd23510e0e8894b89b355deeb555060' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/rightColumn.tpl',
      1 => 1555001438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5caf7062de1b82_48714847 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right_content">
      <div class="languages_box"> <span class="red">Languages:</span> <a href="http://all-free-download.com/free-website-templates/" class="selected"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/gb.gif" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/fr.gif" alt="" border="0" /></a> <a href="http://all-free-download.com/free-website-templates/"><img <?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/de.gif" alt="" border="0" /></a> </div>
      <div class="currency"> <span class="red">Currency: </span> <a href="http://all-free-download.com/free-website-templates/">GBP</a> <a href="http://all-free-download.com/free-website-templates/">EUR</a> <a href="http://all-free-download.com/free-website-templates/" class="selected">USD</a> </div>
      <div class="cart">
        <div class="title"><span class="title_icon"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/cart.gif" alt="" /></span>Корзина</div>
        <div class="home_cart_content"> 3 x товаров | <span class="red">TOTAL: 100$</span> </div>
        <a href="cart.html" class="view_cart">view cart</a> </div>
      <div class="title"><span class="title_icon"><img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet3.gif" alt="" /></span>О нашем магазине</div>
      <div class="about">
        <p> <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/about.gif" alt="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
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
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['category']->value['children'] != false) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
                <li ><a class="sub" href="/catalog/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></li>
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
