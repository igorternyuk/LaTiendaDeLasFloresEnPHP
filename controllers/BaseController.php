<?php

/**
 * Description of BaseController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class BaseController {
    protected $smarty;
    
    public function __construct($args){
        $this->smarty = $args['smarty'];
    }
    
    protected function loadCommon(){
        
        $allCategories = Category::getAllMainCategoriesWithChildren();
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $letterReferences = [];
        $latinLetters = range('a','z');
        $letterReferences['#'] = Paginator::generateLetterReferenceHtml(null);
        foreach($latinLetters as $letter){
            $letterReferences[$letter] = Paginator::generateLetterReferenceHtml($letter);
        }
        $this->smarty->assign('allCategories', $allCategories);
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
        $this->smarty->assign('letterReferences', $letterReferences);
    }
    
}
