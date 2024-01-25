<?php
require_once "modules/module_maps/modele_maps.php";
require_once "modules/module_maps/vue_maps.php";

class cont_maps {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_maps();
		$this->vue = new vue_maps();
    }

    public function exec() {
        $lesmaps = 	$this->modele->get_maps();
        $this->vue->affiche_maps($lesmaps);
    }
}