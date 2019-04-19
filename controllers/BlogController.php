<?php

/**
 * Description of BlogController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class BlogController extends BaseController{
    
    public function __construct($args){
        parent::__construct($args);
    }
    
    public function actionAbout(){
        User::checkIfLogged();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'О нас');
        $aboutInfo = Blog::getById(2);
        $this->smarty->assign('aboutInfo', $aboutInfo);
        $this->smarty->assign('abountPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'about');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public function actionContacts(){
        User::checkIfLogged();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Контакты');
        $contacts = Blog::getById(3);
        $this->smarty->assign('contacts', $contacts);
        $this->smarty->assign('contactsPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'contacts');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
}
