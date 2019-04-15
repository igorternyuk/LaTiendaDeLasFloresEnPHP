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
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Кабинет');
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/index');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public static function actionEdit(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'Редактирование профиля');
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/edit');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }
    
    public static function actionHistory(){
        parent::loadCommon();
        $this->smarty->assign('pageTitle', 'История заказов');
        //Aqui voy a tener que rescatar todos los ordenes del usuario activo
        Utils::loadTemplate($this->smarty, 'layouts/header');
        Utils::loadTemplate($this->smarty, 'cabinet/history');
        Utils::loadTemplate($this->smarty, 'rightColumn');
        Utils::loadTemplate($this->smarty, 'layouts/footer');
        return true;
    }

}
