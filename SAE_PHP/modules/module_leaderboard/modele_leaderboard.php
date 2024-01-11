<?php 
require_once "Connexion.php";
class modele_leaderboard extends Connexion{

    public function getListeJoueur(){
        $nrq = Connexion::$bdd->prepare("
            SELECT Joueurs.idJoueur, Joueurs.Pseudo, SUM(score) AS ScoreTotal, AVG(Partie.nbVague) AS MoyenneNbVague, MAX(Partie.idMap) AS MapLaPlusUtilisee
            FROM Joueurs 
            INNER JOIN Partie ON Joueurs.idJoueur = Partie.idJoueur 
            GROUP BY Joueurs.idJoueur, Joueurs.Pseudo 
            ORDER BY ScoreTotal DESC
        ");
        $nrq->execute();
        $retour = $nrq->fetchAll(PDO::FETCH_ASSOC);

        return $retour;
    } 
}

?>