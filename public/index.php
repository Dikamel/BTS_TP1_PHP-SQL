<?php
# Routeur, ç av aêtre ma page que va lancer le serveur par défaut 
require_once __DIR__ . '/../src/services/Database.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\controllers\ProductController;
use App\controllers\SupplierController;

use Dotenv\Dotenv ;
$dotenv= Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$controller = new ProductController;
$supplier_controller = new SupplierController;
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;
switch ($action) {
    case 'form' : 
        $controller->form($id);
        break;
    case 'save' :
        $controller->saveForm();
        $controller->index();
        break; 
    case 'delete_product' : 
        $controller->delete($id);
        $controller->index();  
        break;
    case 'suppliers_list':
        $supplier_controller->index();
        break;
    case 'supplier_form':
        $supplier_controller->form($id);
        break;
    case 'save_form_supplier':
        $supplier_controller->save_form();
        $supplier_controller->index();
        break;
    case 'delete_supplier':
        $supplier_controller->delete($id);
        $supplier_controller->index();
        break;

    default:
        $controller->index();
}


