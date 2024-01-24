<?php 
    require_once "modules/module_recherche/cont_recherche.php";
    require_once "module_generique.php";

    class mod_recherche extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_recherche();
        }
    }
?>