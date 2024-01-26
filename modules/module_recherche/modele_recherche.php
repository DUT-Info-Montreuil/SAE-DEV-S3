<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "Connexion.php";
class modele_recherche extends Connexion{

    public function rechercheLesJoueurs($searchTerm) {
        $req = Connexion::$bdd->prepare("
            SELECT Joueurs.idJoueur, Joueurs.Pseudo FROM Joueurs WHERE Joueurs.Pseudo LIKE :searchTerm
        ");
        $req->execute(['searchTerm' => "%$searchTerm%"]);
        $retour = $req->fetchAll(PDO::FETCH_ASSOC);
    
        return $retour;
    }    
}
?>