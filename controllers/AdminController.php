<?php

/**
 * Description of AdminController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class AdminController extends AdminBaseController{
    
    public function actionIndex(){
        User::ensureAdmin();
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Редактирование профиля');
        $this->smarty->assign('adminPageActive', true);
        Utils::loadTemplate($this->smarty, 'layouts/adminHeader');
        Utils::loadTemplate($this->smarty, 'admin/index');
        Utils::loadTemplate($this->smarty, 'admin/rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/adminFooter');
        return true;
    }
}
