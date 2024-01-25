<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
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

    public function get_bloque($id) {
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
        AND bloquer = TRUE)
        ");
    $nrq->bindParam("id", $id, PDO::PARAM_INT);
    $nrq->execute();
    $retour = $nrq->fetchAll(PDO::FETCH_ASSOC);
    return $retour;
    }

    public function amis($id, $idJoueur){
        $liste = $this->get_amis($id);

        foreach ($liste as $element){
            if($element["idJoueur"] == $idJoueur){
                return true;
            }
        }
        return false;
    }

    public function bloque($id, $idJoueur){
        $liste = $this->get_bloque($id);

        foreach ($liste as $element){
            if($element["idJoueur"] == $idJoueur){
                return true;
            }
        }
        return false;
    }

    public function ajouterEnAmi($id, $idJoueur){
        $pdo_req = Connexion::$bdd->prepare("INSERT INTO AUneRelationAvec (idJoueur, idJoueur_joueur, amis, bloquer) VALUES (:idJoueur, :idJoueur_joueur, 1, 0)");
        $pdo_req->bindParam(":idJoueur", $idJoueur);
        $pdo_req->bindParam(":idJoueur_joueur", $id);
        $pdo_req->execute();
    }

    public function retirer($id, $idJoueur){
        $pdo_req = Connexion::$bdd->prepare("DELETE FROM AUneRelationAvec WHERE (idJoueur = :idJoueur AND idJoueur_joueur = :idJoueur_joueur) OR (idJoueur = :idJoueur_joueur AND idJoueur_joueur = :idJoueur)");
        $pdo_req->bindParam(":idJoueur", $idJoueur);
        $pdo_req->bindParam(":idJoueur_joueur", $id);
        $pdo_req->execute();
    }

    public function leBloquer($id, $idJoueur){
        $pdo_req = Connexion::$bdd->prepare("INSERT INTO AUneRelationAvec (idJoueur, idJoueur_joueur, amis, bloquer) VALUES (:idJoueur, :idJoueur_joueur, 0, 1)");
        $pdo_req->bindParam(":idJoueur", $idJoueur);
        $pdo_req->bindParam(":idJoueur_joueur", $id);
        $pdo_req->execute();
    }

    }
?>