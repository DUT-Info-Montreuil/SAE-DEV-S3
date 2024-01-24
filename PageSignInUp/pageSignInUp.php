<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/styleSignInUp.css">
    <title>A propos</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="../index.html">
                        <img src="logo.png" alt="Logo" class="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">                        
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.html">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../PagelisteEntite/listeEntite.html">Entités</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../PageDesMaps/pageDesMaps.html">Map</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Joueurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pageApropos.html">À propos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Signup / Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
               <div class="boxAll">
                <div class="box signin">
                    <h2>Tu as deja un compte ?</h2>
                    <button class="signinBtn">Connexion</button>
                </div>
                <div class="box signup">
                    <h2>Tu n'as pas de compte</h2>
                    <button class="signupBtn">Inscription</button>
                </div>
                <div class="formBx">
                    <div class="form signinform">
                        <form>
                            <h3>Connexion</h3>
                            <input type="text" placeholder="Identifiant">
                            <input type="text" placeholder="Mot de passe">
                            <input type="submit" value="Connexion">
                        </form>
                    </div>
                    <div class="form signupform">
                        <form>
                            <h3>Inscription</h3>
                            <input type="text" placeholder="Identifiant">
                            <input type="text" placeholder="Mot de passe">
                            <input type="text" placeholder="Confirmation">
                            <input type="submit" value="Inscription">
                        </form>
                    </div>
                </div>
                <script>
                    let signinBtn = document.querySelector('.signinBtn');
                    let signupBtn = document.querySelector('.signupBtn');
                    let body = document.querySelector('body');

                    signupBtn.onclick = function(){
                        body.classList.add('slide');
                    }
                    signinBtn.onclick = function(){
                        body.classList.remove('slide');
                    }
                </script>
            </div>
            
        </main>
        <footer>
            <div class="footer py-3 fixed-bottom">
                <p>Footix © 2023</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
