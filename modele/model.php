<?php

require_once '../modele/database.php';

/* Gestion Inscription */

class inscription {
    private $db;

    public function __construct(){
        $this->db = new database;
    }

    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM utilisateur WHERE email = :email');
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO utilisateur (nom, prenom, email, age, password_hash)
        VALUES (:nom, :prenom, :email, :age, :password_hash)');

        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':age', $data['age']);
        $this->db->bind(':password_hash', $data['mdp']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($Email, $mdp){
        $row = $this->findUserByEmail($Email, $Email);

        if($row == false) return false;

        $hashmdp = $row->password_hash;
        if(password_verify($mdp, $hashmdp)){
            return $row;
        }else{
            return false;
        }
    }

}

?>