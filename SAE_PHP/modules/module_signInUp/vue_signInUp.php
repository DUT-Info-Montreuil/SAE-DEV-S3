<?php

require_once "vue_generique.php";

class vue_signInUp extends vue_generique
{
    public function __construct()
    {
        parent::__construct();

    }

    public function affichage_SignInUp()
    {
        ?>
        <div class="formGeneral">
            <div class="container">
                <div class="row">
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
                            <div class="form signinform ">
                                <form action="Index.php?module=mod_signInUp&action=verif_connexion">
                                    <h3>Connexion</h3>
                                    <input type="text" placeholder="IDENTIFIANT" name="login">
                                    <input type="password" placeholder="MOT DE PASSE" name="mdp">
                                    <input type="submit" value="Connexion">
                                </form>
                            </div>
                            <div class="form signupform">
                                <form action="Index.php?module=mod_signInUp&action=verif_inscription">
                                    <h3>Inscription</h3>
                                    <input type="text" placeholder="IDENTIFIANT" name="login">
                                    <input type="password" placeholder="MOT DE PASSE" name="mdp" id="pass"
                                        class="validate password">
                                    <input type="password" placeholder="CONFIRMATION" name="mdpconf" id="conf"
                                        class="validate passwordConfirm">
                                    <input type="submit" value="Inscription" id="InscriptionBtn">

                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="password_rules">
                        <ul>
                            <li class="password_length">Au moins 8 caractères</li>
                            <li class="password_uppercase">Au moins un lettre en majuscule</li>
                            <li class="password_number">Au moins un chiffre</li>
                            <li class="password_match">Mot de passe et confirmation doivent correspondre</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

            <?php
    }

}
?>