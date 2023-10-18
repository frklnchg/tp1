<?php

//  require(' ') FILE NEEDED TO COMPILE CODE
//  include(' ') CODE WILL COMPILE IF FILE NOT FOUND
//  ex.: profile pic if someone wants to upload a photo
class Maison
{
    //require_once()
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    //---------------------CREATE---------------------
    public function createMaison($maison)
    {
        $query = "INSERT INTO maison 
                  SET addresse = :addresse, nb_chambres = :nb_chambres, pied_carre = :pied_carre, annee_construite = :annee_construite";
        $stmt = $this->dbcon->prepare($query);
        $stmt->bindParam(':addresse', $maison['addresse'], PDO::PARAM_STR);
        $stmt->bindParam(':nb_chambres', $maison['nb_chambres'], PDO::PARAM_INT);
        $stmt->bindParam(':pied_carre', $maison['pied_carre'], PDO::PARAM_STR);
        $stmt->bindParam(":annee_construite", $maison['annee_construite'], PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    //---------------------READ---------------------
    public function getAllMaison()
    {
        $query = "SELECT matricule, addresse, nb_chambres, pied_carre, annee_construite FROM maison";
        $stmt = $this->dbcon->prepare($query);
        $stmt->execute();
        $maisons = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $maisons[] = $row;
        }
        return $maisons;
    }

    // public function getMaisonByMatricule($id)
    // {
    //     $query = "SELECT matricule, addresse, nb_chambres, pied_carre, annee_construite FROM maison WHERE matricule = :id";
    //     $stmt = $this->dbcon->prepare($query);
    //     $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetch(PDO::FETCH_ASSOC);
    // }

    public function getMaisonById($id)
    {
        return $this-> getById($this->table, $id);
    }

    //---------------------UPDATE---------------------
    // public function updateMaison($id, $data)
    // {
    //     $query = "UPDATE maison
    //               SET addresse = :addresse, nb_chambres = :nb_chambres, pied_carre = :pied_carre, annee_construite = :annee_construite
    //               WHERE matricule = :matricule";
    //     $stmt = $this->dbcon->prepare($query);
    //     $stmt->bindParam(':matricule', $id, PDO::PARAM_INT);
    //     $stmt->bindParam(':addresse', $data['addresse'], PDO::PARAM_STR);
    //     $stmt->bindParam(':nb_chambres', $data['nb_chambres'], PDO::PARAM_INT);
    //     $stmt->bindParam(':pied_carre', $data['pied_carre'], PDO::PARAM_INT);
    //     $stmt->bindParam(':annee_construite', $data['annee_construite'], PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->rowCount() > 0;
    // }

    public function updateMaison($request, $id)
    {
        $maisonData = [
            'matricule' => $this->id,
            'addresse' => $this->addresse,
            'nb_chambres' => $this->nb_chambres,
            'pied_carre' => $this->pied_carre,
            'annee_construite' => $this->annee_construite
        ];
    }



    //---------------------DELETE---------------------
    public function deleteMaison($id)
    {
        $query = "DELETE FROM maison
                  WHERE matricule = :matricule";
        $stmt = $this->dbcon->prepare($query);
        $stmt->bindParam(':matricule', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    // DISCONNECT FROM DB
    public function __destruct()
    {
        $this->dbcon = null;
    }
}
?>