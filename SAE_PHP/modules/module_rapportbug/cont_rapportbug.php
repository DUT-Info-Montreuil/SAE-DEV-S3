<?php
require_once "modules/module_rapportbug/modele_rapportbug.php";
require_once "modules/module_rapportbug/vue_rapportbug.php";

class cont_rapportbug {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_rapportbug();
		$this->vue = new vue_rapportbug();
    }

    public function exec() {
      $this->vue->affiche_ajoutRapport();
      $this->ajout_rapport();
    }

    public function ajout_rapport(){
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_joueur = isset($_SESSION['identifiant']) ? ($_SESSION['identifiant']) : 0;
        $titre = isset ($_POST["titre"]) ? $_POST["titre"] : die("Paramètre manquant");
        $contenu = isset ($_POST["contenu"]) ? $_POST["contenu"] : die("Paramètre manquant");
        $this->modele->ajout_rapport($id_joueur, $titre, $contenu);
      }
    }
    
}