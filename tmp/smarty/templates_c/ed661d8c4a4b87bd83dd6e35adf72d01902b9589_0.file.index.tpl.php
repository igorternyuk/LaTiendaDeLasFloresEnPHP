<?php
/* Smarty version 3.1.33, created on 2019-04-10 17:47:29
  from '/opt/lampp/htdocs/flower-shop.local/views/default/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cae1011013af4_62682386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed661d8c4a4b87bd83dd6e35adf72d01902b9589' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/index.tpl',
      1 => 1554911247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cae1011013af4_62682386 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div class="center_content">
    <div class="left_content">
      <div class="title">
          <span class="title_icon">
              <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet1.gif" alt="" />
          </span>
          Рекоммендуемые товары
      </div>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recommendedProducts']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
        <div class="feat_prod_box">
          <div class="prod_img">
              <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='120' alt="" border="0" />
              </a></div>
          <div class="prod_det_box">
            <div class="box_top"></div>
            <div class="box_center">
              <div class="prod_title">
                  <a href='product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
' style='font-size: 18px;'>
                      <?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
 
                  </a>
                  <span style='font-size: 18px;'>&nbsp;Цена: <?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
&nbsp;грн.</span>
              </div>
              <p class="details"><?php echo $_smarty_tpl->tpl_vars['product']->value['short_description'];?>
</p>
              <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="more">- Подробнее -</a>
              <div class="clear"></div>
            </div>
            <div class="box_bottom"></div>
          </div>
          <div class="clear"></div>
        </div>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      
      <div class="title"><span class="title_icon"><img <?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet2.gif" alt="" /></span>Новинки</div>
      
      <!-- Новинки -->
      <div class="new_products">
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newProducts']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
          <div class="new_prod_box"> <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</a>
            <div class="new_prod_bg">
                <span class="new_icon">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/new_icon.gif" alt="" />
                </span>
                <a href="product/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
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
        
      <div class="clear"></div>
    </div>
<?php }
}
