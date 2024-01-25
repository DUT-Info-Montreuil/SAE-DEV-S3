<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}

class VueCompGenerique {

	protected $affichage;

	public function __construct() {
		$this->affichage = "";

	}

	public function getAffichage() {
		return $this->affichage;

	}


}
