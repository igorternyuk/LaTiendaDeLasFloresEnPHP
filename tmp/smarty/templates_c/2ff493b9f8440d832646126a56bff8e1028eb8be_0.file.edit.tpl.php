<?php
/* Smarty version 3.1.33, created on 2019-04-19 15:24:58
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb9cc2a116a87_79937608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ff493b9f8440d832646126a56bff8e1028eb8be' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/edit.tpl',
      1 => 1555679812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb9cc2a116a87_79937608 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/products/page-1">Редактирование товаров</a> &gt;&gt;
            Редактирование товара
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Редактирование товара</div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование товара </p>
        <span id="errors"></span>
        <div class="contact_form">
        <div class="form_subtitle">Редактирование товара</div>
          
          <form id="editProductForm" name="editProductForm" action="/product/edit" method='post' enctype='multipart/form-data' >
            
            <div class="form_row">
              <label class="contact"><strong>ID:</strong></label>
              <input type="text" id="productId" name="productId" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" readonly/>
            </div>
            
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="name" name="name" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['name'];?>
" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Бренд:</strong></label>
              <input type="text" id="brand" name="brand" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['brand'];?>
" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Код:</strong></label>
              <input type="text" id="code" name="code" class="contact_input"  value="<?php echo $_smarty_tpl->tpl_vars['product']->value['code'];?>
" required/>
            </div>
            
            <div class="form_row">
              <label class="contact"><strong>Категория:</strong></label>
            </div>
            
            <div class="form_row">
              <select id="categoryId" name="categoryId">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allSubCategories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                  <option value='<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
' <?php if ($_smarty_tpl->tpl_vars['category']->value['id'] == $_smarty_tpl->tpl_vars['product']->value['category_id']) {?> selected<?php }?> ><?php echo $_smarty_tpl->tpl_vars['category']->value['fullName'];?>
</option>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Цена:</strong></label>
              <input type="number" min='0' id="price" name="price" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Скидка:</strong></label>
              <input type="number" min='0' id="discount" name="discount" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['discount'];?>
" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Запас:</strong></label>
              <input type="number" min='0' id="stock" name="stock" class="contact_input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value['stock'];?>
" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Короткое описание:</strong></label>
              <textarea id="short_description" name="short_description" class="contact_textarea" ><?php echo $_smarty_tpl->tpl_vars['product']->value['short_description'];?>
</textarea>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Подробное описание:</strong></label>
              <textarea id="description" name="description" class="contact_textarea" ><?php echo $_smarty_tpl->tpl_vars['product']->value['description'];?>
</textarea>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isNew" name="isNew" <?php if ($_smarty_tpl->tpl_vars['product']->value['is_new']) {?>checked<?php }?>/>
                Новинка
              </div>
            </div>
            
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isRecommended" name="isRecommended" <?php if ($_smarty_tpl->tpl_vars['product']->value['is_recommended']) {?>checked<?php }?>/>
                Рекомендуемый
              </div>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isAvailable" name="isAvailable" <?php if ($_smarty_tpl->tpl_vars['product']->value['available']) {?>checked<?php }?>/>
                Отображать
              </div>
            </div> 
              
            <div class="form_row">
              <label class="contact"><strong>Изображение:</strong></label>
              <input type="file" min='0' id="filename" name="filename" class="contact_input" />
            </div>
                
            <div class="form_row">
              <div class="terms">
                <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
" width='200' alt="" border="0" />
              </div>
            </div>
              
            <div class="form_row">
                <input type="submit" id="btnUpdateProduct" name="btnUpdateProduct"  class="register" value="Сохранить" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
