<?php
require_once "modules/module_accueil/modele_accueil.php";
require_once "modules/module_accueil/vue_accueil.php";

class cont_accueil {
    private $modele;
    private $vue;

    public function __construct(){
		$this->modele = new modele_accueil();
		$this->vue = new vue_accueil();
    }

    public function exec() {

        $quetestest = array(
          array(
              'titre' => 'Quête 1',
              'image' => 'chemin/vers/image1.jpg',
              'descriptif' => 'Description de la quête 1.'
          ),
          array(
              'titre' => 'Quête 2',
              'image' => 'chemin/vers/image2.jpg',
              'descriptif' => 'Description de la quête 2.'
          ),
        );

      $tourelle = array(
          'titre' => 'Tourelle de défense',
          'image' => 'chemin/vers/image_tourelle.jpg',
          'descriptif' => ' tourelle pour défendre votre base.'
      );
      
      $ennemi = array(
          'titre' => 'Ennemi redoutable',
          'image' => 'chemin/vers/image_ennemi.jpg',
          'descriptif' => 'Un ennemi redoutable à affronter.'
      );
      
      $obstacle = array(
          'titre' => 'Obstacle infranchissable',
          'image' => 'chemin/vers/image_obstacle.jpg',
          'descriptif' => 'Un obstacle difficile à surmonter.'
      );
        
      
      $this->vue->affiche_quetes($quetestest);

      $this->vue->affiche_meilleuresEntitees($ennemi, $tourelle, $obstacle);
    }
}