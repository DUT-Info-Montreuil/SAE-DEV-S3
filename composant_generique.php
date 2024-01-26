<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}

class ComposantGenerique {

	protected $controleur;

	public function __construct () {

	}

	public function getAffichage() {

		return $this->controleur->vue->getAffichage();

	}
	
}
