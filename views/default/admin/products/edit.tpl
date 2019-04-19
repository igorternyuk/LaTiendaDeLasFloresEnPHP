<div class="center_content">
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
              <input type="text" id="productId" name="productId" class="contact_input" value="{$product['id']}" readonly/>
            </div>
            
            <div class="form_row">
              <label class="contact"><strong>Название:</strong></label>
              <input type="text" id="name" name="name" class="contact_input" value="{$product['name']}" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Бренд:</strong></label>
              <input type="text" id="brand" name="brand" class="contact_input" value="{$product['brand']}" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Код:</strong></label>
              <input type="text" id="code" name="code" class="contact_input"  value="{$product['code']}" required/>
            </div>
            
            <div class="form_row">
              <label class="contact"><strong>Категория:</strong></label>
            </div>
            
            <div class="form_row">
              <select id="categoryId" name="categoryId">
              {foreach $allSubCategories as $category}
                  <option value='{$category['id']}' {if $category['id'] == $product['category_id']} selected{/if} >{$category['fullName']}</option>
              {/foreach}
              </select>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Цена:</strong></label>
              <input type="number" min='0' id="price" name="price" class="contact_input" value="{$product['price']}" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Скидка:</strong></label>
              <input type="number" min='0' id="discount" name="discount" class="contact_input" value="{$product['discount']}" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Запас:</strong></label>
              <input type="number" min='0' id="stock" name="stock" class="contact_input" value="{$product['stock']}" required/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Короткое описание:</strong></label>
              <textarea id="short_description" name="short_description" class="contact_textarea" >{$product['short_description']}</textarea>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Подробное описание:</strong></label>
              <textarea id="description" name="description" class="contact_textarea" >{$product['description']}</textarea>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isNew" name="isNew" {if $product['is_new']}checked{/if}/>
                Новинка
              </div>
            </div>
            
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isRecommended" name="isRecommended" {if $product['is_recommended']}checked{/if}/>
                Рекомендуемый
              </div>
            </div>
              
            <div class="form_row">
              <div class="terms">
                <input type="checkbox" id="isAvailable" name="isAvailable" {if $product['available']}checked{/if}/>
                Отображать
              </div>
            </div> 
              
            <div class="form_row">
              <label class="contact"><strong>Изображение:</strong></label>
              <input type="file" min='0' id="filename" name="filename" class="contact_input" />
            </div>
                
            <div class="form_row">
              <div class="terms">
                <img src="{$product['image']}" width='200' alt="" border="0" />
              </div>
            </div>
              
            <div class="form_row">
                <input type="submit" id="btnUpdateProduct" name="btnUpdateProduct"  class="register" value="Сохранить" />
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>