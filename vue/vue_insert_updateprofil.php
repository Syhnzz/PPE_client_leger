

<br><br><br>

<h1>Modification du profil</h1>

<br><br>

    <form method="post">
        <table>
            <tr>
                <td> Nom </td>
                <td> <input type="text" id="nom" name="nom" placeholder="nom" 
                value=<?php echo explode(" ", $_SESSION['nom'])[0] ?> class="form-control my-3 py-2"></td>
            </tr>
            <tr>
                <td> Prenom </td>
                <td> <input type="text" id="prenom" name="prenom" placeholder="prenom" 
                value=<?php echo explode(" ", $_SESSION['prenom'])[0] ?> class="form-control my-3 py-2"></td>
            </tr>
            <tr>
                <td> Email </td>
                <td> <input type="email" id="email" name="email" placeholder="Email" 
                value=<?php echo explode(" ", $_SESSION['email'])[0] ?> class="form-control my-3 py-2"></td>
            </tr>
            <tr>
                <td> Age </td>
                <td> <input type="number" id="age" name="age" placeholder="Age" 
                value=<?php echo explode(" ", $_SESSION['age'])[0] ?> class="form-control my-3 py-2"></td>
            </tr>
            <tr>
            <td> <input type="hidden" name="id_user" value=<?php echo explode(" ", $_SESSION['id_user'])[0] ?> ></td>
            </td>
        </tr>
        </tr>
                <td> <input type="reset" name="Annuler" value="Annuler" class="button"></td> 
                <td> <input type="submit" name="Valider" value="Valider" class="button"></td>
            </tr>
    </table>
    
    </form>
