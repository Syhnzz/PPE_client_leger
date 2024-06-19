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

if (isset($_GET['action']) && isset($_GET['id_rdv']))
    {
        $action = $_GET['action'];
        $id_user = $_GET['id_rdv'];

        switch($action)
        {
            case "sup" : $unControleur->deleteRDVMairie($id_rdv); break;
            case "edit" : break;
        }
    }

    $lesRDVMairies = $unControleur->selectAllRDVMairies ();
    require_once ("vue/vue_insert_rdvMairie.php");

    if (isset($_POST['Valider']))
    {
        $unControleur->insertRDVMairie ($_POST);
        redirect("./index.php?page=14");
    }

?>

<?php endif; ?>