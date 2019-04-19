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
    
    public function actionIndex($page = 1, $search = false){
        User::ensureAdmin();
        parent::loadCommon();
        if($search){
            $filter = filter_input(INPUT_POST, 'search');
        } else {
            $filter = null;
        }
        
        $products = Product::getAll($page, $filter);
        foreach ($products as &$product){
            $product['category_fullname'] =
                    Category::getFullName($product['category_id']);
        }
        
        //Utils::debug(['filter' => $filter, 'products' => $products]);
        $itemsTotal = Product::countAll($filter);
        $paginator = new Paginator($page, $itemsTotal,
                Product::SHOW_BY_DEFAULT, 'page-');
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
    
    public function actionCreate(){
        User::ensureAdmin();
        parent::loadCommon();                
        $this->smarty->assign('pageTitle', 'Листинг товаров');
        $this->smarty->assign('adminPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/products/create');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionEdit($productId){
        User::ensureAdmin();
        parent::loadCommon();
        $product = Product::getById($productId);
        $product['image'] = Product::getImage($product['id']);
        $this->smarty->assign('pageTitle', 'Просмотр данных о товаре');
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('product', $product);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/products/edit');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionView($productId){
        User::ensureAdmin();
        parent::loadCommon();
        $product = Product::getById($productId);
        $product['image'] = Product::getImage($product['id']);
        $product['categoryFullName'] = Category::getFullName($product['category_id']);
        $this->smarty->assign('pageTitle', 'Просмотр данных о товаре');
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('product', $product);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/products/view');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }

}
