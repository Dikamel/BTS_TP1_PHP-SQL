<?php

namespace App\models;

use PDO;
use App\services\Database;
use PDOException;

class SupplierModel
{
    private PDO $pdo;
    public function __construct(){
        $this->pdo = Database::getConnection();
    }

    public function getAll(){
        $query = "SELECT s.name,s.email,s.phone,s.id_supplier, COUNT(id_product) AS nb_products FROM `suppliers` AS s
                    INNER JOIN products as p ON id_supplier=p.fk_supplier
                    GROUP BY id_supplier";
        return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupplierById($id){
        $sql= "SELECT * FROM suppliers WHERE id_supplier=:id LIMIT 1";
        $stmt= $this->pdo->prepare($sql);
        $stmt->bindValue('id',$id,PDO::PARAM_INT);
        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            die("Erreur lors de la récupération des infos du fournisseur : " . $e->getCode() . " " . $e->getMessage());
        }
    }

    public function add_update($data,$update=false){
        if ($update){
            $sql="UPDATE suppliers SET name=:nom, email=:email, phone=:telephone WHERE $data[id]=id_supplier";
        }else{
            $sql="INSERT INTO suppliers (name,email,phone) VALUES (:nom,:email,:telephone)";
        }
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue('nom',$data['nom'],PDO::PARAM_STR);
        $stmt->bindValue('email',$data['email'],PDO::PARAM_STR);
        $stmt->bindValue('telephone',$data['telephone'],PDO::PARAM_STR);
        try{
            $stmt->execute();
        }catch (PDOException $e){
            die("Erreur lors de " . ($update ? "la modification" : "l'ajout") . " du fournisseur : " . $e->getCode() . " " . $e->getMessage());
        }
    }

    public function delete($id){
        $sql="DELETE FROM suppliers WHERE id_supplier=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindValue('id',$id,PDO::PARAM_INT);
        try {
            $stmt->execute();
        }catch (PDOException $e){
            die("Erreur lors de la suppression du fournisseur : ".$e->getCode().$e->getMessage());
        }
    }

}