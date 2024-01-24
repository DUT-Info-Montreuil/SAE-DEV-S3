<?php
require_once "modules/module_apropos/vue_apropos.php";

class cont_apropos   {
    private $vue;

    public function __construct(){
		$this->vue = new vue_apropos();
    }

    public function exec() {    
        $this->vue->affiche();
    }
}