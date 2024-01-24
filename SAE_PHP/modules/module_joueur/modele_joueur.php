<?php 
require_once "Connexion.php";
class modele_joueur extends Connexion{

    public function get_fiche_joueur($id) {
        $nrq = Connexion::$bdd->prepare("
        SELECT Joueurs.Pseudo, Joueurs.experience, SUM(score) AS ScoreTotal, AVG(Partie.nbVague) AS MoyenneNbVague, MAX(Partie.idMap) AS MapLaPlusUtilisee, SUM(Partie.PartieFinie = true) AS NbPartieGagnée, COUNT(Partie.idPartie) AS NbPartiesJouées
            FROM Joueurs 
            INNER JOIN Partie ON Joueurs.idJoueur = Partie.idJoueur
            WHERE Joueurs.idJoueur =:id
    ");
    $nrq->bindParam("id", $id, PDO::PARAM_INT);
    $nrq->execute();
    $retour = $nrq->fetch(PDO::FETCH_ASSOC);
    return $retour;
    }

    public function get_progression_quetes($id) {
        $nrq = Connexion::$bdd->prepare("
            SELECT Quetes.nom, Progression.progression
            FROM Quetes
            LEFT JOIN Progression ON Quetes.idQuete = Progression.idQuete
            WHERE Progression.idJoueur = :idJoueur
        ");
        $nrq->bindParam(":idJoueur", $id, PDO::PARAM_INT); 
        $nrq->execute();
        $retour = $nrq->fetchAll(PDO::FETCH_ASSOC);
    
        return $retour;
    }
    
    public function get_amis($id) {
        $nrq = Connexion::$bdd->prepare("SELECT Joueurs.idJoueur, Joueurs.Pseudo 
        FROM Joueurs 
        WHERE idJoueur IN 
        ( SELECT CASE 
        WHEN idJoueur = :id
        THEN idJoueur_Joueur 
        ELSE idJoueur 
        END AS ami_id 
        FROM AUneRelationAvec 
        WHERE (idJoueur = :id OR idJoueur_Joueur = :id) 
        AND Amis = TRUE)
        ");
    $nrq->bindParam("id", $id, PDO::PARAM_INT);
    $nrq->execute();
    $retour = $nrq->fetchAll(PDO::FETCH_ASSOC);
    return $retour;
    }
    
}

?>