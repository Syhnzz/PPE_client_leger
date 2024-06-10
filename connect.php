<?php
include_once './helpers/session_helper.php';
?>

<center>
<h1>Page de connexion</h1>

    <br>

    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <h1>Me connecter</h1>

                            <p>L'accès à l'extranet est sécurisé. 
                            Veuillez vous connecter pour poursuivre votre navigation. 
                            <br> Pour vous connecter
                            , vous devez renseigner votre courriel 
                            et le mot de passe associé.</p>
                            <br>

                            <?php flash('login') ?>

                            <form method="POST" action="./controleur/inscriptions.php">
                                <input type="hidden" name="type" value="login">
                                <label for="email">Email</label> <br>
                                <input type="email" name="email" id="email" class="form-control my-3 py-2">

                                <label for="mdp">Mot de passe</label> <br>
                                <input type="password" name="mdp" id="mdp" class="form-control my-3 py-2">
                                <div class="text-center mt-3">
                                <button type="submit" name="submit">Se Connecter</button>
                                </div>
                            </form>

                            <br>

                            <br><br>

                            <center>

                            <form method="POST" action="./controleur/inscriptions.php">

                                <p>Vous avez oublier votre mot de passe ?</p>

                                <p>Mot de passe oublier : <div class="form-sub-msg"><a href="index.php?page=12">Reinitialiser mot de passe</a></p></div>
                                <br>
                                <p>Si vous n'ete pas inscrit, inscrivez vous </p><a href="index.php?page=3">içi</a>
                            </form>

                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </center>

