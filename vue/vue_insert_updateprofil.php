<br><br><br>

<h1>Modification du profil</h1>

<br><br>

<form action="" method="POST">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" placeholder="nom" value=<?php echo explode(" ", $_SESSION['nom'])[0] ?>>
    <br>
    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom" placeholder="prenom" value=<?php echo explode(" ", $_SESSION['prenom'])[0] ?>>
    <br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email" value=<?php echo explode(" ", $_SESSION['email'])[0] ?>>
    <br>
    <label for="age">Age</label>
    <input type="number" id="age" name="age" placeholder="Age" value=<?php echo explode(" ", $_SESSION['age'])[0] ?>>
    <br>
    <input type="submit" name="update" value="Mettre a jour" class="button">
</form>