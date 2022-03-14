<?php 
require_once "Model.class.php";
require_once "Personnel.class.php";

class PersonnelManager extends Model
{
    private $personnels;//tableau personnel

    public function ajoutPersonnel($personnel)
    {
        $this->personnels[] = $personnel;
    }

    public function getPersonnels()
    {
        return $this->personnels;
    }

    public function chargementPersonnels()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM personnels");
        $req->execute();
        $monPersonnels = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach($monPersonnels as $personnel){
            $p = new personnel($personnel['id'],$personnel['nom'],$personnel['prenom'],$personnel['sexe'],$personnel['fonction'],$personnel['email'],$personnel['adresse'],$personnel['tel']);
            $this->ajoutPersonnel($p);
        }
    }

    public function getPersonnelById($id){
        for($i=0; $i < count($this->personnels);$i++){
            if($this->personnels[$i]->getId() === $id){
                return $this->personnels[$i];
            }
        }
        throw new Exception("L'employer n'existe pas");
    }

    public function ajoutPersonnelBd($nom,$prenom,$sexe,$fonction,$email,$adresse,$tel)
    {
        $req = "
            INSERT INTO personnels (nom,prenom,sexe,fonction,email,adresse,tel) 
            values (:nom,:prenom,:sexe,:fonction, :email, :adresse,:tel)";
    
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
        $stmt->bindValue(":fonction",$fonction,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
        $stmt->bindValue(":tel",$tel,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        

        if ($resultat > 0) {
                $personnel = new Personnel($this->getBdd()->lastInsertId(),$nom,$prenom,$sexe,$fonction,$email,$adresse,$tel);
                $this->ajoutPersonnel($personnel);
        }
    }


    
    public function suppressionPersonnelBD($id){
        $req = "
        Delete from personnels where id = :idpersonnel
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idpersonnel",$id,PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $livre = $this->getPersonnelById($id);
            unset($personnel);
        }
    }

    
         public function ModifierPersonnelBd($id,$nom,$prenom,$sexe,$fonction,$email,$adresse,$tel)
            {
                $req = "
        update  personnels 
        set nom = :nom, prenom = :prenom, sexe = :sexe,fonction = :fonction,email = :email,adresse = :email,tel= :tel
        where id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
        $stmt->bindValue(":prenom",$prenom,PDO::PARAM_STR);
        $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
        $stmt->bindValue(":fonction",$fonction,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":adresse",$adresse,PDO::PARAM_STR);
        $stmt->bindValue(":tel",$tel,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if($resultat > 0){
            $this->getPersonnelById($id)->setTitre($nom);
            $this->getPersonnelById($id)->setTitre($prenom);
            $this->getPersonnelById($id)->setTitre($sexe);
            $this->getPersonnelById($id)->setTitre($fonction);
            $this->getPersonnelById($id)->setTitre($email);
            $this->getPersonnelById($id)->setTitre($adresse);
            $this->getPersonnelById($id)->setTitre($tel);
        }
    }

}