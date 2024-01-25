<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "vue_generique.php";
class VueEnnemi extends vue_generique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detailsEnnemi($donnees, $graphData)
    {
        ?>
        <div class="row">
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
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Statistique</th>
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
                                    <th scope="row">Type de deplacement</th>
                                    <td>
                                        <?= $donnees["deplacement"] ?>
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
