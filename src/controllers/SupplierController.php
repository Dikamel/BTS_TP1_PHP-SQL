<?php
namespace App\controllers ;

use App\models\ProductModel;
use App\models\SupplierModel;

class SupplierController{

    private $model ;
    private $productModel ;

    public function __construct() {
        $this->model=new SupplierModel();
        $this->productModel = new ProductModel();
    }

    public function index(){
        $suppliers=$this->model->getAll();
        include __DIR__.'/../views/suppliers_list.php';
    }

    public function form($id){
        if (!empty($id)){
            $supplier=$this->model->getSupplierById($id);
        }
        include __DIR__.'/../views/supplier_form.php';
    }

    public function save_form(){
        $data=$_POST;
        if (!empty($data['id'])){
            $this->model->add_update($data,true);
            
        }else{
            $this->model->add_update($data);
        }

    }
    public function delete($id){
        $this->model->delete($id);
    }

}

?>