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
        parent::loadCommon();
        //$irisCount = Product::getLatest(1, 'B');
        //Utils::debug($irisCount);
        $newProducts = Product::getAllNew();
        foreach ($newProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        $recommendedProducts = Product::getAllRecommended();
        foreach ($recommendedProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        
        //Utils::debug($productsWithDiscount);
        $this->smarty->assign('pageTitle', 'Олюсин магазин');
        $this->smarty->assign('newProducts', $newProducts);
        $this->smarty->assign('recommendedProducts', $recommendedProducts);
    
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'index');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
}
