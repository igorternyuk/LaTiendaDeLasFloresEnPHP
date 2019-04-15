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
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cart/view');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public function actionCheckout(){
        User::checkIfLogged();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Оформление заказа');
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cart/checkout');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public function actionSaveOrder(){
        $res = [];
        echo json_encode($res);
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
