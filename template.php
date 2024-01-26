<?php
if (!defined('APPLICATION_STARTED')) {
    die("Accès interdit");
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleSignInUp.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="JavaScript/slideSignInUp.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <title>Accueil</title>
    </head>
    <body>
        <header>
            <?php echo $menu->getAffichage();?>
        </header>
        <main>
        <?=$module_html?>
        </main>
        <footer>
            <?php echo $footer->getAffichage();?>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>