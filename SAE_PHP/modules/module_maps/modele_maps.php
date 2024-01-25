<?php 
require_once "Connexion.php";
class modele_maps extends Connexion{

    public function get_maps() {
        $req = Connexion::$bdd->prepare("SELECT * FROM Map");
        $req->execute();
        $retour = $req->fetchAll(PDO::FETCH_ASSOC);
    
    return $retour;
    }
    }

?>