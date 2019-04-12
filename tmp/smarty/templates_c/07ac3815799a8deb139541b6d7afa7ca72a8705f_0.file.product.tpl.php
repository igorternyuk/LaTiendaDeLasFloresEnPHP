<?php
/* Smarty version 3.1.33, created on 2019-04-12 11:59:45
  from '/opt/lampp/htdocs/flower-shop.local/views/default/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb06191ae0787_20120627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '07ac3815799a8deb139541b6d7afa7ca72a8705f' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/product.tpl',
      1 => 1555063181,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb06191ae0787_20120627 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
      <div class="crumb_nav"> <a href="/">Главная</a> &gt;&gt; <?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['name'];?>
 </div>
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['name'];?>
</div>
      <div class="feat_prod_box_details">
       <!-- <div class="prod_img">
            <a href="/product/<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['id'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" width='120' alt="" border="0" />
            </a>
            <br />
          <br />
          <a href="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" rel="lightbox">
              <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/zoom.gif" alt="" border="0" />
          </a>
          
        </div> -->
          <div class="prod_img">
              <a href="http://all-free-download.com/free-website-templates/">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/prod1.gif" alt="" border="0" />
              </a>
              <br />
          <br />
          <a href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/big_pic.jpg" rel="lightbox">
              <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/zoom.gif" alt="" border="0" />
          </a>
          </div>
          
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <div class="prod_title">Описание:</div>
            <p class="details"><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['description'];?>
</p>
            <div class="price">
                <strong>Цена:</strong>
                <span class="red"><?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['price'];?>
&nbsp;грн.</span>
            </div>
            <div class="price">
                <span><input type="submit" class="register" value="В корзину" /></span>
            </div>
            <!--<a href="" class="more">
                <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/order_now.gif" alt="" border="0" />
            </a> -->
                        
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
            <p class="more_details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
            
            <p class="more_details">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. </p>
          </div>
          <div style="display: none;" class="tab" id="tab2">
              
              <div class="new_prod_box">
                <a href="http://all-free-download.com/free-website-templates/">
                    product name
                </a>
                <div class="new_prod_bg">
                    <a href="http://all-free-download.com/free-website-templates/">
                        <img src="images/thumb1.gif" alt="" class="thumb" border="0" />
                    </a>
                </div>
                  
              </div>
            
            <div class="clear"></div>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
