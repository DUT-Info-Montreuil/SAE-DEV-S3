<?php 
require_once "Connexion.php";
class modele_signInUp extends Connexion{

    public function get_joueur($login) {
		$req = Connexion::$bdd->prepare("SELECT * FROM Joueurs WHERE Joueurs.pseudo LIKE :pseudo");
		echo"hvbcda";
		$req->bindParam("pseudo", $login, PDO::PARAM_STR);	
		$req->execute();
		$rep = $req->fetch(PDO::FETCH_ASSOC);
		return $rep;
	}    
    
    public function ajout_utilisateur ($login, $mdp_hash) {

		if (!$this->get_joueur($login)){
			$req = self::$bdd->prepare("INSERT INTO Joueurs (pseudo, motdepasse) VALUES(:login, :mdp)");
			return $req->execute(["login"=>$login, "mdp"=>$mdp_hash]);
		}
		else{
			return false;
		}
	}
}