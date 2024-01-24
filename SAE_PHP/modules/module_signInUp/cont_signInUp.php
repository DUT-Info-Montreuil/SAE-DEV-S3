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
        case "verif_inscription" :
          $this->verif_inscription();
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

    }

    public function verif_inscription(){

    }

    public function inscription(){

    }

    public function deconnexion(){
        
    }

}