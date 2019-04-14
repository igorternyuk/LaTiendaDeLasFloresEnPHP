<?php

/**
 * Description of ProductController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class ProductController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }

    public function actionView($productId){
        parent::loadCommon();
        $currentProduct = Product::getById($productId);
        $currentProduct['image'] = Product::getImage($productId);
        $categoryId = $currentProduct['category_id'];
        $similarProducts = Product::getByCategoryId($categoryId);
        foreach ($similarProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        //Utils::debug($similarProducts);
        $this->smarty->assign('pageTitle', 'Олюсин магазин');
        $this->smarty->assign('currentProduct', $currentProduct);
        $this->smarty->assign('similarProducts', $similarProducts);
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'product');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
}
