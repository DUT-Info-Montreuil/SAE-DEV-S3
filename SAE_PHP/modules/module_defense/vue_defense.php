<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once "vue_generique.php";
class VueDefense extends vue_generique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function detailsDefence($donnees, $graphData)
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
                                    <th scope="row">Dégats</th>
                                    <td>
                                        <?= $donnees["degat"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Type d'effets</th>
                                    <td>
                                        <?= $donnees["typeDeffet"] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Cout</th>
                                    <td>
                                        <?= $donnees["cout"] ?>
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
