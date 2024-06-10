<?php

require_once("controleur/controleur.php"); 
	$unControleur = new Controleur ();
?>

<?php if(!isset($_SESSION['id_user'])) :?>

<br><br><br>

<center>
<h1>Vous devez être connecter pour pouvoir acceder a ce service</h1>

<br><br>

<a href="index.php?page=4">Connectez-vous içi</a>
</center>

<br><br><br>

<?php else: ?>

<?php
    $lEnfant = null; //classe a modifier
    if (isset($_GET['action']) && isset($_GET['id_enfant']))
    {
        $action = $_GET['action'];
        $idclasse = $_GET['id_enfant'];

        switch($action)
        {
            case "sup" : $unControleur->deleteEnfant($id_enfant); 
            break;
           
            case "edit" :$lEnfant=$unControleur->selectWhereEnfant ($id_enfant); 
            //var_dump ($laClasse); 
            break;
        }
    }
    require_once ("vue/vue_insert_portfamille.php");
    
    if (isset($_POST['Valider']))
    {
        $unControleur->insertEnfant ($_POST);
    }
    if (isset($_POST['Modifier']))
    {
        $unControleur->updateEnfant ($_POST);
        header("location: index.php?page=7");
    }

?>

<?php endif; ?>

