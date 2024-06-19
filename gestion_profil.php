<?php

require_once("controleur/controleur.php"); 
	$unControleur = new Controleur ();
?>

<center>

<?php

if (isset($_GET['action']) && isset($_GET['id_user']))
    {
        $action = $_GET['action'];
        $id_user = $_GET['id_user'];

        switch($action)
        {
            case "sup" : $unControleur->deleteRDVMairie($id_rdv); break;
            case "edit" : break;
        }
    }
    $lesProfils = $unControleur->selectAllProfils ();
    require_once("vue/vue_insert_updateprofil.php");

    if (isset($_POST['Valider']))
    {
        $unControleur->updateProfil ($_POST);
        echo "</br>" . "Vos modifications ont été enregistrer" . "</br>" . "</br>";
        echo "Vous devez vous reconnecter pour voir les modifications apporter";
    }

?>

</center>