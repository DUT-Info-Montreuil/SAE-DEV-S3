<?php
if (!defined('APPLICATION_STARTED')) {
   die("Accès interdit");
}
require_once "Connexion.php";
class modele_rapportbug extends Connexion{

     public function ajout_rapport ($idJoueur, $titre, $contenu){
      try {
         $ins = Connexion::$bdd->prepare("INSERT INTO RapportBug (titre, description, date, resolut, idJoueur) VALUES (?, ?, ?, ?, ?)");
         $ins->execute([$titre, $contenu, date("Y-m-d"), 0, $idJoueur]);
         return true; 
     } catch (PDOException $e) {
         return false;
     }
     }

   public function get_listeRapport() {
      $req = Connexion::$bdd->prepare("SELECT RapportBug.idRapportBug, RapportBug.titre FROM RapportBug WHERE resolut = FALSE");
      $req->execute();
      $retour = $req->fetchAll(PDO::FETCH_ASSOC);
  
  return $retour;
  }

  public function get_fiche_rapport($id) {
   $nrq = Connexion::$bdd->prepare(" SELECT * FROM RapportBug WHERE idRapportBug = :id");
   $nrq->bindParam("id", $id, PDO::PARAM_INT);
   $nrq->execute();
   $retour = $nrq->fetch(PDO::FETCH_ASSOC);
   return $retour;
   }
   public function marqueCommeResolut($id){
      $res = Connexion::$bdd->prepare(" UPDATE RapportBug SET resolut = true WHERE idRapportBug = :id;");
      $res->bindParam("id", $id, PDO::PARAM_INT);
      $res->execute();
   }
}
?>