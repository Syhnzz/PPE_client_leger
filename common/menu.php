<nav>
    <ul>
        <li><a href="index.php?page=1">Accueil</a></li>
        <li class="menu-deroulant">
            <a href="index.php?page=1">Loisirs</a>
            <ul class="sous-menu">
                <li><a href="index.php?page=5">Culture</a></li>
                <li><a href="index.php?page=6">Sport</a></li>
            </ul>
        </li>
        <?php if(!isset($_SESSION['id_user'])) :?>
        <?php else: ?>
        <li class="menu-deroulant">
            <a href="index.php?page=1">Services</a>
            <ul class="sous-menu">
                <li><a href="index.php?page=7">Portail Famille</a></li>
                <li><a href="index.php?page=8">RDV Mairie</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <li><a href="index.php?page=4">Contact</a></li>
        <?php if(!isset($_SESSION['id_user'])) :?>
            <li><a href="index.php?page=3">Connexion</a></li>
            <li><a href="index.php?page=2" class="inscription-menu">/ S'inscrire</a></li>
        <?php else: ?>
            <li class="menu-deroulant">
            <a href="index.php?page=1" class="user"><img src="./images/icone/user.png" alt="" width="30"></a>
            <ul class="sous-menu">
                <li><a href="profil.php" class="utilisateur"><?php echo explode(" ", $_SESSION['nom'])[0]; ?></a></li>
                <li><a href="./controleur/inscriptions.php?q=logout">Se Deconnecter</a></li>
            </ul>
        </li>
        <?php endif; ?>
    </ul>
 
</nav>