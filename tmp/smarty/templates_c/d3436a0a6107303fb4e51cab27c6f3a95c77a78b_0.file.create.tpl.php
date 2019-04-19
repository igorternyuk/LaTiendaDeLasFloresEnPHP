<?php
/* Smarty version 3.1.33, created on 2019-04-18 08:52:35
  from '/opt/lampp/htdocs/flower-shop.local/views/default/admin/categories/create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cb81eb3605e02_68112760',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3436a0a6107303fb4e51cab27c6f3a95c77a78b' => 
    array (
      0 => '/opt/lampp/htdocs/flower-shop.local/views/default/admin/categories/create.tpl',
      1 => 1555570069,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cb81eb3605e02_68112760 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/categories/page-1">Управление категориями</a> &gt;&gt;
            Создание категории
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Создание новой категории</div>
      <div class="feat_prod_box_details">
        <p class="details"> Создание новой категории </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Создание новой категории</div>
          <form id="addCategoryForm" name="addCategoryForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="categoryName" name="categoryName" class="contact_input" required/>
            </div>
            
            <div class="form_row">
              <select id="parentId" name="parentId">
              <option value='0' selected>
                  Главная категория
              </option>  
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
              <label class="contact"><strong>Статус:</strong></label>
              <input type="number" min='0' max='1' value='1' id="status" name="status" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Критерий сортировки:</strong></label>
              <input type="number" id="sortOrder" name="sortOrder" value='1' class="contact_input" required/>
            </div>
              
            <div class="form_row">
                <input type="button" class="register" value="Добавить" onclick='addCategory();'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div><?php }
}
