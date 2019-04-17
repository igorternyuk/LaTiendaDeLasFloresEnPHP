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
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        {if count($userOrders) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Дата оформления</th>
            <th>Дата изменения</th>
            <th>Дата оплаты</th>
            <th>Имя клиента</th>
            <th>Сумма</th>
            <th>Статус</th>
            <th>Дейтсвие</th>
          </tr>
          {foreach $userOrders as $order}
            <tr>
              <td>{$order['id']}</td>
              <td>{$order['date_created']}</td>
              <td>{$order['date_updated']}</td>
              <td>{$order['date_payment']}</td>
              <td>{$order['username']}</td>
              <td>{$order['total']} грн.</td>
              <td>{$order['status_description']}</td>
              <td>
                  <a id="toggleProducts_{$order['id']}" href='#' onclick="toggleOrderProductsView({$order['id']}); return false;">
                      Показать товары
                  </a>
              </td>
            </tr>
            <tr id="orderProducts_{$order['id']}" style="display: none;">
                <td colspan='7'>
                    <table>
                        <tr>
                            <th>№</th>
                            <th>ID товара</th>
                            <th>Название</th>
                            <th>Код товара</th>
                            <th>Цена за единицу</th>
                            <th>Количество</th>
                            <th>Итого</th>
                        </tr>
                    {foreach $order['items'] as $item name=products}
                        <tr>
                            <td>{$smarty.foreach.products.iteration}</td>
                            <td>{$item['product_id']}</td>
                            <td><a href='/product/{$item['product_id']}'>{$item['product_name']}</a></td>
                            <td>{$item['product_code']}</td>
                            <td>{$item['product_price']} грн.</td>
                            <td>{$item['count']}</td>
                            <td>{$item['subtotal']} грн.</td>
                        </tr>
                    {/foreach}
                    </table>
                </td>
            </tr>
          {/foreach}
          </table>
          <span>{$pagination}</span>
          {else}
              <h4>Нет заказов</h4>
          {/if}
          
      </div>
      <div class="clear"></div>
    </div>