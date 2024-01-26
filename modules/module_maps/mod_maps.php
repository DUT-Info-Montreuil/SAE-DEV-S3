<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
    require_once "modules/module_maps/cont_maps.php";
    require_once "module_generique.php";

    class mod_maps extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_maps();
        }   
    }
?>