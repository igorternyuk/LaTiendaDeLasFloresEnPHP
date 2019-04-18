<?php
/* Smarty version 3.1.33, created on 2019-04-17 16:44:46
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb73bdea17e72_70652537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba79be445e51b3fdfa0dcd23c219cd6a6af6d6d5' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/index.tpl',
      1 => 1555512279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb73bdea17e72_70652537 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content"> 
        <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; Админка </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Панель администратора <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['name'];?>

      </div>
        
      <div class="feat_prod_box_details">
        <a href='/admin/category/page-1'>Управление категориями</a>
        <br />
        <a href='/admin/product/page-1'>Управление товарами</a>
        <br />
        <a href='/admin/order/page-1'>Управление заказами</a>  
      </div>
      <div class="clear"></div>
    </div>
<?php }
}
