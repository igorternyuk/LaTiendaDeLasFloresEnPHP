<?php

/**
 * Description of CatalogController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class CatalogController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex(){
        $allCategories = Category::getAllMainCategoriesWithChildren();
        $latestProducts = Product::getLatest();
        foreach ($latestProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        //Utils::debug($productsWithDiscount);
        $this->smarty->assign('pageTitle', 'Каталог');
        $this->smarty->assign('allCategories', $allCategories);
        $this->smarty->assign('latestProducts', $latestProducts);
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
    
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'catalog');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }

    public function actionCategory($categoryId, $page = 1){
        $allCategories = Category::getAllMainCategoriesWithChildren();
        $latestProducts = Product::getByCategoryId($categoryId, $page);
        foreach ($latestProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        
        
        
        
        //Utils::debug($productsWithDiscount);
        $this->smarty->assign('pageTitle', 'Каталог');
        $this->smarty->assign('allCategories', $allCategories);
        $this->smarty->assign('latestProducts', $latestProducts);
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
    
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'catalog');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
}
