<?php 
require_once"vue_generique.php";
class vue_accueil extends vue_generique {
    public function __construct () {
		parent::__construct();

	}

    public function affiche_quetes($quetes){
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Les quêtes</h2>
                </div>
    
                <?php 
                foreach ($quetes as $quete){
                ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?=$quete["idQuete"]?>" alt="Quest" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?=$quete["nom"]?></h5>
                                <p class="card-text"><?=$quete["Objectif"]?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                
            </div>
        </div>
    <?php
    }
    
    public function affiche_meilleuresEntitees($ennemi, $tourelle, $obstacle){
        ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Les meilleures entités</h2>
                </div>
    
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?=$ennemi["image"]?>" alt="ennemi" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?=$ennemi["nom"]?></h5>
                            <p class="card-text"><?=$ennemi["descriptif"]?></p>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?=$tourelle["image"]?>" alt="Tourelle" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?=$tourelle["nom"]?></h5>
                            <p class="card-text"><?=$tourelle["descriptif"]?></p>
                        </div>
                    </div>
                </div>
    
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?=$obstacle["image"]?>" alt="Obstacle" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?=$obstacle["nom"]?></h5>
                            <p class="card-text"><?=$obstacle["descriptif"]?></p>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        <?php
    }    
}

?>