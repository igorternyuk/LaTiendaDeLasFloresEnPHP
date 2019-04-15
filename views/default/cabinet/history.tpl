<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a>
            &gt;&gt;
            <a href="/cabinet">Личный кабинет</a>
            &gt;&gt;
            История заказов 
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Корзина
      </div>
        
      <div class="feat_prod_box_details">
        {if count($userOrders) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID товара</th>
            <th>Название</th>
            <!--th>Код товара</th-->
            <th>Изображение</th>
            <th>Цена за единицу</th>
            <th>Количество</th>
            <th>Итого</th>
            <th>Дейтсвие</th>
          </tr>
          {foreach $productsInCart as $product}
            <tr id="productRow_{$product['id']}">
              <td>{$product['id']}</td>
              <td><a href="/product/{$product['id']}">{$product['name']}</a></td>
              <!--td>{$product['code']}</td-->
              <td>
                  <a href="/product/{$product['id']}">
                      <img src="{$product['image']}" width='85' alt="" border="0" class="cart_thumb" />
                  </a>
              </td>              
              <td>{$product['price']}</td>
              <td width='60' >
                  <input width='50' id="productCount_{$product['id']}"
                         name="productCount_{$product['id']}" type='number' min=0 max='{$product['stock']}'
                         value="{$product['count']}"
                                    onchange="updateProductCount({$product['id']});"
                  >
                  
              </td>
              <td>
                  <span  id="subtotal_{$product['id']}" name="subtotal_{$product['id']}">
                      {$product['subtotal']}
                  </span> грн.
              </td>
              <td><a href='#' onclick="removeFromCart({$product['id']}); return false;">Удалить</a></td>
            </tr>
          {/foreach}
          
          <tr>
            <td colspan="6" class="cart_total">
                <span class="red">Сумма заказа:</span>
            </td>
            <td>
                <span id="cartTotalSumInTable" name='cartTotalSumInTable'>
                    {$cartTotalSum}
                </span> грн.
            </td>
          </tr>
        </table>
            <a href="/catalog" class="continue">
                &lt; Назад
            </a>
          <a href="/order/checkout" class="checkout">
              Заказать &gt;
          </a>
        {else}
            <h3>Ваша корзина пуста.</h3>
        {/if}
          
      </div>
      <div class="clear"></div>
    </div>