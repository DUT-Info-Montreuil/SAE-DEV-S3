<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_ennemi/modele_ennemi.php";
require_once "modules/module_ennemi/vue_ennemi.php";

class ControleurEnnemi
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleEnnemi();
        $this->vue = new VueEnnemi();
    }

    public function exec()
    {
        $id_ennemi = isset($_GET["id"]) ? $_GET["id"] : die("Paramètre manquant");
        $donnees = $this->modele->get_detailsEnnemi($id_ennemi);
        $graphData = $this->modele->get_graphData($id_ennemi);
        if (!$donnees) {
            die("Erreur dans la récupération de l'ennemi");
        }
        $this->vue->detailsEnnemi($donnees, $graphData);
    }

}
