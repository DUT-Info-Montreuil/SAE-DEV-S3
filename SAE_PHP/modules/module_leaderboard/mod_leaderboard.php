<?php 
    require_once "modules/module_leaderboard/cont_leaderboard.php";
    require_once "module_generique.php";

    class mod_leaderboard extends ModuleGenerique {

        public function __construct() {
            parent::__construct();
            $this->controleur = new cont_leaderboard();
        }   
    }
?>