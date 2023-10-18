<?php
require_once "./Crud.php";
class Maison extends Crud
{
    public $matricule;
    public $address;
    public $nb_chambres;
    public $pied_carre;
    public $annee_construite;

    public function get_all_maison($table)
    {
        return $this->get_all($this->table);
    }

    public function get_maison_by_matricule($id)
    {
        return $this->getById($this->table, $id);
    }

    public function ajouter_maison($maison)
    {
        $request = "INSERT INTO maison 
        SET addresse = :addresse, nb_chambres = :nb_chambres, pied_carre = :pied_carre, annee_construite = :annee_construite";

        return parent::ajouter_maison($maison, $request);
    }
}

?>