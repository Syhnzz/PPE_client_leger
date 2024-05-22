<?php

require_once("controleur/controleur.php"); 
	$unControleur = new Controleur ();
?>

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
    }

?>

<?php
require_once("common/footer.html")
?>