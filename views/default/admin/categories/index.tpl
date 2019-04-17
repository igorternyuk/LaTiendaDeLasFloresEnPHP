<div class="center_content">
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
        {if count($categories) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID категории</th>
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Статус</th>
            <th>Редактировать</th>
            <th>Удалить</th>
          </tr>
          {foreach $categories as $category}
            <tr id="categoryRow_{$product['id']}">
              <td>{$category['id']}</td>
              <td>{$category['name']}</td>
              <td>{if isset($category['parent_name']) and $category['parent_name']} {$category['parent_name']} {else} - {/if} </td>
              <td>{if $category['status'] } Активна {else} Скрыта {/if}</td>
              <td>
                  <a href="/admin/category/edit/{$category['id']}">
                      Редактировать
                  </a>
              </td>              
              <td>
                  <a href="#"  onclick="if(confirm('Вы действительно хотите удалить данную катгорию?')) { removeCategory()removeCategory({$category['id']}) }; return false;">
                      Удалить
                  </a>
              </td>
            </tr>
          {/foreach}
        </table>
          {$pagination}
          <a href="/admin/category/create" class="checkout" >
              Создать &gt;
          </a>
        {else}
            <h3>Нет категорий</h3>
        {/if}
          
      </div>
      <div class="clear"></div>
    </div>