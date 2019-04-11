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
        $product = Product::getById($productId);
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'product');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
}
