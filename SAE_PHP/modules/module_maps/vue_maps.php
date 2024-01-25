<?php 
require_once"vue_generique.php";
class vue_maps extends vue_generique {
    public function __construct () {
		parent::__construct();

	}

	public function affiche_maps($lesmaps){
		?>
		<div class="text-center ">
                <h1>Les Maps</h1>
            </div>
            <div class="container">
                <div class="row">
					<?php
                	foreach ($lesmaps as $map){
						?>
                    	<div class="col-lg-6 col-md-6 col-sm-12">
                        	<div class="card mb-4 shadow-sm">
                            	<img src="<?=$map["image"]?>" alt="map 1" class="card-img-top" style="object-fit: cover; width: 100%; height: 100%;">
                            	<div class="card-body">
                                	<h5 class="card-title"><?=$map["nom"]?></h5>
                                	<p class="card-text"><?=$map["descriptif"]?></p>
                            	</div>
                        	</div>
                    	</div>
					<?php
					}
					?>
            </div>
		<?php
	}
}

?>