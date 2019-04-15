<div class="center_content">
    <div class="left_content">
        <div class="crumb_nav">
            <a href="/">На главную</a>
            &gt;&gt;
            <a href="/cabinet">Личный кабинет</a>
            &gt;&gt;
            Редактирование профиля
        </div>
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
         Редактирование профиля
      </div>
      <div class="feat_prod_box_details">
        <p class="details"> Редактирование профиля </p>
        <span id="errors"></span>
        <br />
        <div class="contact_form">
          <div class="form_subtitle">Ректирование данных профиля</div>
          <form id="userEditForm" name="userEditForm" href="#" method="post">
            <div class="form_row">
              <label class="contact"><strong>Имя:</strong></label>
              <input type="text" id="username" name="username" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['name']} {/if}" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Новый пароль:</strong></label>
              <input type="password" id="pwd1" name="pwd1" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Повторите новый пароль:</strong></label>
              <input type="password" id="pwd2" name="pwd2" class="contact_input" />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Email:</strong></label>
              <input type="email" id="email" name="email" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['email']} {/if}" readonly/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Телефон:</strong></label>
              <input type="text" id="phone" name="phone" class="contact_input" value="{if isset($loggedUser)} {$loggedUser['phone']} {/if}"  />
            </div>
            <div class="form_row">
              <label class="contact"><strong>Адрес:</strong></label>
              <input type="text" id="address" name="address" class="contact_input"  value="{if isset($loggedUser)} {$loggedUser['address']} {/if}" required/>
            </div>
            <div class="form_row">
              <label class="contact"><strong>Текущий пароль:</strong></label>
              <input type="password" id="currentPassword" name="currentPassword" class="contact_input"  required/>
            </div>
            <div class="form_row">
                <input type="button" class="register" value="ОК" onclick="updateUser(); return false;"/>
            </div>
          </form>
        </div>
      </div>
      <div class="clear"></div>
    </div>