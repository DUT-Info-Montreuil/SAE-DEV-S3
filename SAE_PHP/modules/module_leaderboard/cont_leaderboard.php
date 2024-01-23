<?php
require_once "modules/module_leaderboard/modele_leaderboard.php";
require_once "modules/module_leaderboard/vue_leaderboard.php";

class cont_leaderboard {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_leaderboard();
		$this->vue = new vue_leaderboard();
    }

    public function exec() {
        $liste = $this->modele-> getListeJoueur();

        $this->vue->afficheLeaderboard($liste);    
    }
}