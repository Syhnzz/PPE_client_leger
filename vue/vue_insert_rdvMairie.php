<br><br><br>

<h1>Demarche administrative</h1>

<br><br>

<p>Vous souhaitez prendre rendez-vous pour faire une demande de carte d’identité 
    ou de passeport c'est ici</p>

<center>

    <form method="post">
        <table>
            <tr>
                <td> Date rendez vous</td>
                <td> <input type="date" name="date" class="form-control my-3 py-2"></td>
            </tr>
            <tr>
                <td> Heure Rendez vous </td>
                <td> <input type="time" name="heure" class="form-control my-3 py-2"></td>
            </tr>
            <tr>
                <td> Service </td>
                <td> <select name="service" class="form-control my-3 py-2">
                        <option value="affaire oublié">affaire oublié</option>
                        <option value="etat civil">Etat Civil</option>
                        <option value="habitation">Habitation</option>
                    </select>
                </td>
            <tr>
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

</center>