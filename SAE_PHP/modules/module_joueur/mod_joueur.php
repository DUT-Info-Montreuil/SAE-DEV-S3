<?php 
    require_once "modules/module_joueur/cont_joueur.php";
    require_once "module_generique.php";

    class mod_joueur extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_joueur();
        }   
    }
?>