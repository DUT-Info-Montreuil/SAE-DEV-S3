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
}
?>