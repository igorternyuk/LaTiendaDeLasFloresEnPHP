<?php

/**
 * Description of AdminBaseController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class AdminBaseController {
    protected $smarty;
    
    public function __construct($args){
        $this->smarty = $args['smarty'];
    }
    
    public static function checkIfAdmin(){
        $loggedUserId = User::checkIfLogged();
        $isAdmin = User::checkIfAdmin($loggedUserId);
        
        if(!$isAdmin){
            die("Недостаточно прав доступа");
        }
    }
    
    protected function loadCommon(){
        $this->loadAllCategories();
        $loggedUserId = User::getLoggedUserId();
        if($loggedUserId){
            $loggedUser = User::getById($loggedUserId);
            $this->smarty->assign('loggedUser', $loggedUser);
            if(User::checkIfAdmin($loggedUserId)){
                $this->smarty->assign('adminLogged', true);
            }
        }
        $this->loadProductsWithDiscount();
    }
    
    protected function loadAllCategories(){
        $allMainCategories = Category::getAllMainCategories();
        $allSubCategories = Category::getAllSubCategories();
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
        $this->smarty->assign('allMainCategories', $allMainCategories);
        $this->smarty->assign('allSubCategories', $allSubCategories);
    }
    
    protected function loadProductsWithDiscount(){
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
    }
        
}
