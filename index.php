
<?php
include("common/header.html");
include("common/menu.html")
?>

<?php
session_start();

if(isset($_SESSION["id_user"])){

	$mysqli = require __DIR__ . "/database.php";

	$sql = "SELECT * FROM utilisateur WHERE 
			id = {$_SESSION["id_user"]}";

	$result = $mysqli ->query($sql);

	$utilisateur = $result->fetch_assoc();
}

?>

	<center>
	
	<?php if (isset($utilisateur)): ?>
		<h1>Bonjour <?= htmlspecialchars($utilisateur["prenom"]) ?></h1>
	<?php endif; ?>

	<?php

	if (isset($_GET['page'])){
		$page = $_GET['page'];
	}else {
		$page = 1 ; 
	}

	
	//$page = (isset($_GET['page'])) ? $_GET['page'] : 1 ; 
	switch ($page){
		case 1 : require("page/home.html"); break; 
		case 2 : require_once ("vue/vue_insert_actCult.html"); break; 
		case 3 : require_once ("vue/vue_insert_actSport.html"); break;
		case 4 : require_once("vue/vue_insert_contact.html");break;
		case 5 : require_once("connect.php");break;
		case 6 : require_once("vue/vue_insert_inscription.html");break;
		case 7 : require_once("inscription_reussi.html");break;
		case 8 : require_once("vue/vue_insert_portfamille.html");break;
		case 9 : require_once("vue/vue_insert_rdvMairie.html");break;
		case 10 : session_destroy();
				unset($_SESSION['email']);
				header("Location:index.php");
				break;

		default : require_once ("erreur.php"); break;

	}
	?>
	</center>

<?php
require_once("common/footer.html")
?>