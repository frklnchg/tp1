<?php


//  UNCORRECT VERSION




$host = "localhost";
$db = "tp_1";
$user = "root";
$password = "321312";

$dsn = "mysql:host=$host; dbname=$db; charset=UTF8";

global $dbcon;
try {
    $dbcon = new PDO($dsn, $user);
    if ($dbcon) {
        echo "Connected to database $db";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

require_once "./class/maison.php";

$maisons = new Maison($dbcon);

//  GET ALL MAISON
// $allMaisons = $maisons->getAllMaison();
// print_r($allMaisons);



//  GET MAISON BY MATRICULE
// $getMaisonByMatricule = $maisons->getMaisonByMatricule(1);
// print_r($getMaisonByMatricule);


//  CREATE MAISON
// $createMaison = [
//     "addresse" => "3055 Marleau",
//     "nb_chambres" => 3,
//     "pied_carre" => 300.2,
//     "annee_construite" => 1922
// ];
// $createdHouse = $maisons->createMaison($createMaison);
// var_dump($createdHouse);



//  UPDATE
// $updateMaison = [
//     "addresse" => "3055 Marcel",
//     "nb_chambres" => 3,
//     "pied_carre" => 300.2,
//     "annee_construite" => 1922
// ];

// $updatedHouse = $maisons->updateMaison(19,$updateMaison);
// print_r($updatedHouse);


//  DELETE
$deleteMaison = $maisons->deleteMaison(19);
$getall = $maisons->getAllMaison();

foreach($getall as $all){
    echo "<br>";
    print_r($all);
}




    ?>