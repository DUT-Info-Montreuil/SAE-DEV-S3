<?php

class VueEntite extends VueGenerique
{

    public function __construct()
    {
        parent::__construct();
    }

    public function liste($tab_defence, $tab_ennemi)
    {
?>
        <h1>Defences</h1>
        <ul><?php
            foreach ($tab_defence as $defence) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <a href="index.php?module=entite&action=detailsEnnemi&id=<?= $defence["idDefence"]?>">
                            <img src="img/ennemi_difficile_32x32.png" alt="Entitée 3" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $defence["nom"] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>

                <li><a href="index.php?module=ennemi&action=details&id=<?= $defence["idDefence"] ?>"><?= $defence["nom"] ?></a></li><?php
                                                                                                                    }
                                                                                                                        ?>
        </ul>
        <h1>Ennemis</h1>

        <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card mb-4 shadow-sm">
                            <a href="#">
                            <img src="img/ennemi_difficile_32x32.png" alt="Entitée 3" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">entitée 3</h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    
        <ul><?php
            foreach ($tab_ennemi as $ennemi) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <a href="index.php?module=entite&action=detailsEnnemi&id=<?= $ennemi["idEnnemi"]?>">
                            <img src="img/ennemi_difficile_32x32.png" alt="Entitée 3" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?= $ennemi["nom"] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>

                <li><a href="index.php?module=ennemi&action=details&id=<?= $ennemi["idEnnemi"] ?>"><?= $ennemi["nom"] ?></a></li><?php
                                                                                                                    }
                                                                                                                        ?>
        </ul>
    <?php
    }

    public function details($donnees)
    {
    ?>
        <h1><?= $donnees["nom"] ?></h1>
        <!--Ajouter ici l'affichage de l'année, du pays etc-->
        <?= $donnees["description"] ?>
<?php
    }
}
