<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/categories/page-1">Управление категориями</a> &gt;&gt;
            Редактирование категории
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Редактирование категории</div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование категории </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Редактирование категории</div>
          <form id="categoryEditForm" name="categoryEditForm" action="#" method='post'>
            
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="categoryName" name="categoryId" class="contact_input" value="{$currentCategory['id']}" readonly/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="categoryName" name="categoryName" class="contact_input" value="{$currentCategory['name']}" required/>
            </div>
            
            <div class="form_row">
              <select id="parentId" name="parentId">
              <option value='0' {if $currentCategory['parent_id'] == 0} selected {/if} >
                  Главная категория
              </option>
              {foreach $allMainCategories as $category}
                  <option value="{$category['id']}"
                          {if $currentCategory['parent_id'] == $category['id']}selected{/if}
                   >
                    {$category['name']}
                  </option>
              {/foreach}
              </select>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Статус:</strong></label>
              <input type="number" min='0' max='1' value='{$currentCategory['status']}' id="status" name="status" class="contact_input" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Критерий сортировки:</strong></label>
              <input type="number" id="sortOrder" name="sortOrder" value='{$currentCategory['sort_order']}' class="contact_input" required/>
            </div>
              
            <div class="form_row">
                <input type="button" class="register" value="Обновить" onclick='editCategory({$currentCategory['id']});'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>