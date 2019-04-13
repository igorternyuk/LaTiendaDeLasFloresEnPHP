<?php
/* Smarty version 3.1.33, created on 2019-04-13 07:26:09
  from '/opt/lampp/htdocs/flower-shop.local/views/default/product2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb172f1be9164_06363690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e6fc19fe9a1bea82e0e173bc00b1b314739bafd' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/product2.tpl',
      1 => 1555133148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb172f1be9164_06363690 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div class="center_content">
    <div class="left_content">
      
        <div class="feat_prod_box_details">
            <div class="prod_img">
                <a href="#">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" width='100' alt="" border="0" />
                </a>
                <br />
              <br />
              <a href="<?php echo $_smarty_tpl->tpl_vars['currentProduct']->value['image'];?>
" rel="lightbox">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
images/zoom.gif" alt="" border="0" />
              </a>
            </div>

            <div class="clear"></div>
        </div>
      
      <div class="clear"></div>
    
    </div>
    <!--end of left content-->
    
    <!--end of right content-->
    <div class="clear"></div>
    
  </div>
  <!--end of center content-->
  
</div>

</body>

</html>
<?php }
}
