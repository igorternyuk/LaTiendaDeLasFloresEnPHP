<?php

/**
 * Description of AdminCategoryController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class AdminCategoryController extends AdminBaseController{
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex($page = 1){
        User::ensureAdmin();
        parent::loadCommon();
        $categories = Category::getForPage($page);
        
        $itemsTotal = Category::countAll();
        $paginator = new Paginator($page, $itemsTotal,
                Category::SHOW_BY_DEFAULT, 'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('pageTitle', 'Управление категориями');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('adminPageActive', true);
        $this->smarty->assign('pagination', $pagination);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/categories/index');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionCreate(){
        User::ensureAdmin();
        parent::loadCommon();        
        $this->smarty->assign('pageTitle', 'Добавление категории');
        $this->smarty->assign('adminPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/categories/create');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
    
    public function actionEdit($categoryId){
        User::ensureAdmin();
        parent::loadCommon();
        $currentCategory = Category::getById($categoryId);
        $this->smarty->assign('currentCategory', $currentCategory);
        $this->smarty->assign('pageTitle', 'Добавление категории');
        $this->smarty->assign('adminPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/categories/edit');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
}
