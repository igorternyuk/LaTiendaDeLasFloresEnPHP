  <div class="center_content">
    <div class="left_content">
      <div class="title">
          <span class="title_icon">
              <img src="{$templateWebPath}images/bullet1.gif" alt="" />
          </span>
          Рекоммендуемые товары
      </div>
      {foreach $recommendedProducts as $product}
        <div class="feat_prod_box">
          <div class="prod_img">
              <a href="product/{$product['id']}">
                  <img src="{$product['image']}" width='120' alt="" border="0" />
              </a></div>
          <div class="prod_det_box">
            <div class="box_top"></div>
            <div class="box_center">
              <div class="prod_title">
                  <a href='product/{$product['id']}' style='font-size: 18px;'>
                      {$product['name']} 
                  </a>
                  <span style='font-size: 18px;'>&nbsp;Цена: {$product['price']}&nbsp;грн.</span>
              </div>
              <p class="details">{$product['short_description']}</p>
              <a href="product/{$product['id']}" class="more">- Подробнее -</a>
              <div class="clear"></div>
            </div>
            <div class="box_bottom"></div>
          </div>
          <div class="clear"></div>
        </div>
      {/foreach}
      
      <div class="title"><span class="title_icon"><img {$templateWebPath}images/bullet2.gif" alt="" /></span>Новинки</div>
      
      <!-- Новинки -->
      <div class="new_products">
          {foreach $newProducts as $product}
          <div class="new_prod_box"> <a href="product/{$product['id']}">{$product['name']}</a>
            <div class="new_prod_bg">
                <span class="new_icon">
                    <img src="{$templateWebPath}images/new_icon.gif" alt="" />
                </span>
                <a href="product/{$product['id']}">
                    <img src="{$product['image']}" width='90' alt="" class="thumb" border="0" />
                </a>
            </div>
          </div>
          {/foreach}
        
        
      </div>
        
      <div class="clear"></div>
    </div>
