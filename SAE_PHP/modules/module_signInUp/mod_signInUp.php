<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
    require_once "modules/module_signInUp/cont_signInUp.php";
    require_once "module_generique.php";

    class mod_signInUp extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_signInUp();
        }
    }