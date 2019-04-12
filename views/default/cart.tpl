<div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" /></span>My cart</div>
      <div class="feat_prod_box_details">
        <table class="cart_table">
          <tr class="cart_title">
            <td>ID товара</td>
            <td>Название</td>
            <td>Цена за единицу</td>
            <td>Количество</td>
            <td>Итого</td>
          </tr>
          {foreach $productsInCart as $product}
            <tr>
              <td>
                  <a href="/{$product['id']}">
                      <img src="{$product['image']}" width='100' alt="" border="0" class="cart_thumb" />
                  </a>
              </td>
              <td>Gift flowers</td>
              <td>100$</td>
              <td>1</td>
              <td>100$</td>
            </tr>
          {/foreach}
          
          <tr>
            <td colspan="4" class="cart_total"><span class="red">Сумма заказа:</span></td>
            <td> 325$</td>
          </tr>
        </table>
            <a href="/catalog" class="continue">
                &lt; Вернуться в каталог
            </a>
          <a href="/order/checkout" class="checkout">
              checkout &gt;
          </a>
      </div>
      <div class="clear"></div>
    </div>