<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            <a href="/admin/order/page-1">Управление заказами</a> &gt;&gt;
            Редактирование заказа
        </div>
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Редактирование заказа</div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование заказа </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Редактирование заказа</div>
          <form id="editOrderForm" name="editOrderForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>ID Заказа:</strong></label>
              <input type="text" id="orderId" name="orderId" value="{$order['id']}" class="contact_input" readonly/>
            </div>
              
            <div class="form_row">
              <label class="contact"><strong>Дата:</strong></label>
              <input type="datetime" id="paymentDate" name="paymentDate" value="{$order['date_payment']}" class="contact_input" required/>
            </div>
            
            <div class="form_row">
              <select id="orderStatus" name="orderStatus">
              {foreach $orderStatusOptions as $option}
                  <option value='{$option['id']}' {if $order['status'] == $option['id']}selected{/if}>{$option['description']}</option>
              {/foreach}
              </select>
            </div>
              
            <div class="form_row">
                <input type="button" class="register" value="Обновить" onclick='updateOrder({$order['id']})'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>