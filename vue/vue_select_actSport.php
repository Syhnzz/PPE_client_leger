<h3> Liste des activités sportives </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td> Id activitesSport</td>
		<td> Date </td>
		<td> Ville </td>
		
		<?php
			if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
				echo "<td><td> Opérations </td>";
			}
		?>
	</tr>
	<?php
	if (isset($lesActivitesSports)){
		foreach ($lesActivitesSports as $uneActiviteSport){
			echo "<tr>";
			echo "<td>".$uneActiviteSport['id_actSport']."</td>";
			echo "<td>".$uneActiviteSport['nom_actSport']."</td>";
			echo "<td>".$uneActiviteSport['date_actSport']."</td>";
			echo "<td>".$uneActiviteSport['ville']."</td>";

	if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		
	}
			
		}
	}
	?>
</table>