<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}

require_once "Composants/footer/vue_footer.php";


class ControleurCompFooter {

	public function __construct() {
		$this->vue = new VueCompFooter();
	}


	public function exec () {
		$this->vue->vue_footer();
	}	


}
