<div class="center_content">
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
        {if count($products) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Название</th>
            <th>Код</th>
            <th>Категория</th>
            <th>Цена</th>
            <th colspan="3">Дейтсвие</th>
          </tr>
          {foreach $products as $product}
            <tr id="product_{$product['id']}}">
              <td>{$product['id']}</td>
              <td>{$product['name']}</td>
              <td>{$product['code']}</td>
              <td>{$product['category_fullname']}</td>
              <td>{$product['price']} грн.</td>
              <td>
                  <a id="viewProduct_{$product['id']}" href='/admin/products/view/{$product['id']}'>
                      Просм.
                  </a>
              </td>
              <td>
                  <a id="editProduct_{$product['id']}" href='/admin/products/edit/{$product['id']}'>
                      Редакт.
                  </a>
              </td>
              <td>
                  <a id="removeProduct_{$product['id']}" href='#' onclick="if(confirm('Вы действительно хотите удалить данный товар?')) { removeProduct({$product['id']}); }; return false; ">
                      Удалить
                  </a>
              </td>
            </tr>
          {/foreach}
          </table>
          <span>{$pagination}</span>
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
          {else}
              <h4>Нет продуктов</h4>
          {/if}
          
      </div>
      <div class="clear"></div>
    </div>