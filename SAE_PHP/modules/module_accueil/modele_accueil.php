<?php 
require_once "Connexion.php";
class modele_accueil extends Connexion{

    public function lesQuetes() {
		$req = "SELECT * FROM Quetes";
		$pdo_req = self::$bdd->query($req);
		return $pdo_req->fetchAll();
    }

    public function laMeilleureTourelle(){
        $req = "SELECT * FROM Defense WHERE idObjet IN (SELECT max(idObjet) FROM Place)";
    }
}

?>