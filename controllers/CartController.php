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
        $errors = [];
        
        $username = filter_input(INPUT_POST, 'username');
        if(!User::checkUsername($username)){
            array_push($errors, "Минимальная длина для имени: "
                    . User::USERNAME_LENGTH_MIN);
        }
        
        $userphone = filter_input(INPUT_POST, 'phone');
        if(!User::checkPhone($userphone)){
            array_push($errors, "Формат телефона не соответствует"
                    . " ни одному мобильному оператору Украины.");
        }
        
        $useraddress = filter_input(INPUT_POST, 'address');
        
        $userId = User::getLoggedUserId();
        $userIp = filter_input(INPUT_SERVER, 'REMOTE_ADDR');
        $cartTotalSum = Cart::calcTotalSum();
        $comment = filter_input(INPUT_POST, 'comment');
        
        $params = [
            'user_id' => $userId,
            'user_ip' => $userIp,
            'total' => $cartTotalSum,
            'username' => $username,
            'userphone' => $userphone,
            'useraddress' => $useraddress,
            'comment' => $comment
        ];
        
        $res = [];
        $res['errors'] = $errors;
        
        if(Order::saveNew($params)){
            $res['success'] = true;
            $res['message'] = "Ваш заказ успешно сохранен!";
        } else {
            $res['success'] = false;
            //Utils::debug(Db::getLastError());
            $res['message'] = "Ошибка сохранения заказа => ";
        }
        
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
