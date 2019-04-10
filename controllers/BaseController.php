<?php

/**
 * Description of BaseController
 *
 * @author Igor Ternyuk <xmonad100 at gmail.com>
 */
class BaseController {
    protected $smarty;
    
    public function __construct($args){
        $this->smarty = $args['smarty'];
    }
}
