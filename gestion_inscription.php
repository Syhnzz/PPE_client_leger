<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

if (empty($_POST["nom"])){
    die("Votre nom est requis");
}

if (empty($_POST["prenom"])){
    die("Votre prenom est requis");
}

if (empty($_POST["age"])){
    die("Votre age est requis");
} elseif ($_POST["age"] > 150){
    die("Votre age n'est pas valable");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Vous devez donnez un email valide");
}

if (empty($_POST["mdp"])){
    die("Un mot de passe est requis");
}

if ($_POST["mdp"] !== $_POST["mdp_confirmation"]){
    die("Le mot de passe doit être le même");
}

$password_hash = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO utilisateur (nom, prenom, age, email, password_hash)
                                VALUES(?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssiss", $_POST["nom"], $_POST["prenom"], $_POST["age"],
                  $_POST["email"],$password_hash);

if ($stmt->execute()){
    header("Location: index.php?page=7");
} else {
    if ($myqli->errno === 1062){
        die("Email déja pris");
    }
    die($mysqli->error . " " . $mysqli->errno);
}



?>