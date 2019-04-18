<?php

/**
 * Description of AdminOrderController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class AdminOrderController extends AdminBaseController{
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex($page = 1){
        User::ensureAdmin();
        parent::loadCommon();
        $orders = Order::getForPage($page);
        foreach ($orders as &$order){
            $order['status_description'] =
                    Order::getStatusDescription($order['status']);
        }
        $itemsTotal = Order::countAll();
        $paginator = new Paginator($page, $itemsTotal,
                Order::SHOW_BY_DEFAULT, 'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('orders', $orders);
        $this->smarty->assign('pageTitle', 'Листинг заказов');
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('pagination', $pagination);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/orders/index');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionView($orderId){
        User::ensureAdmin();
        parent::loadCommon();
        $order = Order::getById($orderId);
        $orderItems = OrderItem::getAllOrderItemsByOrderId($orderId);
        $order['items'] = $orderItems;
        $order['status_description'] =
                    Order::getStatusDescription($order['status']);
        
        //Utils::debug($order);
        $this->smarty->assign('order', $order);
        $this->smarty->assign('pageTitle', 'Просмотр данных заказа');
        $this->smarty->assign('adminPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/orders/view');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionUpdate($orderId){
        User::ensureAdmin();
        parent::loadCommon();
        $order = Order::getById($orderId);
        $orderStatusOptions = [];
        foreach(OrderStatus as $key => $value){
            array_push($orderStatusOptions, ['id' => $key, 'description' => $value]);
        }
        //Utils::debug($orderStatusOptions);
        $this->smarty->assign('order', $order);
        $this->smarty->assign('pageTitle', 'Редактирование данных заказа');
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('orderStatusOptions', $orderStatusOptions);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/orders/edit');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
}
