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
        $liste = array(
            array(
                'idJoueur' => 1,
                'Pseudo' => 'Joueur1',
                'ScoreTotal' => 1500,
                'MoyenneNbVague' => 5,
                'MapLaPlusUtilisee' => 'Map1'
            ),
            array(
                'idJoueur' => 2,
                'Pseudo' => 'Joueur2',
                'ScoreTotal' => 1200,
                'MoyenneNbVague' => 4,
                'MapLaPlusUtilisee' => 'Map2'
            ),
            array(
                'idJoueur' => 3,
                'Pseudo' => 'Joueur3',
                'ScoreTotal' => 1800,
                'MoyenneNbVague' => 6,
                'MapLaPlusUtilisee' => 'Map3'
            )
        );

        $this->vue->afficheLeaderboard($liste);    
    }
}