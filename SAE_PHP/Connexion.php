<?php 
class Connexion {
	protected static $bdd;
	
	public static function initConnexion() {
		$dsn = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201633";
		$user = "dutinfopw201633";
		$password = "mejetuju";
		self::$bdd = new PDO ($dsn, $user, $password);
	}



}
