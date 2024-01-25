<?php
class VueCompMenu extends VueCompGenerique {

	public function __construct(){
		$this->affichage .= '            
		<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="Index.php?module=accueil">
				<img src="logo.png" alt="Logo" class="logo">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">                        
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="Index.php?module=accueil">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="PagelisteEntite/listeEntite.html">Entités</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Index.php?module=maps">Map</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Index.php?module=leaderboard">Joueurs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Index.php?module=rapportbug">Bugs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Index.php?module=apropos">À propos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Signup / login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>';

	}	


}
