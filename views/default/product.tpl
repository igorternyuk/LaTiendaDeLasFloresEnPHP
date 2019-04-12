<div class="center_content">
    <div class="left_content">
      <div class="crumb_nav"> <a href="/">Главная</a> &gt;&gt; {$currentProduct['name']} </div>
      <div class="title">
          <span class="title_icon">
              <img src="{$templateWebPath}images/bullet1.gif" alt="" />
          </span>{$currentProduct['name']}</div>
      <div class="feat_prod_box_details">
       <div class="prod_img">
            <a href="{$currentProduct['image']}">
                <img src="{$currentProduct['image']}" width='150' alt="" border="0" />
            </a>
            <br />
            <br />         
        </div>       
          
        <div class="prod_det_box">
          <div class="box_top"></div>
          <div class="box_center">
            <!--<div class="prod_title">Описание:</div>
            <p class="details">{$currentProduct['description']}</p> -->
            <div class="price">
                <strong>Код товара:</strong>
                <span class="red">{$currentProduct['code']}</span>
            </div>
            <div class="price">
                <strong>Цена:</strong>
                <span class="red">{$currentProduct['price']}&nbsp;грн.</span>
            </div>
            <div class="price">
                <strong>В наличии:</strong>
                <span class="red">{$currentProduct['stock']}&nbsp;шт.</span>
            </div>
            {if $currentProduct['is_new']}
                <div class="price">
                    <strong>Новинка</strong>
                </div>
            {/if}
            {if $currentProduct['is_recommended']}
                <div class="price">
                    <strong>Рекомендуемый</strong>
                </div>
            {/if}
            {if $currentProduct['discount']}
                <div class="price">
                    <strong>Есть скидка</strong>
                </div>
            {/if}
            <div class="price">
                <span><input type="button" class="register" value="В корзину" /></span>
            </div>
            <div class="clear"></div>
          </div>
            <div class="box_bottom">
                
            </div>
        </div>
        <div class="clear"></div>
        
      </div>
            
      <div id="demo" class="demolayout">
        <ul id="demo-nav" class="demolayout">
          <li><a class="active" href="#tab1">Подробнее</a></li>
          <li><a class="" href="#tab2">Подобные товары</a></li>
        </ul>
        <div class="tabs-container">
          <div style="display: block;" class="tab" id="tab1">
            <p class="more_details">
                {$currentProduct['description']}
            </p>
          </div>
          <div style="display: none;" class="tab" id="tab2">
              {foreach $similarProducts as $similarProduct}
                <div class="new_prod_box">
                  <a href="/product/{$similarProduct['id']}">
                      {$similarProduct['name']}&nbsp;{$similarProduct['price']}&nbsp;грн.
                  </a>
                  <div class="new_prod_bg">
                      <a href="/product/{$similarProduct['id']}">
                          <img src="{$similarProduct['image']}" width='100' alt="" class="thumb" border="0" />
                      </a>
                  </div>

                </div>
              {/foreach}
            
            <div class="clear"></div>
          </div>
        </div>
      </div>     
      <div class="clear"></div>
    </div>