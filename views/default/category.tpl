<div class="center_content">
    <div class="left_content">
      <div class="crumb_nav"> <a href="/">На главную</a> &gt;&gt; category name </div>
      <div class="title">
          <span class="title_icon">
              <img src="images/bullet1.gif" alt="" />
          </span>
          Каталог
      </div>
      <div class="new_products">
        {foreach $products as $product}
            <div class="new_prod_box"> 
                <a href="product/{$product['id']}">
                    {$product['name']}&nbsp;{$product['price']}&nbsp;грн.
                </a>
                <div class="new_prod_bg">
                    {if $product['is_new']}
                    <span class="new_icon">
                            <img src="images/new_icon.gif" alt="" />
                    </span>
                    {/if}
                    <a href="product/{$product['id']}">
                        <img src="{$product['image']}" alt="" class="thumb" border="0" />
                    </a>
		</div>
            </div>
        {/foreach}
        
        <span>{$pagination}</span>
      </div>
      <div class="clear"></div>
    </div>