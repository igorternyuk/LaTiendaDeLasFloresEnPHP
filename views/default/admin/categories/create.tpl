<div class="center_content">
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
              {foreach $allMainCategories as $category}
                  <option value='{$category['id']}' >{$category['name']}</option>
              {/foreach}
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
    </div>