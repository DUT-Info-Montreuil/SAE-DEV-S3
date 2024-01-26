<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_entite/cont_entite.php";
require_once "module_generique.php";

class mod_entite extends ModuleGenerique {
	
	
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurEntite();
	}
	


}