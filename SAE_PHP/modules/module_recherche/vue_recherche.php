<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once"vue_generique.php";
class vue_recherche extends vue_generique {
    public function __construct () {
		parent::__construct();

	}
	
	public function affiche_null(){
		?>
			<div class="row justify-content-center">
				<h2>Aucun resultat correspondant avec cette recherche !!</h2>
			</div>
		<?php	
		}

	public function affiche_resultat($liste) {
		?>
			<div class="row justify-content-center">
				<div class="col-md-10 mb-4">
					<div class="card text-center p-3 mb-3">
						<div class="container mt-5">
							<h2>Résultats de la Recherche</h2>
							<table class="table">
								<thead>
									<tr>
										<th scope="col">id du Joueur</th>
										<th scope="col">Joueur</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($liste as $element): ?>
										<?php
										$id = $element['idJoueur'];
										$nom = $element['Pseudo'];
										?>
										<tr>
											<td><?= $id ?></td>
											<th scope="row"><a href='Index.php?module=joueur&id=<?= $id ?>'><?= $nom ?></a></th>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php
		}		
}

?>