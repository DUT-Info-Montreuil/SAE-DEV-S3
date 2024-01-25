<?php
if (!defined('APPLICATION_STARTED')) {
	die("Accès interdit");
  }
  require_once "Connexion.php";
  class ModeleEntite extends Connexion{
	
	public function get_listeDefence () {
		$req = Connexion::$bdd->prepare("
		SELECT * from Defense
		");
		$req->execute();
		$retour = $req->fetchAll(PDO::FETCH_ASSOC);
		return $retour;
	}

    public function get_listeEnnemi () {
		$req = Connexion::$bdd->prepare("
		SELECT * FROM  Ennemi
		");
		$req->execute();
		return $req->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function get_detailsDefence ($id) {
		$req = Connexion::$bdd->prepare("
		SELECT * FROM  Defense where Defense.idObjet=:id
		");
		$req->bindParam("id", $id, PDO::PARAM_INT);
		$req->execute();
		return $req->fetch(PDO::FETCH_ASSOC);
	}
	
    public function get_detailsEnnemi ($id) {
		$req = Connexion::$bdd->prepare("
		SELECT * FROM Ennemi WHERE Ennemi.idEnnemis=:id
		");
		$pdo_req = self::$bdd->prepare($req);
		$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
		$pdo_req->execute();
		return $pdo_req->fetch(PDO::FETCH_ASSOC);
	}
}