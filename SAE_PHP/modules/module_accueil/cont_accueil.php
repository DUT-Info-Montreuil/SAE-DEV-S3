<?php
require_once "modules/module_accueil/modele_accueil.php";
require_once "modules/module_accueil/vue_accueil.php";

class cont_accueil {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_accueil();
		$this->vue = new vue_accueil();
    }

    public function exec() {    
      $quetes = $this->modele->lesQuetes();
      
      $this->vue->affiche_recherche();
      
      $this->vue->affiche_quetes($quetes);

      $ennemi = $this->modele->leMeilleurEnnemi();
      $tourelle = $this->modele->leMeilleurObjet("Tourelle");
      $obstacle = $this->modele->leMeilleurObjet("Obstacle");

      $this->vue->affiche_meilleuresEntitees($ennemi, $tourelle, $obstacle);
    }
}