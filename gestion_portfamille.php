<?php

require_once("controleur/controleur.php"); 
	$unControleur = new Controleur ();
?>

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

