<?php
include("common/header.php");
include("common/menu.php");
include_once './helpers/session_helper.php';
?>

<h1>Page de connexion</h1>

    <br><br><br>

    <h1>Me connecter</h1>

    <p>L'accès à l'extranet est sécurisé. 
    Veuillez vous connecter pour poursuivre votre navigation. <br> Pour vous connecter
    , vous devez renseigner votre courriel 
    et le mot de passe associé.</p>

    <br>

    <?php flash('login') ?>

    <form method="POST" action="./controleur/inscriptions.php">
        <input type="hidden" name="type" value="login">
        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <button type="submit" name="submit">Se Connecter</button>
    </form>

        <br>

        <br><br>

    <form method="POST" action="./controleur/inscriptions.php">

        <p>Mot de passe oublier : <a href="vue/vue_insert_resetmdp.html">Reinitialiser mot de passe</a></p><br>
        <p>Si vous n'ete pas inscrit, inscrivez vous </p><a href="index.php?page=6">içi</a>
    </form>

<?php
require_once("common/footer.html")
?>