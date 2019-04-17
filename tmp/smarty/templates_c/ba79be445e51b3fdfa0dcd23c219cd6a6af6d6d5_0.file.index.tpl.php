<?php
/* Smarty version 3.1.33, created on 2019-04-17 13:46:44
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb71224920047_29786033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba79be445e51b3fdfa0dcd23c219cd6a6af6d6d5' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/index.tpl',
      1 => 1555501598,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb71224920047_29786033 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content"> 
        <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; Админка </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Панель администратора <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['name'];?>

      </div>
        
      <div class="feat_prod_box_details">
        <a href='/admin/categories'>Управление категориями</a>
        <br />
        <a href='/admin/products'>Управление товарами</a>
        <br />
        <a href='/admin/orders'>Управление заказами</a>  
      </div>
      <div class="clear"></div>
    </div>
<?php }
}
