<?php

require_once './modele/modele.php';
require_once './helpers/session_helper.php';

class Controleur {
    private $unModele; 

    public function __construct (){
        $this->unModele = new modele(); // Utilise le nom de classe correct en minuscules.
    }

    /************************ GESTION DES ACTIVITE  *******************/
     public function selectAllActivites () {
        return $this->unModele->selectAllActivites(); // Utilise le nom de la méthode correcte.
    }

    public function searchAllActivites ($filtre) {
        return $this->unModele->searchAllActivites($filtre); // Utilise le nom de la méthode correcte.
    }

    public function insertActivite ($tab){
        $this->unModele->insertActivite($tab); // Utilisez le nom de la méthode correcte.
    }

     public function deleteActivite ($id_act){
        $this->unModele->deleteActivite($id_act); // Utilisez le nom de la méthode correcte.
    } 

    public function selectWhereActivite ($id_act) {
         return $this->unModele->selectWhereActivite($id_act); // Utilise le nom de la méthode correcte.
    }
    

    public function updateActivite ($id_act) {
         return $this->unModele->updateActivite($id_act); // Utilise le nom de la méthode correcte.
    }

    /************************ GESTION DES RENDEZ VOUS  *******************/
    public function selectAllRDVMairies (){
        return $this->unModele->selectAllRDVMairies();
    }
    
    public function insertRDVMairie ($tab){
        $this->unModele->insertRDVMairie($tab);
    }
    
    public function deleteRDVMairie ($id_rdv){
        return $this->unModele->deleteRDVMairie($id_rdv);
    }

    /************************ GESTION DES ENFANTS  *******************/
    public function selectAllEnfants (){
        return $this->unModele->selectAllEnfants();
    }
    
    public function insertEnfant ($tab){
        $this->unModele->insertEnfant ($tab);
    }
    
    public function searchAllEnfants ($filtre){
        return $this->unModele->searchAllEnfants ($filtre);
    }
    
    public function deleteEnfant ($id_enfant){
        return $this->unModele->deleteEnfant($id_enfant);
    }
    
    public function selectWhereEnfant ($id_enfant){
        return $this->unModele->selectWhereEnfant($id_enfant);
    }
    
    public function updateEnfant ($tab){
        $this->unModele->updateEnfant ($tab);
    }
}



?>