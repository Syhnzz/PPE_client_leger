<br><br><br>

<?php

require_once("controleur/controleur.php"); 
	$unControleur = new Controleur ();
?>

<h2> Les Activites Culturels </h2>
<?php
		$lActivite = null; 

	if (isset($_GET['action'])  && isset($_GET['id_act']))
	{
		$action= $_GET['action'];
		$id_act = $_GET['id_act'];

		switch($action)
		{
			case "sup" : $unControleur->deleteActivite($id_act) ; break;
			case "edit" : 
			$lActivite= $unControleur->selectWhereActivite ($id_act);
			break;
		}
	}
		if (isset ($_POST['Filtrer']))

		{

			$filtre = $_POST['filtre'];
			$lesActivites = $unControleur->searchAllActivites($filtre);
		}else{

				$lesActivites= $unControleur->selectAllActivites ();
			}
		
            require_once ("./vue/vue_select_actCult.php");
	
?>





