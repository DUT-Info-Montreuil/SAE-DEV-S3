<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "vue_generique.php";
class VueEntite extends vue_generique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function liste($tab_defence, $tab_ennemi)
    {
?>
        <div class="container">
            <h1>Defenses</h1>
            <div class="row">
                
                <?php
                    foreach ($tab_defence as $defence) {
                    ?>
                        <div class="col-lg-3 col-md-4 col-sm-12">
                            <div class="card mb-4 shadow-sm">
                                <a href="index.php?module=defense&id=<?= $defence["idObjet"] ?>">
                                    <img src="<?= $defence["image"] ?>" alt="Entitée 3" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $defence["nom"] ?></h5>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <?php
                                                                                                                                                }
                                                                                                                                                    ?>
                
            </div>
            <h1>Ennemis</h1>
            <div class="row">
            


            <?php
                foreach ($tab_ennemi as $ennemi) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card mb-4 shadow-sm">
                            <a href="index.php?module=ennemi&id=<?= $ennemi["idEnnemis"] ?>">
                                <img src="<?= $ennemi["image"] ?>" alt="Entitée 3" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $ennemi["nom"] ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php
                                                                                                                                        }
                                                                                                                                            ?>
            
            </div>
        </div>
    <?php
    }

    public function detailsDefence($donnees)
    {
    ?>
        <div class="row">
            <div class="col-md-6 mb-4">
                <!-- Carte Tableau Stats Entite -->
                <div class="card text-center p-3 mb-3">
                    <div class="container mt-5">
                        <h2><?= $donnees["nom"] ?></h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Statistique</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Dégats</th>
                                    <td><?= $donnees["degat"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Type d'effets</th>
                                    <td><?= $donnees["typeDeffet"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Cout</th>
                                    <td><?= $donnees["cout"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Carte GraphesStats.png -->
                <div class="card text-center p-3 mb-3">
                    GraphesStats.png
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <!-- Carte Entite.png avec formulaire-->
                <div class="card p-3 mb-3">
                    <img src="<?= $donnees["image"] ?>" alt="Entite.png">
                    </form>
                </div>
            </div>
        </div>
    <?php
    }


    public function detailsEnnemi($donnees)
    {
    ?>
        <div class="row">
            <div class="col-md-6 mb-4">
                <!-- Carte Tableau Stats Entite -->
                <div class="card text-center p-3 mb-3">
                    <div class="container mt-5">
                        <h2><?= $donnees["nom"] ?></h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Statistique</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Points de vie</th>
                                    <td><?= $donnees["pv"] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Type de deplacement</th>
                                    <td><?= $donnees["deplacement"] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Carte GraphesStats.png -->
                <div class="card text-center p-3 mb-3">
                    GraphesStats.png
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <!-- Carte Entite.png avec formulaire-->
                <div class="card p-3 mb-3">
                    <img src="<?= $donnees["image"] ?>" alt="Entite.png">
                    </form>
                </div>
            </div>
        </div>
<?php
    }
}
