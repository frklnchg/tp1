<?php

class Crud
{
    private static $dbcon;
    public function __construct()
    {
        if (!isset(self::$dbcon)) {
            $host = 'localhost';
            $db = 'tp_1';
            $user = 'root';
            $password = '321321';
            $dsn = "mysql:host=$host ; dbname=$db ; charset=UTF8";
            try {
                self::$dbcon = new PDO($dsn, $user);
                echo "Connected to database $db";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

    }


    //---------------------CRUD---------------------
    public function create($request, $item)
    {

        $stmt = $this->dbcon->prepare($request);

        foreach ($item as $key => $value) {
            if (is_int($value)) {
                $stmt->bindParam(':', $key, $value, PDO::PARAM_INT);
            } else {
                $stmt->bindParam(':', $key, $value, PDO::PARAM_STR);
            }
        }
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }


    public function getAll($request)
    {
        $stmt = $this->dbcon->prepare($request);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function getById($request, $id)
    {
        $stmt = $this->dbcon->prepare($request);
        
    }

}

?>