<?php 

class Administration {

    public function __construct() {
        $this->ci =& get_instance();

        //twig
        $this->_twigFix();
    }

    private function _twigFix() {
        $this->ci->twig->addGlobal("base_url", base_url());
    }

}