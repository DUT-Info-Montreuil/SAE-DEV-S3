<?php
require_once "modules/module_joueur/modele_joueur.php";
require_once "modules/module_joueur/vue_joueur.php";

class cont_joueur {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_joueur();
		$this->vue = new vue_joueur();
    }

    public function exec() {
      $id_joueur = isset ($_GET["id"]) ? $_GET["id"] : die("id du joueur manquant");
      $fiche_joueur = $this->modele->get_fiche_joueur($id_joueur);
      $prog_quetes = $this->modele->get_progression_quetes($id_joueur);
      $amis_joueur = $this->modele->get_amis($id_joueur);
      $this->vue->affiche ($fiche_joueur, $prog_quetes, $amis_joueur);
    }
}