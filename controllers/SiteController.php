<?php

/**
 * Description of SiteController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class SiteController extends BaseController{

    public function __construct($args){
        parent::__construct($args);
    }

    public function actionIndex(){
        $allCategories = Category::getAllMainCategoriesWithChildren();
        $irises = Product::getByCategoryId(1);
        Utils::debug($irises);
        $newProducts = Product::getAllNew();
        foreach ($newProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $recommendedProducts = Product::getAllRecommended();
        foreach ($recommendedProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $productsWithDiscount = Product::getAllWithDiscount();
        foreach ($productsWithDiscount as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        //Utils::debug($productsWithDiscount);
        $this->smarty->assign('pageTitle', 'Олюсин магазин');
        $this->smarty->assign('allCategories', $allCategories);
        $this->smarty->assign('newProducts', $newProducts);
        $this->smarty->assign('recommendedProducts', $recommendedProducts);
        $this->smarty->assign('productsWithDiscount', $productsWithDiscount);
    
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'index');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
}
