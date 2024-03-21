<h3> Liste des activités culturelles </h3>
<form method="post">
	Filtrer par : <input type="text" name="filtre"> 
	<input type="submit" name="Filtrer" value="Filtrer">
</form>
<br>
<table border="1"> 
	<tr>
		<td> Id activitesCult</td>
		<td> Date </td>
		<td> Ville </td>
		
		<?php
			if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
				echo "<td><td> Opérations </td>";
			}
		?>
	</tr>
	<?php
	if (isset($lesActivitesCults)){
		foreach ($lesActivitesCults as $uneActiviteCult){
			echo "<tr>";
			echo "<td>".$uneActiviteCult['id_actCult']."</td>";
			echo "<td>".$uneActiviteCult['nom_actCult']."</td>";
			echo "<td>".$uneActiviteCult['date_actCult']."</td>";
			echo "<td>".$uneActiviteCult['ville']."</td>";

	if (isset($_SESSION['role']) && $_SESSION['role']=="admin"){
		
	}
			
		}
	}
	?>
</table>