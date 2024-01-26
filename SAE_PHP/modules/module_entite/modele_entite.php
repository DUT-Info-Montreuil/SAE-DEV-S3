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

	public function get_graphDataDefense($id)
    {
        $req = Connexion::$bdd->prepare("
		SELECT date, COUNT(date) as compte 
        FROM (
            SELECT date_format(Partie.datePartie, '%d/%m/%Y') AS date 
            FROM Partie 
            inner JOIN Place on(Partie.idPartie=Place.idPartie)
            WHERE Place.idObjet=:id 
            ) AS t1 
        GROUP BY date
		");
        $req->bindParam("id", $id, PDO::PARAM_INT);
        $req->execute();
        $result =$req->fetchAll(PDO::FETCH_ASSOC);
        $dataPoints = array();
        foreach ($result as $row) {
            array_push($dataPoints, array("label"=>$row["date"], "y"=>$row["compte"]));
        }
		
        return $dataPoints;
    }
	
    public function get_detailsEnnemi ($id) {
		$req = Connexion::$bdd->prepare("
		SELECT * FROM Ennemi WHERE Ennemi.idEnnemis=:id
		");
		$req->bindParam("id", $id, PDO::PARAM_INT);
		$req->execute();
		return $req->fetch(PDO::FETCH_ASSOC);
	}

	public function get_graphDataEnnemi($id)
    {
        $req = Connexion::$bdd->prepare("
		SELECT date, COUNT(date) as compte 
        FROM (
            SELECT date_format(Partie.datePartie, '%d/%m/%Y') AS date 
            FROM Partie 
            natural JOIN AeteTue 
            WHERE idEnnemi=:id 
            ) AS t1 
        GROUP BY date;
		");
        $req->bindParam("id", $id, PDO::PARAM_INT);
        $req->execute();
        $result=$req->fetchAll(PDO::FETCH_ASSOC);
        $dataPoints = array();
        foreach ($result as $row) {			
            array_push($dataPoints, array("label"=>$row["date"], "y"=>$row["compte"]));
        }
        return $dataPoints;
    }
}