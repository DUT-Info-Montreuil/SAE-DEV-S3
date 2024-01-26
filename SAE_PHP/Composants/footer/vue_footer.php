<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
class VueCompFooter extends VueCompGenerique {

	public function __construct() {
		$this->affichage .= '<div class="footer"><p>© 2024 BOUETEL Quentin, MAROTTA Thomas, ZALCMAN Hugo. Tous droits réservés.</p></div>';
	}

}
