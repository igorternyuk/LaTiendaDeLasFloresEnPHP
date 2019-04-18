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
        
      <div class="feat_prod_box_details">
        {if count($products) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Название</th>
            <th>Код</th>
            <th>Категория</th>
            <th>Цена</th>
            <th colspan="2">Дейтсвие</th>
          </tr>
          {foreach $products as $product}
            <tr>
              <td>{$product['id']}</td>
              <td>{$product['name']}</td>
              <td>{$product['code']}</td>
              <td>{$product['category_name']}</td>
              <td>{$product['price']}</td>
              <td>
                  <a id="viewProduct_{$order['id']}" href='/admin/product/view/{$product['id']}'>
                      Просмореть
                  </a>
              </td>
              <td>
                  <a id="viewOrder_{$order['id']}" href='/admin/product/update/{$product['id']}'>
                      Обновить
                  </a>
              </td>
            </tr>
          {/foreach}
          </table>
          <span>{$pagination}</span>
          {else}
              <h4>Нет продуктов</h4>
          {/if}
          
      </div>
      <div class="clear"></div>
    </div>