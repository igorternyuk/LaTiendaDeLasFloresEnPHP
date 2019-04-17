<div class="right_content"> 
      <div class="title"><span class="title_icon"><img src="{$templateWebPath}images/bullet3.gif" alt="" /></span>О нашем магазине</div>
      <div class="about">
        <p> <img src="{$templateWebPath}images/about.gif" alt="" class="right" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. </p>
      </div>
      <div class="right_box">
        <div class="title">
            <span class="title_icon">
                <img src="{$templateWebPath}images/bullet4.gif" alt="" />
            </span>
            Товары со скидками
        </div>
        {foreach $productsWithDiscount as $product}
        <div class="new_prod_box"> <a href="/product/{$product['id']}">{$product['name']}</a>
          <div class="new_prod_bg">
              <span class="new_icon">
                  <img src="{$templateWebPath}images/promo_icon.gif" alt="" />
              </span>
              <a href="/product/{$product['id']}">
                <img src="{$product['image']}" width='90' alt="" class="thumb" border="0" />
              </a>
          </div>
        </div>
        {/foreach}
        
      </div>
      <div class="right_box">
        <div class="title"><span class="title_icon"><img src="{$templateWebPath}images/bullet5.gif" alt="" /></span>Категории</div>
        <ul class="list">
          {foreach $allCategories as $category}
              <li ><a href="/catalog/{$category['id']}">{$category['name']}({$category['count']})</a></li>
            {if $category['children'] != false }
                {foreach $category['children'] as $child}
                <li ><a class="sub" href="/catalog/{$child['id']}">{$child['name']}({$child['count']})</a></li>
                {/foreach}
            {/if}
          {/foreach}
        </ul>
      </div>
    </div>