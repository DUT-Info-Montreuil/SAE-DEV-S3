<?php
if (!defined('APPLICATION_STARTED')) {
	die("Accès interdit");
  }
  require_once "Connexion.php";
  class ModeleEnnemi extends Connexion{
	
    public function get_detailsEnnemi ($id) {
		$req = Connexion::$bdd->prepare("
		SELECT * FROM Ennemi WHERE Ennemi.idEnnemi=:id
		");
		$pdo_req = self::$bdd->prepare($req);
		$pdo_req->bindParam("id", $id, PDO::PARAM_INT);
		$pdo_req->execute();
		return $pdo_req->fetch(PDO::FETCH_ASSOC);
	}

    public function get_graphData($id)
    {
        $req = Connexion::$bdd->prepare("
		SELECT date, COUNT(date) as compte 
        FROM (
            SELECT TO_CHAR(Partie.datePartie, 'YYYY/MM/DD') AS date 
            FROM Partie 
            INNER JOIN AEteTue ON Partie.idPartie = AEteTue.idPartie 
            WHERE AEtetue.idEnnemi=:id 
            ) AS t1 
        GROUP BY date
		");
        $req->bindParam("id", $id, PDO::PARAM_INT);
        $req->execute();
        $req->fetchAll(PDO::FETCH_ASSOC);
        $dataPoints = array();
        foreach ($req as $row) {
            array_push($dataPoints, array("label"=>$row["date"], "y"=>$row["compte"]));
        }
        return $dataPoints;
    }
}