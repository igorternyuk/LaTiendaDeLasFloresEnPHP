<?php
/* Smarty version 3.1.33, created on 2019-04-12 16:40:19
  from '/opt/lampp/htdocs/flower-shop.local/views/default/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb0a3532a8a90_29466685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0393f8bfaf5f44378f85bb58addbba00defe5b4d' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/category.tpl',
      1 => 1555079987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb0a3532a8a90_29466685 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; <?php echo $_smarty_tpl->tpl_vars['categoryName']->value;?>
 </div>
      
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
          Каталог
      </div>
      
      <div class="pagination">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['letterReferences']->value, 'ref', false, 'letter');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['letter']->value => $_smarty_tpl->tpl_vars['ref']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['letter']->value == $_smarty_tpl->tpl_vars['currentLetter']->value) {?>
                <span class="current"><?php echo $_smarty_tpl->tpl_vars['currentLetter']->value;?>
</span>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['ref']->value;?>

            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['letter']->value == 'm') {?>
                <br /><br />
            <?php }?>
       <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
      
      <div class="new_products">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['latestProducts']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <div class="new_prod_box"> 
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
&nbsp;грн.
                </a>
                <div class="new_prod_bg">
                    <?php if ($_smarty_tpl->tpl_vars['product']->value['is_new']) {?>
                        <span class="new_icon">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/new_icon.gif" alt="" />
                        </span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['product']->value['discount']) {?>
                        <span class="new_icon">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/promo_icon.gif" alt="" />
                        </span>
                    <?php }?>
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
      
      <div><?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
</div>
      <div class="clear"></div>
    </div><?php }
}
