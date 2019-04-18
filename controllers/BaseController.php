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
        $this->loadCartInfo();
        $this->loadAllCategories();
        $this->loadProductsWithDiscount();
        $this->loadLetterReferences();
        $loggedUserId = User::getLoggedUserId();
        if($loggedUserId){
            $loggedUser = User::getById($loggedUserId);
            $this->smarty->assign('loggedUser', $loggedUser);
            if(User::checkIfAdmin($loggedUserId)){
                $this->smarty->assign('adminLogged', true);
            }
        }
    }
    
    protected function loadCartInfo(){
        $cartTotalItems = Cart::calcTotalItems();
        $cartTotalSum = Cart::calcTotalSum();
        $productsInCart = Cart::getProducts();
        //Utils::debug($productsInCart);
        $this->smarty->assign('productsInCart', $productsInCart);
        $this->smarty->assign('cartTotalItems', $cartTotalItems);
        $this->smarty->assign('cartTotalSum', $cartTotalSum);
    }
    
    protected function loadAllCategories(){
        $allCategories = Category::getAllMainCategoriesWithChildren();
        foreach($allCategories as &$category){
            if(Category::checkIfMain($category['id'])){
                foreach ($category['children'] as &$child){
                    $child['count'] = Product::countByCategoryId($child['id']);
                }
            }
            $category['count'] = Product::countByCategoryId($category['id']);
        }
        $this->smarty->assign('allCategories', $allCategories);
    }
    
    protected function loadProductsWithDiscount(){
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
    }
    
    protected function loadLetterReferences(){
        $letterReferences = [];
        $latinLetters = range('a','z');
        $letterReferences['#'] = Paginator::generateLetterReferenceHtml(null);
        foreach($latinLetters as $letter){
            $letterReferences[$letter] = Paginator::generateLetterReferenceHtml($letter);
        }
        $this->smarty->assign('letterReferences', $letterReferences);
    }
    
}
