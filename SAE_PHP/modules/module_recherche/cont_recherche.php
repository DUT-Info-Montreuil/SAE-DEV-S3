<?php
require_once "modules/module_recherche/modele_recherche.php";
require_once "modules/module_recherche/vue_recherche.php";

class cont_recherche {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_recherche();
		$this->vue = new vue_recherche();
    }

    public function exec() {
        $this->vue->affiche_recherche();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $searchTerm = $_POST['query']; 
            $joueurs = $this->modele->rechercheLesJoueurs($searchTerm);
            if($joueurs == NULL){
                $this->vue->affiche_null();
            } else {
                $this->vue->affiche_resultat($joueurs);
            }
        } else {
            $this->vue->affiche_null();
        }
    }
    
}