<?php
require_once "modules/module_signInUp/modele_signInUp.php";
require_once "modules/module_signInUp/vue_signInUp.php";

class cont_signInUp {
    private $modele;
    private $vue;

    private $action;

    public function __construct(){
		$this->modele = new modele_signInUp();
		$this->vue = new vue_signInUp();
    }

    public function exec(){
      $this->action = isset($_GET["action"]) ? $_GET["action"] : "form";
      

      switch ($this->action) {
	      case "form" :
			    $this->form();
			    break;
	    	case "verif_connexion" :
      	  $this->verif_connexion();
		     	break;
		    case "inscription" : 
	  			$this->inscription();
		  		break;
			case "deconnexion" :
			  	$this->deconnexion();
			  	break;
			default : 
				die ("Action inexistante");
		}

    }

    public function form(){
        $this->vue->affichage_SignInUp();
    }

    public function verif_connexion(){

      $login = isset ($_POST['login']) ? $_POST['login'] : die("paramètre manquant");
      $mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die("parametre manquant");
      $util = $this->modele->get_joueur($login);
		if ($util === false) {
			$this->vue->joueur_inconnu($login);
			return;
		}
		if (password_verify($mdp, $util["motdepasse"])) {
			$_SESSION['login'] = $login;
      $_SESSION['id'] = $util['idJoueur'];
      if ($login === 'admin'){
        $_SESSION['role']['admin'] = true;
        $_SESSION['role']['visiteur'] = false;
        $_SESSION['role']['joueur'] = false;
      }
      else{
        $_SESSION['role']['joueur'] = true;
        $_SESSION['role']['visiteur'] = false;
        $_SESSION['role']['admin'] = false;
      }
			$this->vue->confirm_connexion($login);
      $this->vue->redirectionJava();	
    }
		else {
			$this->vue->echec_connexion($login);
		}

    }
    private function inscription () {
      $login = isset ($_POST['login']) ? $_POST['login'] : die("paramètre manquant");
      $mdp = isset ($_POST['mdp']) ? $_POST['mdp'] : die ("paramètre manquant");
      $mdp_hash = password_hash($mdp, PASSWORD_BCRYPT); 
      
      if ($this->modele->ajout_utilisateur($login, $mdp_hash)) {
        $this->vue->confirm_inscription($login);
      }
      else {
        $this->vue->affichage_SignInUp();
        $this->vue->erreur_inscription($login);
      }
      
    }

    public function deconnexion () {
      unset($_SESSION['login']);
      $this->vue->confirm_deconnexion();
      $this->vue->redirectionJava();
    }  
}