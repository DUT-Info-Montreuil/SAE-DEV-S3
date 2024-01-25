<?php 
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once"vue_generique.php";
class vue_leaderboard extends vue_generique {
    public function __construct () {
		parent::__construct();

	} 

    public function afficheLeaderboard($liste) {
        ?>
            <div class="row justify-content-center">
                <div class="col-md-10 mb-4">
                    <div class="card text-center p-3 mb-3">
                        <div class="container mt-5">
                            <h2>Classement général</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N° Classement</th>
                                        <th scope="col">Joueur</th>
                                        <th scope="col">Score</th>
                                        <th scope="col">Moyenne des vagues atteinte</th>
                                        <th scope="col">Map la plus utilisée</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; foreach ($liste as $element): ?>
                                        <?php
                                        $i++;
                                        $id = $element['idJoueur'];
                                        $nom = $element['Pseudo'];
                                        $score = $element['ScoreTotal'];
                                        $vague = $element['MoyenneNbVague'];
                                        $map = $element['MapLaPlusUtilisee'];
                                        $classement = $i;
                                        ?>
                                        <tr>
                                            <td><?= $classement ?></td>
                                            <th scope="row"><a href='Index.php?module=joueur&id=<?= $id ?>'><?= $nom ?></a></th>
                                            <td><?= $score ?></td>
                                            <td><?= $vague ?></td>
                                            <td><?= $map ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
    }        
    
    
}

?>