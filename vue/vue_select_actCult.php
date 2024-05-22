<br><br><br>

<h3> Liste des activite culturel </h3>
<form method="POST">
    Filtrer par nom : <input type="text" name="filtre">
	<input type="submit" name="Filtrer" values="Filtrer">
</form>
<br>
<table border="1">
    <tr>
        <td> Nom </td>
        <td> date </td>
        <td> statut</td>
    </tr>
<?php
if (isset($lesActivites)){
    foreach($lesActivites as $uneActivite){
        echo "<tr>";
        echo "<td>".$uneActivite['nom']."</td>";
        echo "<td>".$uneActivite['date_act']."</td>";
        echo "<td>".$uneActivite['statut']."</td>";
    }
}
?>
</table>