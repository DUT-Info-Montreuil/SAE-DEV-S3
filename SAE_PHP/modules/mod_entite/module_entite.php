<?php
require_once "modules/mod_entite/controleur_entite.php";

class ModEntite extends ModuleGenerique {
	
	
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurEntite();
	}
	


}