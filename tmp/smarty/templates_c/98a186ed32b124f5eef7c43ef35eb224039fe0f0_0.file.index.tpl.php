<?php
/* Smarty version 3.1.33, created on 2019-04-17 16:10:19
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/categories/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb733cb53a529_57720238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98a186ed32b124f5eef7c43ef35eb224039fe0f0' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/categories/index.tpl',
      1 => 1555510216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb733cb53a529_57720238 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Управление категориями товаров;
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Категории товаров
      </div>
        
      <div class="feat_prod_box_details">
        <?php if (count($_smarty_tpl->tpl_vars['categories']->value) > 0) {?>
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID категории</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Удалить</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
            <tr id="categoryRow_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
">
              <td><?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</td>
              <td><?php if (isset($_smarty_tpl->tpl_vars['category']->value['parent_name']) && $_smarty_tpl->tpl_vars['category']->value['parent_name']) {?> <?php echo $_smarty_tpl->tpl_vars['category']->value['parent_name'];?>
 <?php } else { ?> - <?php }?> </td>
              <td><?php if ($_smarty_tpl->tpl_vars['category']->value['status']) {?> Активна <?php } else { ?> Скрыта <?php }?></td>
              <td>
                  <a href="/admin/category/edit/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
                      Редактировать
                  </a>
              </td>              
              <td>
                  <a href="#"  onclick="if(confirm('Вы действительно хотите удалить данную катгорию?')) { removeCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
); }; return false;">
                      Удалить
                  </a>
              </td>
            </tr>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
          <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

          <a href="/admin/category/create" class="checkout" >
              Создать &gt;
          </a>
        <?php } else { ?>
            <h3>Нет категорий</h3>
        <?php }?>
          
      </div>
      <div class="clear"></div>
    </div><?php }
}
