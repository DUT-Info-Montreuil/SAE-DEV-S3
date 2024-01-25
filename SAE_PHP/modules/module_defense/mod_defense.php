<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_defense/cont_defense.php";
require_once "module_generique.php";

class mod_defense extends ModuleGenerique {
	
	
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurDefense();
	}
	


}