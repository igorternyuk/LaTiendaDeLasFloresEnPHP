<?php
/* Smarty version 3.1.33, created on 2019-04-17 13:42:31
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/rightColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb711275926d1_66317010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62d69916977db2ce7399778d89346a8a8b644383' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/rightColumn.tpl',
      1 => 1555501299,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb711275926d1_66317010 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right_content"> 
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
