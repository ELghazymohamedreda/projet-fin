<?php
$connect = mysqli_connect('localhost','Root','','Lavage');


class LavageesManager{

    private $nom;
    private $prenom;
    private $etat;
    private $prix;
    private $matricule;

    public function __construct($nom,$prenom,$etat,$prix,$matricule){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->etat=$etat;
        $this->prix=$prix;
        $this->matricule=$matricule;
    }

    public function insertLavage($connect){
        $nom = $connect->real_escape_string($this->nom);
        $prenom = $connect->real_escape_string($this->prenom);
        $etat = $connect->real_escape_string($this->etat);
        $prix = $connect->real_escape_string($this->prix);
        $matricule = $connect->real_escape_string($this->matricule);
        $sql = "INSERT INTO `Client`(`nom`, `prenom`, `date`, `etat`, `prix`, `matricule`)VALUES('$nom','$prenom',NOW(),'$etat','$prix','$matricule')";
        $query = $connect->query($sql);
        return $query;

    }
     
}

class lavageEdit{

    private $nom;
    private $prenom;
    private $etat;
    private $prix;
    private $matricule;
    private $id;

    public function __construct($nom,$prenom,$etat,$prix,$matricule,$id){
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->etat=$etat;
        $this->prix=$prix;
        $this->matricule=$matricule;
        $this->id = $id;
    }

    public function LavageUpdate($connect){
        $nom = $connect->real_escape_string($this->nom);
        $prenom = $connect->real_escape_string($this->prenom);
        $etat = $connect->real_escape_string($this->etat);
        $prix = $connect->real_escape_string($this->prix);
        $matricule = $connect->real_escape_string($this->matricule);
        $id = $this->id;

        $sql = "UPDATE `Client` SET `nom`='$nom',`prenom`='$prenom',`etat`='$etat',`prix`='$prix',`matricule`='$matricule' WHERE ID='$id'";
        $query = $connect->query($sql);
        return $query;

    }
     
}

class lavageDelete{
    private $id;

    public function __construct($id){
       
        $this->id = $id;
    }

    public function delete_lavage($connect){
        
        $id = $this->id;

        $sql = "DELETE FROM Client WHERE ID='$id'";
        $query = $connect->query($sql);
        return $query;

    }
     
}

class display_client{

    public function displayClient($connect){
        
        $sql = "SELECT * FROM Client";
        $query = $connect->query($sql);
        return $query;

    }
}




?>