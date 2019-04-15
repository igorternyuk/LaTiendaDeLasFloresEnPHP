<div class="center_content">
    <div class="left_content">
      <div class="title"><span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>Оформление заказа</div>
      <div class="feat_prod_box_details">
        <p class="details"> Заполните форму </p>
        <span id="errors"></span>
        <div class="contact_form">
          <div class="form_subtitle">Параметры заказа</div>
          <form id="checkOutForm" name="checkOutForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>Имя получателя:</strong></label>
              <input type="text" id="email" name="username" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['name']} {/if}" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон получателя:</strong></label>
              <input type="text" id="phone" name="phone" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['phone']} {/if}" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес получателя:</strong></label>
              <input type="text" id="address" name="address" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['address']} {/if}" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Комментарий:</strong></label>
              <textarea id="comment" name="comment" class="contact_textarea" ></textarea>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="Заказать" onclick='saveorder();'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>