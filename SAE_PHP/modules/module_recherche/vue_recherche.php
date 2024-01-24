<?php 
require_once"vue_generique.php";
class vue_recherche extends vue_generique {
    public function __construct () {
		parent::__construct();

	}
	
	public function affiche_null(){
		echo "Aucun résultat correspondant à la recherche !!";
	}

	public function affiche_resultat($liste) {
		echo '<div class="row justify-content-center">';
		echo '<div class="col-md-10 mb-4">'; 
		echo '<div class="card text-center p-3 mb-3">';
		echo '<div class="container mt-5">';
		echo '<h2>Résultats de la Recherche</h2>';
		echo '<table class="table">';
		echo '<thead>';
		echo '<tr>';
		echo '<th scope="col">id du Joueur</th>';
		echo '<th scope="col">Joueur</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
	
		foreach ($liste as $element) {
			$id = $element['idJoueur'];
			$nom = $element['Pseudo'];
	
			echo '<tr>';
			echo '<td>' . $id . '</td>';
			echo '<th scope="row">' . "<a href='Index.php?module=joueur&id=$id'>$nom</a>" . '</th>';
			echo '</tr>';
		}
	
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</main>';
	}
	
}

?>