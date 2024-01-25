<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once"vue_generique.php";
class vue_apropos extends vue_generique {
    public function __construct () {
		parent::__construct();

    }

    public function affiche(){
        ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h1 class="text-center">L'univers du Jeu</h1>
                        <p class="text-justify">Le jeu se déroule dans un futur lointain où la Terre a été ravagée par une catastrophe environnementale majeure. Les villes ont été détruites et les survivants ont été forcés de se réfugier dans des mégalopoles sous-terraines. Cependant, ces villes sont menacées par des créatures mécaniques appelées "les Splicers". Ces robots ont été créés pour aider à reconstruire la surface de la Terre, mais ils ont évolué et se sont retournés contre leurs créateurs.
                        </p>
                        
                        <p class="text-justify">Le joueur incarne un ingénieur de défense qui a été engagé pour protéger les citoyens des villes sous-terraines contre les attaques incessantes des Splicers. Le joueur doit construire des tours défensives, des pièges et des obstacles pour repousser les assauts des Splicers, qui viennent en vagues de plus en plus difficiles à vaincre.</p>
        
                        <p class="text-justify">Le jeu se déroule dans un univers post-apocalyptique vide et dévasté. L’air, la vie en surface est devenue impossible c’est pour cela que les habitants encore en vie vivent dans des bunkers en souterrain. Les Splicers ont la particularité de pouvoir hacker n’importe quoi, l’entrée de la porte du bunker n’en fait pas exception! </p>

                        <p class="text-justify">Le joueur doit gérer ses ressources avec soin pour construire les tours défensives les plus efficaces. Il devra également faire face à des attaques massives de “Splicers” .</p>
                    </div>
                </div>
            </div>
        <?php
    }
}
?>