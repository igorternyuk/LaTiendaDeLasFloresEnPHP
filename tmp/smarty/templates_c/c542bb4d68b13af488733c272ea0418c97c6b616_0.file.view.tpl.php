<?php
/* Smarty version 3.1.33, created on 2019-04-19 15:59:37
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb9d449669584_29532408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c542bb4d68b13af488733c272ea0418c97c6b616' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/view.tpl',
      1 => 1555682375,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb9d449669584_29532408 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/products/page-1">Редактирование товаров</a> &gt;&gt;
            Просмотр информации о товаре
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Данные товара</div>
      <div class="feat_prod_box_details">
        
        <table class="cart_table" style="border: 0px;">
            <tr>
              <th>ID товара:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
            </tr>
            
            <tr>
              <th>Название:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
            </tr>
            
            <tr>
              <th>Код товара:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['code'];?>
</td>
            </tr>
            
            <tr>
              <th>Бренд:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['brand'];?>
</td>
            </tr>
            
            <tr>
              <th>Категория:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['categoryFullName'];?>
</td>
            </tr>
            
            <tr>
              <th>Цена:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
            </tr>
            
            <tr>
              <th>В наличии шт.:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
</td>
            </tr>
            
            <tr>
              <th>Скидка %:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
</td>
            </tr>
            
            <tr>
              <th>Описание:</th>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</td>
            </tr>
            
            <tr>
              <th>Новинка:</th>
              <td><?php if ($_smarty_tpl->tpl_vars['product']->value['is_new']) {?>Да<?php } else { ?>Нет<?php }?></td>
            </tr>
            
            <tr>
              <th>Рекомендуемый:</th>
              <td><?php if ($_smarty_tpl->tpl_vars['product']->value['is_recommended']) {?>Да<?php } else { ?>Нет<?php }?></td>
            </tr>
            
            <tr>
              <th>Доступен:</th>
              <td><?php if ($_smarty_tpl->tpl_vars['product']->value['available']) {?>Да<?php } else { ?>Нет<?php }?></td>
            </tr>
            
            <tr>
              <th>Изображение:</th>
              <td><img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='200' alt="" border="0" /></td>
            </tr>            
          </table>
      </div>
      <div class="clear"></div>
    </div><?php }
}
