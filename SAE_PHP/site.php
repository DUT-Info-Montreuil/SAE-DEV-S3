<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}

class Site {

	private $module_name;
	private $module;
	
	
	public function __construct() {
		$this->module_name = isset($_GET['module']) ? $_GET['module'] : "accueil";

		switch ($this->module_name) {
			case "accueil" :
			case "map" :
			case "joueur" :
			case "leaderboard" :
			case "recherche" : 
			case "signInUp" :
			case "recherche" :
			case "rapportbug" :
			case "apropos" : 
			case "maps" :
			case "signInUp" :
				require_once "modules/module_".$this->module_name."/mod_".$this->module_name.".php";
				break;
			default :
				die ("Module inexistant");
		}
	}
	
	public function exec_module() {
		$module_class = "mod_".$this->module_name;
		$this->module = new $module_class();
		$this->module->exec();
	}

	public function get_module() {
		return $this->module;
	}

}
?>