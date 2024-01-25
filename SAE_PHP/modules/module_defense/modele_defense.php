<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "Connexion.php";
class ModeleDefense extends Connexion
{

    public function get_detailsDefence($id)
    {
        $req = Connexion::$bdd->prepare("
		SELECT * FROM  Defense where Defense.idObjet=:id
		");
        $req->bindParam("id", $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function get_graphData($id)
    {
        $req = Connexion::$bdd->prepare("
		SELECT date, COUNT(date) as compte 
        FROM (
            SELECT TO_CHAR(Partie.datePartie, 'YYYY/MM/DD') AS date 
            FROM Partie 
            INNER JOIN Place ON Partie.idPartie = Place.idPartie 
            WHERE Place.idObjet=:id 
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