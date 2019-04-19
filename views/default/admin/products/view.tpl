<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/products/page-1">Редактирование товаров</a> &gt;&gt;
            Просмотр информации о товаре
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Данные товара</div>
      <div class="feat_prod_box_details">
        
        <table class="cart_table" style="border: 0px;">
            <tr>
              <th>ID товара:</th>
              <td>{$product['id']}</td>
            </tr>
            
            <tr>
              <th>Название:</th>
              <td>{$product['name']}</td>
            </tr>
            
            <tr>
              <th>Код товара:</th>
              <td>{$product['code']}</td>
            </tr>
            
            <tr>
              <th>Бренд:</th>
              <td>{$product['brand']}</td>
            </tr>
            
            <tr>
              <th>Категория:</th>
              <td>{$product['categoryFullName']}</td>
            </tr>
            
            <tr>
              <th>Цена, грн.:</th>
              <td>{$product['price']}</td>
            </tr>
            
            <tr>
              <th>В наличии шт.:</th>
              <td>{$product['stock']}</td>
            </tr>
            
            <tr>
              <th>Скидка %:</th>
              <td>{$product['discount']}</td>
            </tr>
            
            <tr>
              <th>Описание:</th>
              <td>{$product['description']}</td>
            </tr>
            
            <tr>
              <th>Новинка:</th>
              <td>{if $product['is_new']}Да{else}Нет{/if}</td>
            </tr>
            
            <tr>
              <th>Рекомендуемый:</th>
              <td>{if $product['is_recommended']}Да{else}Нет{/if}</td>
            </tr>
            
            <tr>
              <th>Доступен:</th>
              <td>{if $product['available']}Да{else}Нет{/if}</td>
            </tr>
            
            <tr>
              <th>Изображение:</th>
              <td><img src="{$product['image']}" width='200' alt="" border="0" /></td>
            </tr>            
          </table>
      </div>
      <div class="clear"></div>
    </div>