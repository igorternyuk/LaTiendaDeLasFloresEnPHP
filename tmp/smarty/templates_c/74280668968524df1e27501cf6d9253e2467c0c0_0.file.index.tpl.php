<?php
/* Smarty version 3.1.33, created on 2019-04-18 10:31:44
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb835f0f307b2_91808610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74280668968524df1e27501cf6d9253e2467c0c0' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/index.tpl',
      1 => 1555576300,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb835f0f307b2_91808610 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Управление товарами
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Товары
        </div>
        <a href="/admin/products/create" class="checkout" >
              Добавить
          </a>
        
      <div class="feat_prod_box_details">
        <?php if (count($_smarty_tpl->tpl_vars['products']->value) > 0) {?>
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Название</th>
            <th>Код</th>
            <th>Категория</th>
            <th>Цена</th>
            <th colspan="3">Дейтсвие</th>
          </tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
            <tr>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['code'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['category_fullname'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
</td>
              <td>
                  <a id="viewProduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" href='/admin/products/view/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
'>
                      Просмореть
                  </a>
              </td>
              <td>
                  <a id="editProduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" href='/admin/products/edit/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
'>
                      Обновить
                  </a>
              </td>
              <td>
                  <a id="removeProduct_<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" href='/admin/products/remove/<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
'>
                      Удалить
                  </a>
              </td>
            </tr>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
          <span><?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>
</span>
          <div class="contact_form">
          <div class="form_subtitle">Поиск товара</div>
          <form id="searchForm" name="searchForm" action="/admin/products/search/page-1" method="post">
            <div class="form_row">
              <label class="contact"><strong>Поиск:</strong></label>
              <input type="text" id="search" name="search" class="contact_input" />
            </div>
            
            <div class="form_row">
                <input type="submit" class="register" value="Искать"/>
            </div>
          </form>
        </div>
          <?php } else { ?>
              <h4>Нет продуктов</h4>
          <?php }?>
          
      </div>
      <div class="clear"></div>
    </div><?php }
}
