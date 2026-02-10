<?php
namespace App\controllers ;

use App\models\ProductModel;
use App\models\SupplierModel;

class ProductController {
    private $model;
    private $supplierModel;

    public function __construct(){
        $this->model=new ProductModel();
        $this->supplierModel= new SupplierModel();
    }

    #Retourne la liste de tous les produits avec noms des fournisseurs
    public function index(){
        $produits=$this->model->getAllWithSuppliers();
        include __DIR__.'/../views/products_list.php';
    }


    #lancer formulaire pour ajouter ou mettre à jour un produit
    public function form($id=null){
        if (!empty($id)){
            $produit=$this->model->getProductById($id);
        }
        $suppliers=$this->supplierModel->getAll();
        include __DIR__.'/../views/product_form.php';
    }

    public function saveForm(){
        $data = $_POST;
        if (!empty($data['id'])){
            $this->model->add_update($data,update:true);
        }else {
            $this->model->add_update($data);
        }
    }
    
    public function delete($id){
        $this->model->delete($id);
    }

}