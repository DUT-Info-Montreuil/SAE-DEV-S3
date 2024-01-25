<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_ennemi/cont_ennemi.php";
require_once "module_generique.php";

class mod_ennemi extends ModuleGenerique {
	
	
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurEnnemi();
	}
	


}