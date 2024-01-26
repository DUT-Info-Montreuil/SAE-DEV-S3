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

    public function retour(){
        ?>
        <div class="p-3">
        <a href="Index.php?module=entite&action=liste"  style="color:lightgray;">< retour à la liste</a>
        </div>
        <?php
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
                                <a href="Index.php?module=entite&action=detailsDefence&id=<?= $defence["idObjet"] ?>">
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
                            <a href="Index.php?module=entite&action=detailsEnnemi&id=<?= $ennemi["idEnnemis"] ?>">
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

    public function detailsDefence($donnees, $graphData)
    {
        
        ?>
        <div class="row">
        <div class="col-md-3 mb-4">
                <!-- Carte Entite.png avec formulaire-->
                <div class="card p-3 mb-3">
                    <img src="<?= $donnees["image"] ?>" alt="Entite.png">
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                
                <!-- Carte Tableau Stats Entite -->
                <div class="card text-center p-3 mb-3">
                    <div class="container mt-5">
                        <h2>
                            <?= $donnees["nom"] ?>
                        </h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Informations</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <th scope="row">Type</th>
                                    <td>
                                        <?= $donnees["TypeObjet"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Type d'effets</th>
                                    <td>
                                        <?= $donnees["typeEffet"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Dégats</th>
                                    <td>
                                        <?= $donnees["degat"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>
                                        <?= $donnees["descriptif"] ?>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Carte GraphesStats.png -->
                <div class="card text-center p-3 mb-3">
                    <script>
                        window.onload = function () {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                exportEnabled: true,
                                theme: "dark1", // "light1", "light2", "dark1", "dark2"
                                title: {
                                    text: "Nombre de placement"
                                },
                                axisY: {
                                    //includeZero: true
                                },
                                data: [{
                                    type: "column", //change type to bar, line, area, pie, etc
                                    //indexLabel: "{y}", //Shows y value on all Data Points
                                    indexLabelFontColor: "#5A5757",
                                    indexLabelPlacement: "outside",
                                    dataPoints: <?php echo json_encode($graphData, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();

                        }
                    </script>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                </div>
            </div>
            
        </div>
        <?php
    }


    public function detailsEnnemi($donnees, $graphData)
    {     
        ?>
        <div class="row">
        <div class="col-md-3 mb-4">
                <!-- Carte Entite.png avec formulaire-->
                <div class="card p-3 mb-3">
                    <img src="<?= $donnees["image"] ?>" alt="Entite.png">
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <!-- Carte Tableau Stats Entite -->
                <div class="card text-center p-3 mb-3">
                    <div class="container mt-5">
                        <h2>
                            <?= $donnees["nom"] ?>
                        </h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Informations</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Points de vie</th>
                                    <td>
                                        <?= $donnees["pv"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Degats</th>
                                    <td>
                                        <?= $donnees["degat"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Type de deplacement</th>
                                    <td>
                                        <?= $donnees["deplacement"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Description</th>
                                    <td>
                                        <?= $donnees["descriptif"] ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Carte GraphesStats.png -->
                <div class="card text-center p-3 mb-3">
                    
                    <script>
                        window.onload = function () {

                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                exportEnabled: true,
                                theme: "dark1", // "light1", "light2", "dark1", "dark2"
                                title: {
                                    text: "Nombre de mort"
                                },
                                axisY: {
                                    //includeZero: true
                                },
                                data: [{
                                    type: "column", //change type to bar, line, area, pie, etc
                                    //indexLabel: "{y}", //Shows y value on all Data Points
                                    indexLabelFontColor: "#5A5757",
                                    indexLabelPlacement: "outside",
                                    dataPoints: <?php echo json_encode($graphData, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();

                        }
                    </script>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                </div>
            </div>
            
        </div>
        <?php
    }
}
