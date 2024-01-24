<?php
    class vue_generique {
        public function __construct (){
            ob_start();
        }

        public function getAffichage(){
           return ob_get_clean();
        }

        public function affiche_recherche(){
            ?>
            <form action="Index.php?module=recherche" method="POST">
                <div class="search">
                    <input type="text" name="query" placeholder="Barre de recherche de joueur">
                    <button type="submit">Rechercher</button>
                </div>
            </form> 
            <?php
        }
    }
?>