<?php
require_once "models/PersonnelManager.class.php";

class PersonneController
{
    private $personnelManager;


    public function __construct()
    {
        $this->personnelManager = new PersonnelManager;
         $this->personnelManager ->chargementPersonnels();
    }

    public function afficherPersonnels()
    {
        $personnels = $this->personnelManager->getPersonnels();
        require "views/personnel.view.php";
    }

    public function afficherPersonnel($id)
    {
        $personnel = $this->personnelManager->getPersonnelById($id);
        require "views/afficherPersonnel.view.php";
    }

    public function ajoutPersonnel()
    {
        require "views/Ajouter.view.php";
    }


    public function ajoutPersonnelValidation(){
        $this->personnelManager->ajoutPersonnelBd($_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['fonction'],$_POST['email'],$_POST['adresse'],$_POST['tel']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Ajout Réalisé"
        ];
        
        header('Location: '. URL . "personnels");
    }

    public function suppressionPersonnel($id){
        $this->personnelManager->suppressionPersonnelBD($id);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Suppression Réalisée"
        ];
        header('Location: '. URL . "personnels");
    }


    //pour Modifier 
    public function modificationPersonnel($id){
        $personnel = $this->personnelManager->getPersonnelById($id);
        require "views/modifierPersonnel.view.php";
    }


    public function modificationPersonnelValidation(){
        
        $this->personnelManager->ModifierPersonnelBd($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['sexe'],$_POST['fonction'],$_POST['email'],$_POST['adresse'],$_POST['tel']);
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "modification Réalisée"
        ];
        
        header('Location: '. URL . "personnels");
    }


}