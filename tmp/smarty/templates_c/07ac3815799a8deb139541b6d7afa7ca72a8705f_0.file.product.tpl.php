<?php
/* Smarty version 3.1.33, created on 2019-04-19 16:12:46
  from '/opt/lampp/htdocs/flower-shop.local/views/default/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb9d75ee6a522_96298389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07ac3815799a8deb139541b6d7afa7ca72a8705f' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/product.tpl',
      1 => 1555682125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb9d75ee6a522_96298389 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="crumb_nav"> <a href="/">Главная</a> &gt;&gt; <?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['name'];?>
 </div>
      <div class="title">
          <span class="title_icon">
              <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/bullet1.gif" alt="" />
          </span><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['name'];?>
</div>
      <div class="feat_prod_box_details">
       <div class="prod_img">
            <a href="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" rel="lightbox">
                <img src="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" width='150' alt="" border="0" />
            </a>
            <br />
            <br />         
        </div>       
          
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
                        <div class="price">
                <strong>Код товара:</strong>
                <span class="red"><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['code'];?>
</span>
            </div>
            <div class="price">
                <strong>Цена:</strong>
                <span class="red"><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['price'];?>
&nbsp;грн.</span>
            </div>
            <div class="price">
                <strong>В наличии:</strong>
                <span class="red"><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['stock'];?>
&nbsp;шт.</span>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['currentProduct']->value['is_new']) {?>
                <div class="price">
                    <strong>Новинка</strong>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['currentProduct']->value['is_recommended']) {?>
                <div class="price">
                    <strong>Рекомендуемый</strong>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['currentProduct']->value['discount']) {?>
                <div class="price">
                    <strong>Есть скидка <?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['discount'];?>
%</strong>
                </div>
            <?php }?>
            <div class="price">
                <span>
                    <input type="button" class="register" value="В корзину"
                           onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['id'];?>
);"/>
                </span>
            </div>
            <div class="clear"></div>
          </div>
            <div class="box_bottom">
                
            </div>
        </div>
        <div class="clear"></div>
        
      </div>
            
      <div id="demo" class="demolayout">
        <ul id="demo-nav" class="demolayout">
          <li><a class="active" href="#tab1">Подробнее</a></li>
          <li><a class="" href="#tab2">Подобные товары</a></li>
        </ul>
        <div class="tabs-container">
          <div style="display: block;" class="tab" id="tab1">
            <p class="more_details">
                <?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['description'];?>

            </p>
          </div>
          <div style="display: none;" class="tab" id="tab2">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['similarProducts']->value, 'similarProduct');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['similarProduct']->value) {
?>
                <div class="new_prod_box">
                  <a href="/product/<?php echo $_smarty_tpl->tpl_vars['similarProduct']->value['id'];?>
">
                      <?php echo $_smarty_tpl->tpl_vars['similarProduct']->value['name'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['similarProduct']->value['price'];?>
&nbsp;грн.
                  </a>
                  <div class="new_prod_bg">
                      <a href="/product/<?php echo $_smarty_tpl->tpl_vars['similarProduct']->value['id'];?>
">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['similarProduct']->value['image'];?>
" width='100' alt="" class="thumb" border="0" />
                      </a>
                  </div>

                </div>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            
            <div class="clear"></div>
          </div>
        </div>
      </div>     
      <div class="clear"></div>
    </div><?php }
}
