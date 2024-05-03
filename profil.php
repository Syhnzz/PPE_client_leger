<?php
include("common/header.php");
include("common/menu.php");
?>

<br><br><br>

<div class="container">
    <div class="main">
        <div class="row">
            <div class="col-md-4 mt-1">
                <div class="card text-center sidebar">
                    <div class="card-body">
                        <img src="images/avatar.png" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h3> <?php echo explode(" ", $_SESSION['prenom'])[0]; ?> 
                            <?php echo explode(" ", $_SESSION['nom'])[0]; ?> </h3>
                            <a href="index.php">Accueil</a>
                            <a href="contact.php">Contact</a>
                            <a href="./controleur/inscriptions.php?q=logout">Se Deconnecter</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-1">
                <div class="card mb-3 content">
                    <h1 class="m-3 pt-3">Informations Generales</h1>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Votre Nom</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?php echo explode(" ", $_SESSION['prenom'])[0]; ?> 
                            <?php echo explode(" ", $_SESSION['nom'])[0]; ?> 
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Email</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?php echo explode(" ", $_SESSION['email'])[0]; ?>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Age</h5>
                            </div>
                            <div class="col-md-9 text-secondary">
                            <?php echo explode(" ", $_SESSION['age'])[0]; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once("common/footer.html")
?>