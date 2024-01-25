<?php

class ModeleEntite extends Connexion{
	
	public function get_listeDefence () {
		$req = "SELECT * FROM  defence";
		$pdo_req = self::$bdd->query($req);
		return $pdo_req->fetchAll();
	}

    public function get_listeEnnemi () {
		$req = "SELECT * FROM  ennemi";
		$pdo_req = self::$bdd->query($req);
		return $pdo_req->fetchAll();
	}
	
	public function get_detailsDefence ($id) {
		$req = "SELECT * FROM defence WHERE idDefence=:id";
		$pdo_req = self::$bdd->prepare($req);
		$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
		$pdo_req->execute();
		return $pdo_req->fetch();
	}
	
    public function get_detailsEnnemi ($id) {
		$req = "SELECT * FROM ennemi WHERE idEnnemi=:id";
		$pdo_req = self::$bdd->prepare($req);
		$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
		$pdo_req->execute();
		return $pdo_req->fetch();
	}
}