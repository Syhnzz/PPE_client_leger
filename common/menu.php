<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li class="menu-deroulant">
            <a href="index.php?page=1">Loisirs</a>
            <ul class="sous-menu">
                <li><a href="gestion_activitesCults.php">Culture</a></li>
                <li><a href="gestion_activitesSports.php">Sport</a></li>
            </ul>
        </li>
        <?php if(!isset($_SESSION['id_user'])) :?>
        <?php else: ?>
        <li class="menu-deroulant">
            <a href="index.php">Services</a>
            <ul class="sous-menu">
                <li><a href="gestion_portfamille.php">Portail Famille</a></li>
                <li><a href="gestion_rdvMairie.php">RDV Mairie</a></li>
            </ul>
        </li>
        <?php endif; ?>
        <li><a href="contact.php">Contact</a></li>
        <?php if(!isset($_SESSION['id_user'])) :?>
            <li><a href="connect.php">Connexion</a></li>
            <li><a href="gestion_inscription.php" class="inscription-menu">/ S'inscrire</a></li>
        <?php else: ?>
            <li><a href="profil.php" class="utilisateur"> ><?php echo explode(" ", $_SESSION['nom'])[0]; ?>< </a></li>
            <li><a href="./controleur/inscriptions.php?q=logout" class="deconection-menu">Se Deconnecter</a></li>
        <?php endif; ?>
    </ul>
 
</nav>