<?php
class Personnel
{
    private $id;
    private $nom,
            $prenom,
            $sexe,
            $fonction,
            $email,
            $adresse,
            $tel;


public function __construct($id,$nom,$prenom,$sexe,$fonction,$email,$adresse,$tel)
{
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->sexe = $sexe;
    $this->fonction = $fonction;
    $this->email = $email;
    $this->adresse= $adresse;
    $this->tel = $tel;
}

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getNom(){return $this->nom;}
    public function setNom($nom){return $this->nom = $nom;}

    public function getPrenom(){return $this->prenom;}
    public function setPrenom($prenom){return $this->prenom = $prenom;}

    public function getSexe(){return $this->sexe;}
    public function setSexe($sexe){return $this->sexe = $sexe;}

    public function getFonction(){return $this->fonction;}
    public function setFonction($fonction){return $this->fonction = $fonction;}

    public function getEmail(){return $this->email;}
    public function setEmail($email){return $this->email = $email;}

    public function getAdresse(){return $this->adresse;}
    public function setAdresse($adresse){return $this->adresse = $adresse;}

    public function getTel(){return $this->tel;}
    public function setTel($tel){return $this->tel = $tel;}



}