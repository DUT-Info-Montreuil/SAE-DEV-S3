<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
require_once"vue_generique.php";
class vue_rapportbug extends vue_generique {
    public function __construct () {
		parent::__construct();

	}

	public function affiche_ajoutRapport() {
		$token = bin2hex(random_bytes(32));
		$_SESSION['csrf_token'] = $token;
		var_dump($_SESSION['csrf_token']);
		echo'affiche';
		var_dump($token);
		?>
		<div class="row justify-content-center">
			<div class="col-md-10 mb-4">
				<div class="card text-center p-3 mb-3">
					<div class="container mt-5">
		
					<h2>Ajouter un rapport de bug</h2>

					<form action="Index.php?module=rapportbug&action=envoie" method="POST">
						<div class="mb-3">
							<label for="titre" class="form-label">Titre du rapport :</label>
								<input type="text" class="form-control" id="titre" name="titre" required>
							</div>
							<div class="mb-3">
								<label for="contenu" class="form-label">Contenu du rapport :</label>
									<textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
							</div>
							<input type="hidden" name="csrf_token" value="<?=$token?>">
							<button type="submit" class="btn btn-primary">Soumettre</button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}

	public function vue_reponse($bool){
		if($bool == TRUE){
			echo 'Le rapport de bug a bien été envoyé';
		} else {
			echo 'Le rapport n`a pas pu être envoyé';
		}
	}
	
	
}

?>