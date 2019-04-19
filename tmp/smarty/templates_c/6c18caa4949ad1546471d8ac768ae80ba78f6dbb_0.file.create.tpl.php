<?php
/* Smarty version 3.1.33, created on 2019-04-18 19:01:59
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb8ad87d7de04_35509117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c18caa4949ad1546471d8ac768ae80ba78f6dbb' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/products/create.tpl',
      1 => 1555606839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb8ad87d7de04_35509117 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/products/page-1">Управление товарами</a> &gt;&gt;
            Создание товара
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Создание нового товара</div>
      <div class="feat_prod_box_details">
        <p class="details"> Создание нового товара </p>
        
        <div class="contact_form">
        <div class="form_subtitle">Создание нового товара</div>
          
          <form id="addProductForm" name="addProductForm" action="/product/add" method='post' enctype='multipart/form-data' >
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="name" name="name" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Бренд:</strong></label>
              <input type="text" id="brand" name="brand" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Код:</strong></label>
              <input type="text" id="code" name="code" class="contact_input" required/>
            </div>
            
            <div class="form_row">
              <label class="contact"><strong>Категория:</strong></label>
              <select id="categoryId" name="categoryId">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allMainCategories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                  <option value='<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
' ><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
              <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
              </select>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Цена:</strong></label>
              <input type="number" min='0' id="price" name="price" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Скидка:</strong></label>
              <input type="number" min='0' id="discount" name="discount" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Запас:</strong></label>
              <input type="number" min='0' id="stock" name="stock" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Короткое описание:</strong></label>
              <textarea id="short_description" name="short_description" class="contact_textarea" ></textarea>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Подробное описание:</strong></label>
              <textarea id="description" name="description" class="contact_textarea" ></textarea>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isNew" name="isNew" />
                Новинка
              </div>
            </div>
            
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isRecommended" name="isRecommended" />
                Рекомендуемый
              </div>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isAvailable" name="isAvailable" />
                Отображать
              </div>
            </div> 
            
            <div class="form_row">
              <label class="contact"><strong>Изображение:</strong></label>
              <input type="file" min='0' id="filename" name="filename" class="contact_input" />
            </div>
            
            <div class="form_row">
                <input type="submit" id="btnAddProduct" name="btnAddProduct" class="register" value="Добавить" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
