<?php

/**
 * Description of AdminProductController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class AdminProductController extends AdminBaseController{
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex($page = 1, $filter = null){
        User::ensureAdmin();
        parent::loadCommon();
        $products = Product::getAll($page, $filter);
        foreach ($products as &$product){
            $product['category_fullname'] =
                    Category::getFullName($product['id']);
        }
        $itemsTotal = Product::countAll($filter);
        $paginator = new Paginator($page, $itemsTotal,
                Order::SHOW_BY_DEFAULT, 'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('products', $products);
        $this->smarty->assign('pageTitle', 'Листинг товаров');
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('pagination', $pagination);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/products/index');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
}
