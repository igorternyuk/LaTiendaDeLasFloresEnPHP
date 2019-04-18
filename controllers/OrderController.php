<?php

/**
 * Description of OrderController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class OrderController extends BaseController{
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionUpdate($orderId){
        $status = filter_input(INPUT_POST, 'orderStatus');
        $paymentDate = filter_input(INPUT_POST, 'paymentDate');
        $params = [
            'date_payment' => $paymentDate,
            'status' => $status,
            'order_id' => $orderId
        ];
        //Utils::debug($params);
        $res = [];
        if(Order::update($params)){
            $res['success'] = true;
            $res['message'] = "Заказ успешно обновлен";
        } else {
            $res['success'] = false;
            $res['message'] = "Ошибка обновления заказа";
        }
        echo json_encode($res);
        return true;
    }
}
