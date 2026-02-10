<?php

namespace App\models;
# y venir faire classe, pdo, et ensuite une méthode pour retourner la liste des produits avece leur fournisseurs (unioin)

use PDO;
use App\services\Database;
use PDOException;

class ProductModel
{
    private PDO $pdo;
    public function __construct(){
        $this->pdo = Database::getConnection();
    }

    public function getAllWithSuppliers(){
        $query = "SELECT p.id_product, p.name ,p.description ,p.price ,s.name AS 'supplier' FROM products as p INNER JOIN suppliers as s ON p.fk_supplier=s.id_supplier" ;
        return $this->pdo->query($query )->fetchAll(PDO::FETCH_ASSOC);
    }

     public function getProductById($id){
        $query = "SELECT p.id_product, p.name ,p.description ,p.price ,s.name AS 'supplier' FROM products as p INNER JOIN suppliers as s ON p.fk_supplier=s.id_supplier WHERE p.id_product='$id'" ;
        return $this->pdo->query($query )->fetch(PDO::FETCH_ASSOC);
    }


    //Ajoute ou modifie un produit si existant
    public function add_update($data,$update=false){
        if ($update){
            $sql="UPDATE products SET name=:nom, description=:description, price=:prix,fk_supplier=:fournisseur WHERE id_product=$data[id]";
        }else{
           $sql="INSERT INTO products (name,description,price,fk_supplier) VALUES (:nom, :description, :prix, :fournisseur)"; 
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('nom',$data['nom'],PDO::PARAM_STR);
        $stmt->bindValue('description',$data['description'], PDO::PARAM_STR);
        $stmt->bindValue('prix',$data['prix'], PDO::PARAM_STR);
        $stmt->bindValue('fournisseur',$data['fournisseur'], PDO::PARAM_INT);
        try {
            $stmt->execute();
         }catch (PDOException $e){
            die("Erreur lors de " . ($update ? "la modification" : "l'ajout") . " du produit : " . $e->getCode() . " " . $e->getMessage());
         }
    }

    public function delete($id){
        $sql="DELETE FROM products WHERE id_product=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('id',$id,PDO::PARAM_INT);
        try {
            $stmt->execute();
         }catch (PDOException $e){
            die("Erreur lors de la suppression du produit : ".$e->getCode().$e->getMessage());
         }
    }

}
