<?php 
    require_once "modules/module_apropos/cont_apropos.php";
    require_once "module_generique.php";

    class mod_apropos extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_apropos();
        }
    }
?>