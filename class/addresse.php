<?php

class Address extends Maison
{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    public function setAddress(array $address): bool
    {
        $query = "INSERT INTO addresse
                  SET numero = :numero, rue = :rue, code_postal = :code_postal, province = :province, pays = :pays";
        $stmt = $this->dbcon->prepare($query);
        $stmt->bindParam(':numero', $address['numero'], PDO::PARAM_INT);
        $stmt->bindParam(':rue', $address['rue'], PDO::PARAM_STR);
        $stmt->bindParam(':code_postal', $address['code_postal'], PDO::PARAM_STR);
        $stmt->bindParam(':province', $address['province'], PDO::PARAM_STR);
        $stmt->bindParam(':pays', $address['pays'], PDO::PARAM_STR);
        
        try{
            $stmt->execute();
            return $stmt->rowCount() > 0;
        }catch(PDOException $e){
            error_log("Error inserting address: " . $e->getMessage());
            return false;
        }
        
    }

    public function getAddress() :array
    {
        $query = "SELECT * FROM address";
        $stmt = $this->dbcon->prepare($query);
        
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            error_log("Error getting addresses" . $e->getMessage());
            return [];
        }
    }

}
