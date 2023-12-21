<?php

require_once "Composants/menu/vue_menu.php";


class ControleurCompMenu {

	public function __construct() {
		$this->vue = new VueCompMenu();
	}


	public function exec () {
		$this->vue->vue_menu();
	}	


}
