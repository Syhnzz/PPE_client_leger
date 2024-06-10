<?php
include("common/header.php");
include("common/menu.php");
?>

<?php
	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1 ; 
	} 
	switch ($page){
		case 1 : require_once ("home.php"); break; 
		case 2 : require_once ("ville.php"); break; 
		case 3 : require_once ("gestion_inscription.php"); break; 
		case 4 : require_once ("connect.php"); break; 
		case 5 : require_once ("contact.php"); break; 
		case 6 : require_once ("gestion_activitesCults.php"); break; 
        case 7 : require_once ("gestion_activitesSports.php"); break; 
        case 8 : require_once ("gestion_portfamille.php"); break; 
        case 9 : require_once ("gestion_rdvMairie.php"); break; 
		case 10 : require_once ("profil.php"); break; 
		case 11 : require_once ("gestion_profil.php"); break; 
		case 12 : require_once ("reset_mdp.php"); break; 
		default : require_once ("erreur.php"); break; 
	}
	?>

<?php
require_once("common/footer.html")
?>