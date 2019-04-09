<?php

/**
 * Description of SiteController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class SiteController {
    private $smarty;
    
    public function __construct($args){
        $this->smarty = $args['smarty'];
    }

    public function actionIndex(){
        $this->smarty->assign('pageTitle', 'Олюсин магазин');
    
        Utils::loadTemplate($this->smarty, 'header');
        Utils::loadTemplate($this->smarty, 'index');
        Utils::loadTemplate($this->smarty, 'footer');
    }
}
