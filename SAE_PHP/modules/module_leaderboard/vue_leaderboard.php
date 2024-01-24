<?php 
require_once "vue_generique.php";
class vue_leaderboard extends vue_generique {
    public function __construct () {
		parent::__construct();

	} 

    public function afficheLeaderboard($liste) {
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-10 mb-4">'; 
        echo '<div class="card text-center p-3 mb-3">';
        echo '<div class="container mt-5">';
        echo '<h2>Classement général</h2>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">N° Classement</th>';
        echo '<th scope="col">Joueur</th>';
        echo '<th scope="col">Score</th>';
        echo '<th scope="col">Moyenne des vagues atteinte</th>';
        echo '<th scope="col">Map la plus utilisée</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $i = 0;
    
        foreach ($liste as $element) {
            $i++;
            $id = $element['idJoueur'];
            $nom = $element['Pseudo'];
            $score = $element['ScoreTotal'];
            $vague = $element['MoyenneNbVague'];
            $map = $element['MapLaPlusUtilisee'];
            $classement = $i;
    
            echo '<tr>';
            echo '<td>' . $classement . '</td>';
            echo '<th scope="row">' . "<a href='Index.php?module=joueur&id=$id'>$nom</a>" . '</th>';
            echo '<td>' . $score . '</td>';
            echo '<td>' . $vague . '</td>';
            echo '<td>' . $map . '</td>';
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