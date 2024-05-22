<?php

class database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "mairieV";
    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){

        $dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
}

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

class Modele{
    private $unPDO;
    public function __construct(){
        try{
            $this->unPDO = new PDO(
                "mysql:host=localhost;dbname=mairieV","root","") ;
        }
        catch (PDOException $exp)
        {
            echo "Erreur connexion :".$exp->getMessage();
        }
    }

/************ Gestion des activites **************/
public function selectAllActivites (){
    $requete = "select * from activite ;" ;
    $select = $this->unPDO->prepare ($requete); 
    $select->execute (); 
    return $select->fetchAll();  
}
public function searchAllActivites ($filtre){
    $requete ="select * from activite where nom like :filtre; ";
    $donnees =array(":filtre"=> "%".$filtre."%");
    $select = $this->unPDO->prepare ($requete);
    $select->execute ($donnees);
    return $select->fetchAll();
}
public function insertActivite ($tab){
    $requete ="insert into activite values(
        null, :nom, :date_act, :statut);";
    $donnees =array(	":nom"=>$tab['nom'], 
                        ":date_act"=>$tab['date'], 
                        ":statut"=>$tab['statut']);
    $select = $this->unPDO->prepare ($requete); 
    $select->execute ($donnees); 
}
public function deleteActivite ($id_act){
    $requete ="delete from activite where id_act = :id_act ; " ;
    $donnees =array(":id_act"=>$id_act);
    $select = $this->unPDO->prepare ($requete); 
    $select->execute ($donnees); 
}
public function selectWhereActivite ($id_act){
    $requete = "select * from activite where id_act=:id_act;" ;
    $donnees =array(":id_act"=>$id_act);
    $select = $this->unPDO->prepare ($requete); 
    $select->execute ($donnees);
    $uneClasse = $select->fetch ();
    return $uneActivite; 
}
public function updateActivites ($tab){
    $requete="update activite set nom= :nom, date=:date_act, statut=:statut where id_act=:id_act ;";
    $donnees=array(
                ":nom"=>$tab['nom'],
                ":date_act"=>$tab['date'],
                ":statut"=>$tab['statut']
                );
    $select = $this->unPDO->prepare ($requete);
    $select->execute ($donnees);
}

/********************* Gestion des RDVMairie     ********************/
public function selectAllRDVMairies (){
    $requete ="select * from rdvMairie ; " ;
    $select = $this->unPDO->prepare ($requete);
    $select->execute ();
    return $select->fetchAll();
}
public function insertRDVMairie ($tab){
    $requete ="insert into rdvMairie values (null, :rdv_date, :rdv_heure, :id_user);" ;
    $donnees =array (   ":rdv_date"=>$tab['date'],
                        ":rdv_heure"=>$tab['heure'],
                        ":id_user"=>$tab['id_user']);
    $select = $this->unPDO->prepare ($requete);
    $select->execute ($donnees);
}

    public function deleteRDVMairie ($id_rdv){
        $requete ="delete from classe where id_rdv = :id_user;";
        $donnees =array (":id_user"=>$id_user);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
}

/********************* Gestion des enfants     ********************/
public function selectAllEnfants (){
    $requete ="select * from enfant ; " ;
    $select = $this->unPDO->prepare ($requete);
    $select->execute ();
    return $select->fetchAll();
}

public function searchWhereEnfant ($idfiltre){
        $requete ="select * from enfant where nom like :filtre or prenom;";
        $donnees =array (":idfiltre"=>$idfiltre);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
        return $unProfesseur;
    }

public function insertEnfant ($tab){
    $requete ="insert into enfant values (null, :nom, :prenom, :age);" ;
    $donnees =array (   ":nom"=>$tab['nom'],
                        ":prenom"=>$tab['prenom'],
                        ":age"=>$tab['age']);
    $select = $this->unPDO->prepare ($requete);
    $select->execute ($donnees);
    }

    public function deleteEnfant ($id_enfant){
        $requete ="delete from enfant where id_enfant = :id_enfant;" ;
        $donnees =array (":id_enfant"=>$id_enfant);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
        }

    public function selectWhereEnfant ($id_enfant){
        $requete ="select * from enfant where id_enfant=:id_enfant;";
        $donnees =array (":id_enfant"=>$id_enfant);
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
        $unProfesseur = $select->fetch();
        return $unEnfant;
    }
    public function updateEnfant ($tab){
        $requete="update enfant set nom =:nom, prenom=:prenom, age=:age where id_enfant=:id_enfant;";
        $donnees=array(
            ":nom"=>$tab['nom'],
            ":prenom"=>$tab['prenom'],
            ":age"=>$tab['age'],
            ":id_enfant"=>$tab['id_enfant'],
        );
        $select = $this->unPDO->prepare ($requete);
        $select->execute ($donnees);
    }


}

?>