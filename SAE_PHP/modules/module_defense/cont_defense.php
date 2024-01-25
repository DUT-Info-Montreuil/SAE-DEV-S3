<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "modules/module_defense/modele_defense.php";
require_once "modules/module_defense/vue_defense.php";

class ControleurDefense
{
    private $modele;
    private $vue;
    private $action;

    public function __construct()
    {
        $this->modele = new ModeleDefense();
        $this->vue = new VueDefense();
    }

    public function exec()
    {
        $id_defence = isset($_GET["id"]) ? $_GET["id"] : die("Paramètre manquant");
        $donnees = $this->modele->get_detailsDefence($id_defence);
        $graphData = $this->modele->get_graphData($id_defence);
        if (!$donnees) {
            die("Erreur dans la récupération de la defence");
        }
        $this->vue->detailsDefence($donnees, $graphData);
    }


}
