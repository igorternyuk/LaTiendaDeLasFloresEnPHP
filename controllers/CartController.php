<?php

/**
 * Description of CartController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class CartController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Корзина');
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'cart');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'footer');
        return true;
    }
    
    public function actionAddProduct($productId){
        Cart::addProduct($productId);
        $res = [];
        $res['cartTotalItems'] = Cart::calcTotalItems();
        $res['cartTotalSum'] = Cart::calcTotalSum();
        echo json_encode($res);
        return true;
    }
    
    public function actionRemoveProduct($productId){
        Cart::removeProduct($productId);
        $res = [];
        $res['cartTotalItems'] = Cart::calcTotalItems();
        $res['cartTotalSum'] = Cart::calcTotalSum();
        echo json_encode($res);
        return true;
    }
    
    public function actionUpdateProductCount($productId, $NewCount){
        Cart::updateProductCount($productId, $NewCount);
        $res = [];
        $res['cartTotalItems'] = Cart::calcTotalItems();
        $res['cartTotalSum'] = Cart::calcTotalSum();
        $res['newSubTotal'] = Cart::getProductSubtotal($productId);
        echo json_encode($res);
        return true;
    }

}
