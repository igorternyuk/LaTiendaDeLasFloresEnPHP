<div class="center_content">
    <div class="left_content">
       <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/order/page-1">Управление заказами</a> &gt;&gt;
            Просмотр данных о заказе
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        {if isset($order)}
        <table class="cart_table">
            <tr>
              <th>ID заказа:</th>
              <td>{$order['id']}</td>
            </tr>
            
            <tr>
              <th>Дата оформления:</th>
              <td>{$order['date_created']}</td>
            </tr>
            
            <tr>
              <th>Дата обновления:</th>
              <td>{$order['date_updated']}</td>
            </tr>
            
            <tr>
              <th>Дата оплаты:</th>
              <td>{$order['date_payment']}</td>
            </tr>
            
            <tr>
              <th>Имя заказчика:</th>
              <td>{$order['username']}</td>
            </tr>
            
            <tr>
              <th>Адресс заказчика:</th>
              <td>{$order['useraddress']}</td>
            </tr>
            
            <tr>
              <th>Телефон заказчика:</th>
              <td>{$order['userphone']}</td>
            </tr>
            
            <tr style="color: red;">
              <th>Сумма заказа:</th>
              <td>{$order['total']} грн.</td>
            </tr>
            
            <tr>
              <th>Комментарий:</th>
              <td>{$order['comment']}</td>
            </tr>
            
            <tr>
              <th>Статус заказа:</th>
              <td>{$order['status_description']}</td>
            </tr>
            
            <tr>
                <th colspan="2" style="color: blue; font-size: 16px;">Товары заказа:</th>
            </tr>
            
            <tr id="orderProducts_{$order['id']}" >
                <td colspan='6'>
                    <table>
                        <tr>
                            <th>№</th>
                            <th>ID товара</th>
                            <th>Название</th>
                            <th>Код товара</th>
                            <th>Цена за единицу х Количество = </th>
                            <th>Итого</th>
                        </tr>
                    {foreach $order['items'] as $item name=products}
                        <tr>
                            <td>{$smarty.foreach.products.iteration}</td>
                            <td>{$item['product_id']}</td>
                            <td><a href='/product/{$item['product_id']}'>{$item['product_name']}</a></td>
                            <td>{$item['product_code']}</td>
                            <td>{$item['count']} х {$item['product_price']} грн.</td>
                            <td>{$item['subtotal']} грн.</td>
                        </tr>
                    {/foreach}
                    </table>
                </td>
            </tr>
          </table>
          {else}
              <h4>Нет заказов</h4>
          {/if}
          
      </div>
      <div class="clear"></div>
    </div>