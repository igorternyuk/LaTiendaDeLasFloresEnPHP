<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Управление заказами
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>
          Заказы
      </div>
        
      <div class="feat_prod_box_details">
        {if count($orders) > 0}
        <table class="cart_table">
          <tr class="cart_title">
            <th>ID</th>
            <th>Дата оформления</th>
            <th>Дата изменения</th>
            <th>Имя клиента</th>
            <th>Статус</th>
            <th colspan="2">Дейтсвие</th>
          </tr>
          {foreach $orders as $order}
            <tr>
              <td>{$order['id']}</td>
              <td>{$order['date_created']}</td>
              <td>{$order['date_updated']}</td>
              <td>{$order['username']}</td>
              <td>{$order['status_description']}</td>
              <td>
                  <a id="viewOrder_{$order['id']}" href='/admin/orders/view/{$order['id']}'>
                      Просмореть
                  </a>
              </td>
              <td>
                  <a id="viewOrder_{$order['id']}" href='/admin/orders/update/{$order['id']}'>
                      Обновить
                  </a>
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