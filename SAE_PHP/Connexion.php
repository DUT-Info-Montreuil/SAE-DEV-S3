<?php
    class Connexion {
        protected static $bdd;
        public function __construct(){
        }

        public static function initConnexion(){
            $serveur = 'localhost';
            $baseDeDonnees = 'BDDTest';
            $utilisateur = 'thomas'; 
            $motDePasse = '1234';
            self::$bdd = new PDO("mysql:host=$serveur;dbname=$baseDeDonnees;charset=utf8", $utilisateur, $motDePasse);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }
?>
