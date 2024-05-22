<h3>Ajout d'une Activite</h3>

<form method="POST">
    <table>
        <tr>
            <td>Nom</td>
            <td><input type="text" name="nom" value="<?= ($lActivite!=null)?$lActivite['nom']:'' ?>" class="field"></td>
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" name="date" class="field"></td>
        </tr>
        <tr>
            <td>Statut</td>
            <td><input type="text" name="statut" class="field"></td>
        </tr>
        <tr>
            <td><input type="submit" name="valider" value="valider"></td>
        </tr>
    </table>
</form>