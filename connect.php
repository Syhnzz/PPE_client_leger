<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM utilisateur WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);

    $utilisateur = $result->fetch_assoc();

    if($utilisateur) {

        if (password_verify($_POST["mdp"], $utilisateur["password_hash"])){

            die("Connexion reussi");

            session_start();

            session_regenerate_id();

            $_SESSION["id_user"] = $utilisateur["id"];

            header("Location: index.php");
            exit;
        }
    }
    $is_invalid = true;
}

?>

<h1>Page de connexion</h1>

    <br><br><br>

    <h1>Me connecter</h1>

    <p>L'accès à l'extranet est sécurisé. 
    Veuillez vous connecter pour poursuivre votre navigation. <br> Pour vous connecter
    , vous devez renseigner votre courriel 
    et le mot de passe associé qui vous a été transmis par les services.</p>

    <br>

    <form method="POST">
        <label for="email">email</label>
        <input type="email" name="email" id="email" 
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">

        <button>Se Connecter</button>

        <br>

        <?php if ($is_invalid): ?>
        <em>Votre email ou mot de passe n'est pas valide</em>
    <?php endif; ?>

        <br><br>

        <p>Mot de passe oublier : <a href="vue/vue_insert_resetmdp.html">Reinitialiser mot de passe</a></p><br>
        <p>Si vous n'ete pas inscrit, inscrivez vous </p><a href="index.php?page=6">içi</a>
    </form>