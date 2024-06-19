<br><br><br>

<h1>Portail famille</h1>

<br><br>

<p>Ici vous pourrez inscrire votre enfant au centre de loisir</p>
<center>
<form method="POST">
    <table>
        <tr>
            <td> Nom de l'enfant</td>
            <td> <input type="text" name="nom" 
            value="<?= ($lEnfant!=null)?$lEnfant['nom']:''?>" class="form-control my-3 py-2"></td>
        </tr>
        <tr>
            <td> Prenom de L'enfant </td>
            <td> <input type="text" name="prenom"
            value="<?= ($lEnfant!=null)?$lEnfant['prenom']:''?>" class="form-control my-3 py-2"></td>
        </tr>
        <tr>
            <td> Age de L'enfant </td>
            <td> <input type="text" name="age"
            value="<?= ($lEnfant!=null)?$laClasse['age']:''?>" class="form-control my-3 py-2"></td>
        </tr>
        <tr>
            <td> <input type="reset" name="Annuler" value="Annuler" class="button"></td>
            </td>
            <td> <input type="submit"
                <?= ($lEnfant!=null)? ' name="Modifier"
                    value="Modifier" ' : ' name="Valider"
                    value="Valider" ' ?>
            class="button"> </td>
        </tr>
</table>
<?=
($lEnfant!=null)?'<input type="hidden" name="id_enfant" value="'.
    $lEnfant['id_enfant'].'" >' : ''
?>  
</form>

</center>