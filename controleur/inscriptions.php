<?php

require_once '../modele/modele.php';
require_once '../helpers/session_helper.php';

class inscriptions {

    private $inscriptionModel;

    public function __construct(){
        $this->inscriptionModel = new inscription;
    }

    public function register(){
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'nom' => trim($_POST['nom']),
            'prenom' => trim($_POST['prenom']),
            'email' => trim($_POST['email']),
            'age' => trim($_POST['age']),
            'mdp' => trim($_POST['mdp']),
            'mdpRepeat' => trim($_POST['mdpRepeat'])
        ];

        if(empty($data['nom']) || empty($data['prenom']) || empty($data['email']) ||
        empty($data['age']) || empty($data['mdp']) || empty($data['mdpRepeat'])){
            flash("register", "Remplisser tout les champs");
            redirect("../index.php?page=3");
        }

        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            flash("register", "email Invalide");
            redirect("../index.php?page=3");
        }

        if(strlen($data['mdp']) <3){
            flash("register", "Le mot de passe n'est pas valide");
            redirect("../index.php?page=3");
        } else if ($data['mdp'] !== $data['mdpRepeat']){
            flash("register", "Le mot de passe ne correspond pas");
            redirect("../index.php?page=3");
        }

        if($this->inscriptionModel->findUserByEmail($data['email'])){
            flash("register", "Cette email est déja pris");
            redirect("../index.php?page=3");
        }

        $data['mdp'] = password_hash($data['mdp'], PASSWORD_DEFAULT);

        if($this->inscriptionModel->register($data)){
            redirect("../index.php?page=13");
        }else{
            die("Erreur 404");
        }
    }

    public function login(){

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
        $data=[
            'email' => trim($_POST['email']),
            'mdp' => trim($_POST['mdp'])
        ];
    
        if(empty($data['email']) || empty($data['mdp'])){
            flash("login", "Remplisser tout les champs");
            header("location: ../index.php?page=3");
            exit();
        }
    
        if($this->inscriptionModel->findUserByEmail($data['email'], $data['email'])){
    
            $loggedInUser = $this->inscriptionModel->login($data['email'], $data['mdp']);
            if($loggedInUser){
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Mot de pass incorrect");
                redirect("../index.php?page=4");
            }
    
        }else{
            flash("login", "Pas d'email trouver");
            redirect("../index.php?page=4");
        }
    }

    public function createUserSession($user){
        $_SESSION['id_user'] = $user->id_user;
        $_SESSION['nom'] = $user->nom;
        $_SESSION['prenom'] = $user->prenom;
        $_SESSION['email'] = $user->email;
        $_SESSION['age'] = $user->age;
        redirect("../index.php");
    }

    public function logout(){
        unset($_SESSION['id_user']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['email']);
        unset($_SESSION['age']);
        session_destroy();
        redirect("../index.php");
    }
}

$init = new inscriptions;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
        redirect("../index.php");
    }
}else{
    switch($_GET['q']){
        case 'logout':
            $init->logout();
            break;
        default;
        redirect("../index.php");
    }
}


?>