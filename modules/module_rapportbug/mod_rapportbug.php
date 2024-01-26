<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
    require_once "modules/module_rapportbug/cont_rapportbug.php";
    require_once "module_generique.php";

    class mod_rapportbug extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_rapportbug();
        }
    }
?>