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
          <form id="loginForm" name="loginForm" href="#" method='post'>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input" required/>
            </div>
              <div class="form_row">
              <label class="contact"><strong>Пароль:</strong></label>
              <input type="password" id="password" name="password" class="contact_input" required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="Войти" onclick='checkout();'/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>