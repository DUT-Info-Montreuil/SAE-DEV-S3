<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "Composants/footer/controleur_footer.php";

class ComposantFooter extends ComposantGenerique {
	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurCompFooter();
	}
	

}
