<?php 
if (!defined('APPLICATION_STARTED')) {
  die("Accès interdit");
}
require_once "Connexion.php";
class modele_accueil extends Connexion{

    public function lesQuetes() {
    $req = Connexion::$bdd->prepare("SELECT * FROM Quetes");
    $req->execute();
    $retour = $req->fetchAll();
    return $retour;
    }

  public function leMeilleurObjet($type){
    $req = Connexion::$bdd->prepare('SELECT * FROM Defense WHERE TypeObjet = :typeObjet AND idObjet = (SELECT MAX(idObjet) FROM Defense WHERE TypeObjet = :typeObjet)');
    $req->bindParam(":typeObjet", $type, PDO::PARAM_STR);
    $req->execute();
    $retour = $req->fetch(PDO::FETCH_ASSOC);
    return $retour;
  }


    public function leMeilleurEnnemi(){
      $req = Connexion::$bdd->prepare('SELECT * FROM Ennemi WHERE idEnnemis IN (SELECT MIN(idEnnemi) FROM AeteTue)');
      $req->execute();
      $retour = $req->fetch(PDO::FETCH_ASSOC);
      return $retour;
    }
}

?>