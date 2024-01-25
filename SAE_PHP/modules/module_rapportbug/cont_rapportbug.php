<?php
if (!defined('APPLICATION_STARTED')) {
  die("Accès interdit");
}
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
      if (isset($_SESSION["role"]["admin"]) && $_SESSION["role"]["admin"] == true) {
        if(isset($_GET['action']) && $_GET['action'] === 'detail'){
          $this->details();
        } elseif (isset($_GET['action']) && $_GET['action'] === 'confirmationsupp'){
          $this->confirmation();
        } else {
          $this->lecture_rapport();
      }
      } else {
      if (isset($_GET['action']) && $_GET['action'] === 'confirmationajout') {
          $this->ajout_rapport();
      } else {
        $this->vue->affiche_ajoutRapport();
      }
      }
  }

  public function ajout_rapport(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if ($_SESSION["csrf_token"] == $_POST["csrf_token"]) {  
            $id_joueur = isset($_SESSION["id"]) ? ($_SESSION["id"]) : 0;
            $titre = isset ($_POST["titre"]) ? $_POST["titre"] : die("Paramètre manquant");
            $contenu = isset ($_POST["contenu"]) ? $_POST["contenu"] : die("Paramètre manquant");
            $this->vue->vue_reponse($this->modele->ajout_rapport($id_joueur, $titre, $contenu));
        } else{
            die("Erreur CSRF : Token invalide.");
        }
    }
}


public function lecture_rapport(){
  $lesRapports =  $this->modele->get_listeRapport();
  $this->vue->affiche_resultat($lesRapports);
 }

 public function details(){
   $id = isset ($_GET["id"]) ? $_GET["id"] : die("id du rapport manquant");
   $fiche_rapport = $this->modele->get_fiche_rapport($id);
   $this->vue->affiche_detail($fiche_rapport);
 }

 public function confirmation(){
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = isset ($_GET["id"]) ? $_GET["id"] : die("id du rapport manquant");
    $this->modele->marqueCommeResolut($id);
    $this->vue->affiche_confirmation();
    $this->lecture_rapport();
 }
 }
 
}