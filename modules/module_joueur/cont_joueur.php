<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_joueur/modele_joueur.php";
require_once "modules/module_joueur/vue_joueur.php";

class cont_joueur {
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new modele_joueur();
        $this->vue = new vue_joueur();
    }

    public function exec() {
        $id_joueur = isset($_GET["id"]) ? $_GET["id"] : die("id du joueur manquant");
        $pseudo = $this->modele->get_pseudo_joueur($id_joueur);
        $fiche_joueur = $this->modele->get_fiche_joueur($id_joueur);
        $prog_quetes = $this->modele->get_progression_quetes($id_joueur);
        $amis_joueur = $this->modele->get_amis($id_joueur);

        if (isset($_SESSION["role"]["joueur"]) && $_SESSION["role"]["joueur"] == true) {
          $idconnect = isset($_SESSION["id"]) ? $_SESSION["id"] : die("id du joueur manquant");
          if ($idconnect != $id_joueur) {
            if (!$this->modele->amis($id_joueur, $idconnect) && !$this->modele->bloque($id_joueur, $idconnect) && !$this->modele->est_bloque($id_joueur, $idconnect)) {
                $this->vue->amis();
                $this->vue->bloquer();
            } elseif ($this->modele->amis($id_joueur, $idconnect)) {
                $this->vue->plusamis();
            } elseif ($this->modele->bloque($id_joueur, $idconnect)) {
                $this->vue->plusbloquer();
            }        
        }

        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'amis':
                    $this->ajouterEnAmis($id_joueur, $idconnect);
                    break;
                case 'bloquer':
                    $this->bloquer($id_joueur, $idconnect);
                    break;
                case 'retirer':
                    $this->retirer($id_joueur, $idconnect);
                    break;
                case 'confirmation':
                    $this->vue->affiche_confirmation();
                    break;
            }
        }

        $this->vue->affiche($fiche_joueur, $prog_quetes, $amis_joueur, $pseudo);

    
    }

    public function ajouterEnAmis($id_joueur, $idconnect){
        $this->modele->ajouterEnAmi($id_joueur, $idconnect);
        header("Location: Index.php?module=joueur&id=" . $id_joueur . "&action=confirmation");
        exit;
    }

    public function bloquer($id_joueur, $idconnect){
        $this->modele->leBloquer($id_joueur, $idconnect);
        header("Location: Index.php?module=joueur&id=" . $id_joueur . "&action=confirmation");
        exit;
    }

    public function retirer($id_joueur, $idconnect){
        $this->modele->retirer($id_joueur, $idconnect);
        header("Location: Index.php?module=joueur&id=" . $id_joueur . "&action=confirmation");
        exit;
    }
}
