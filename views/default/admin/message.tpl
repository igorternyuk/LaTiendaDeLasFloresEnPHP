<div class="center_content">
    <div class="left_content"> 
        <div class="crumb_nav">
            <a href="/">На главную</a> &gt;&gt;
            <a href="/admin">Админка</a> &gt;&gt;
            Создание товара
        </div>
        <div class="title">
          <span class="title_icon"><img src="images/bullet1.gif" alt="" />
          </span>          
      </div>
        {if isset($success) and $success == true}
            <span style="font-size: 16px; color:darkgreen">{if isset($message)} {$message} {/if} </span>
        {else}
            <span style="font-size: 16px; color:red">{if isset($message)} {$message} {/if} </span>
            {if isset($errors)}
            {foreach $errors as $error name=errors}
                <p>{$smarty.foreach.errors.iteration}<span style='color:red;' >{$error}</span></p>
                <br />
            {/foreach}
            {/if}
        {/if}
        <br />
        <a href="/admin/products">Назад</a>        
        <div class="clear"></div>
    </div>