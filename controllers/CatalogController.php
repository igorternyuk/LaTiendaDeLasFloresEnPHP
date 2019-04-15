<?php

/**
 * Description of CatalogController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class CatalogController extends BaseController {
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionIndex($page = 1, $letter = null){
        parent::loadCommon();
        
        $this->smarty->assign('currentLetter', $letter);
        //Utils::debug($page);
        $latestProducts = Product::getLatest(intval($page), $letter);
        //Utils::debug($latestProducts);
        foreach ($latestProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        
        $this->smarty->assign('pageTitle', 'Каталог');
        $this->smarty->assign('latestProducts', $latestProducts);
        
        //Pagination
        $itemsTotal = Product::countAllAvailable($letter);
        $paginator = new Paginator($page, $itemsTotal, Product::SHOW_BY_DEFAULT,
                'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('pagination', $pagination);
        
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'catalog');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }

    public function actionCategory($categoryId, $page = 1, $letter = null){
        parent::loadCommon();
        $this->smarty->assign('currentLetter', $letter);
        $latestProducts = Product::getByCategoryId($categoryId, $page, $letter);
        foreach ($latestProducts as &$product){
            $product['image'] = Product::getImage($product['id']);
        }
        //Utils::debug($latestProducts);
        $currentCategory = Category::getById($categoryId);
        $categoryName = $currentCategory['name'];
        if(!Category::checkIfMain($categoryId)){
            $parentCategory = Category::getById($currentCategory['parent_id']);
            $categoryName .= " ".$parentCategory['name'];
            
        }
        $this->smarty->assign('categoryName', $categoryName);
        
        $this->smarty->assign('pageTitle', 'Каталог');
        $this->smarty->assign('latestProducts', $latestProducts);
        
        //Pagination
        $itemsTotal = Product::countByCategoryId($categoryId, $letter);
        $paginator = new Paginator($page, $itemsTotal, Product::SHOW_BY_DEFAULT,
                'page-');
        $pagination = $paginator->getHtml();
        $this->smarty->assign('pagination', $pagination);
    
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'category');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
}
