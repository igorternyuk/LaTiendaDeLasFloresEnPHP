<?php

/**
 * Description of CabinetController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class CabinetController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex(){
        User::checkIfLogged();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Кабинет');
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/index');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public static function actionEdit(){
        User::checkIfLogged();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Редактирование профиля');
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/edit');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public static function actionHistory($page = 1){
        User::checkIfLogged();
        parent::loadCommon();
        $loggedUserId = User::getLoggedUserId();
        $ordersTotal = Order::countByUserId($loggedUserId);
        $userOrders = Order::getByUserId($loggedUserId, $page);
        foreach($userOrders as &$order){
            $orderItems = OrderItem::getAllOrderItemsByOrderId($order['id']);
            $order['items'] = $orderItems;
            $order['status_description'] = Order::getStatusDescription($order['status']);
        }
        
        //Utils::debug($userOrders);
        
        $paginator = new Paginator($page, $ordersTotal, Order::SHOW_BY_DEFAULT,
                'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('pagination', $pagination);
        
        $this->smarty->assign('pageTitle', 'История заказов');
        $this->smarty->assign('userOrders', $userOrders);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/history');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }

}
