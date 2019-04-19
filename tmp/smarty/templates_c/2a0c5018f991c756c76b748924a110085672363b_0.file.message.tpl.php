<?php
/* Smarty version 3.1.33, created on 2019-04-18 19:44:12
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/message.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb8b76ca75c32_70030110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a0c5018f991c756c76b748924a110085672363b' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/message.tpl',
      1 => 1555609444,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb8b76ca75c32_70030110 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content"> 
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Создание товара
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>          
      </div>
        <?php if (isset($_smarty_tpl->tpl_vars['success']->value) && $_smarty_tpl->tpl_vars['success']->value == true) {?>
            <span style="font-size: 16px; color:darkgreen"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
 <?php }?> </span>
        <?php } else { ?>
            <span style="font-size: 16px; color:red"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['message']->value;?>
 <?php }?> </span>
            <?php if (isset($_smarty_tpl->tpl_vars['errors']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error', false, NULL, 'errors', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_errors']->value['iteration']++;
?>
                <p><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_errors']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_errors']->value['iteration'] : null);?>
<span style='color:red;' ><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></p>
                <br />
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
        <?php }?>
        <a href="/admin/products">Назад</a>        
        <div class="clear"></div>
    </div><?php }
}
