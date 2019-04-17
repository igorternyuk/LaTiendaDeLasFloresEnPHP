<?php
/* Smarty version 3.1.33, created on 2019-04-17 12:56:01
  from '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb7064144efa6_99969127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48371b6a46cc92cf04e7d2a20f6253caaea413b2' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/cabinet/index.tpl',
      1 => 1555498559,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb7064144efa6_99969127 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; Личный кабинет </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Кабинет <?php echo $_smarty_tpl->tpl_vars['loggedUser']->value['name'];?>

      </div>
        
      <div class="feat_prod_box_details">
        <a href='/cabinet/edit'>Редактировать профиль</a>
        <br />
        <a href='/cabinet/history'>История заказов</a>          
      </div>
      <div class="clear"></div>
    </div><?php }
}
