<?php
session_start();
$_SESSION["role"] = [
    "admin" => false,
    "joueur" => false,
    "visiteur" => true
];


define('APPLICATION_STARTED', true);

if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}

require_once "Connexion.php";
require_once "vue_generique.php";
require_once "module_generique.php";
require_once "composant_generique.php";
require_once "vue_composant_generique.php";
require_once "site.php";

Connexion::initConnexion();

require_once "Composants/menu/composant_menu.php";
require_once "Composants/footer/composant_footer.php";

$site = new Site();

$site->exec_module();

$menu = new ComposantMenu();

$footer = new ComposantFooter();


$module_html = $site->get_module()->get_affichage();

include_once "template.php";
