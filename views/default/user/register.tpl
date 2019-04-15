<div class="center_content">
    <div class="left_content">
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
         Регистрация
      </div>
      <div class="feat_prod_box_details">
        <p class="details"> Для регистрации заполните, пожалуйста, форму </p>
        <span id="errors"></span>
        <br />
        <div class="contact_form">
          <div class="form_subtitle">Создать новую учетную запись</div>
          <form id="registerForm" name="registerForm" href="#" method="post">
            <div class="form_row">
              <label class="contact"><strong>Имя:</strong></label>
              <input type="text" id="username" name="username" class="contact_input" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Пароль:</strong></label>
              <input type="password" id="pwd1" name="pwd1" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Повторите пароль:</strong></label>
              <input type="password" id="pwd2" name="pwd2" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон:</strong></label>
              <input type="text" id="userphone" name="userphone" class="contact_input"  required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес:</strong></label>
              <input type="text" id="useraddress" name="useraddress" class="contact_input"  required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="ОК" onclick="register(); return false;"/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>