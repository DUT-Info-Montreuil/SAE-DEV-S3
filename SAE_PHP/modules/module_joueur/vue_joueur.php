<?php 

require_once "vue_generique.php";

if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once"vue_generique.php";

class vue_joueur extends vue_generique {
    public function __construct () {
		parent::__construct();
	}

    public function affiche($fiche_joueur, $prog_quetes, $amis_joueur, $pseudo){
        $experience = isset($fiche_joueur["experience"]) ? $fiche_joueur["experience"] : "N/A";
        $scoreTotal = isset($fiche_joueur["ScoreTotal"]) ? $fiche_joueur["ScoreTotal"] : "N/A";
        $nbPartiesJouees = isset($fiche_joueur["NbPartiesJouées"]) ? $fiche_joueur["NbPartiesJouées"] : "N/A";
        $nbPartiesGagnees = isset($fiche_joueur["NbPartieGagnée"]) ? $fiche_joueur["NbPartieGagnée"]: "N/A";
        $MoyenneNbVague = isset($fiche_joueur["MoyenneNbVague"]) ? $fiche_joueur["MoyenneNbVague"]: "N/A";
        $MapLaPlusUtilisée = isset($fiche_joueur["MapLaPlusUtilisee"]) ? $fiche_joueur["MapLaPlusUtilisee"] : "N/A";
        $prog_quete1 = isset($fiche_joueur["progression"]);
        ?>
        <main class="container mt-5">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="pseudo">
                    <h2><?php echo is_array($pseudo) ? implode(', ', $pseudo) : htmlspecialchars($pseudo); ?></h2>
                    </div>
                </div>
                
                <?php
                foreach ($prog_quetes as $quete){
                    ?>
                    <div class="col-md-2">
                        <div class="quest">
                            <h4><?php echo $quete["nom"]?></h4>
                                <div class="progress-container">
                                <div class="progress-circle" id="progress-circle-1">
                                <span class="progress-text"><?php echo $quete["progression"]?></span>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                    }
                ?>
            </div>
    
            <div class="row mb-4">
                <div class="col-md-6 nav-stats">
                    <h2>Les statistiques</h2>
                    <div class="tab-content" id="myTabContent">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Stat</th>
                                    <th scope="col">Valeur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Niveau</td>
                                    <td><?php echo $experience ?></td>
                                </tr>
                                <tr>
                                    <td>ScoreTotal</td>
                                    <td><?php echo $scoreTotal ?></td>
                                </tr>
                                <tr>
                                    <td>Nombre de partie Jouée</td>
                                    <td><?php echo $nbPartiesJouees ?></td>
                                </tr>
                                <tr>
                                    <td>Nombre de partie gagnée</td>
                                    <td><?php echo $nbPartiesGagnees ?></td>
                                </tr>
                                <tr>
                                    <td>Moyenne du nombre de vagues passées</td>
                                    <td><?php echo $MoyenneNbVague ?></td>
                                </tr>
                                <tr>
                                    <td>Map la plus utilisée</td>
                                    <td><?php echo $MapLaPlusUtilisée ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <div class="col-md-6 friends-list">
                    <h2>Liste d'amis</h2>
                    <ul class="list-group">
                    <?php
                        foreach ($amis_joueur as $ami){
                            ?>
                            <li class="list-group-item"><a href="Index.php?module=joueur&id=<?php echo $ami["idJoueur"]; ?>"><?php echo $ami["Pseudo"]; ?></a></li>
                            <?php
                        }
                    
                    ?>
                    </ul>
                </div>
            </div>
    
        </main>
        <?php
    }

    public function amis(){
    ?>
    <form action="Index.php?module=joueur&action=amis&id=<?= $_GET["id"] ?>" method="POST">
        <button type="submit" class="btn btn-primary">Ajouter en amis</button>
    </form>
    <?php
    }

    public function plusamis(){
        ?>
        <form action="Index.php?module=joueur&action=retirer&id=<?= $_GET["id"] ?>" method="POST">
            <button type="submit" class="btn btn-primary">Supprimer des amis</button>
        </form>
        <?php
    }

    public function bloquer(){
        ?>
        <form action="Index.php?module=joueur&action=bloquer&id=<?= $_GET["id"] ?>" method="POST">
            <button type="submit" class="btn btn-primary">Bloquer cet individu</button>
        </form>
        <?php
    }

    public function plusbloquer(){
        ?>
        <form action="Index.php?module=joueur&action=retirer&id=<?= $_GET["id"] ?>" method="POST">
            <button type="submit" class="btn btn-primary">Debloquer cet individu</button>
        </form>
        <?php
    }

    	
	public function affiche_confirmation(){
        ?>
            <div class="row justify-content-center">
                <div class="col-md-10 mb-4">
                    <div class="card text-center p-3 mb-3">
                            <h2>L'operation a bien étée effectuée</h2>
                    </div>
                </div>
            </div>
        </main>
        <?php	
        }


    
}

?>