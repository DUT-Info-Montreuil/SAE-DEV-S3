<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
    require_once "modules/module_accueil/cont_accueil.php";
    require_once "module_generique.php";

    class mod_accueil extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_accueil();
        }
    }
?>