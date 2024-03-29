<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_entite/modele_entite.php";
require_once "modules/module_entite/vue_entite.php";

class ControleurEntite
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleEntite();
        $this->vue = new VueEntite();
    }

    public function exec()
    {
        $this->action = isset($_GET["action"]) ? $_GET["action"] : "liste";

        switch ($this->action) {
            case "liste":
                $this->liste();
                break;
            case "detailsDefence":
                $this->detailsDefence();
                break;
            case "detailsEnnemi":
                $this->detailsEnnemi();
                break;
            default:
                die("Action inexistante");
        }
    }

    private function liste()
    {
        $listeDefence = $this->modele->get_listeDefence();
        $listeEnnemi = $this->modele->get_listeEnnemi();
        $this->vue->liste($listeDefence, $listeEnnemi);
    }

    private function detailsDefence()
    {
        $id_defence = isset($_GET["id"]) ? $_GET["id"] : die("Paramètre manquant");
        $donnees = $this->modele->get_detailsDefence($id_defence);
        $graphDataDef=$this->modele->get_graphDataDefense($id_defence);
        if (!$donnees) {
            die("Erreur dans la récupération de la defence");
        }
        $this->vue->retour();
        $this->vue->detailsDefence($donnees, $graphDataDef);
    }

    private function detailsEnnemi()
    {
        $id_ennemi = isset($_GET["id"]) ? $_GET["id"] : die("Paramètre manquant");
        $donnees = $this->modele->get_detailsEnnemi($id_ennemi);
        $graphDataEnn=$this->modele->get_graphDataEnnemi($id_ennemi);
        if (!$donnees) {
            die("Erreur dans la récupération de l'ennemi");
        }
        $this->vue->retour();
        $this->vue->detailsEnnemi($donnees,$graphDataEnn);
    }
}
