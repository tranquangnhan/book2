<?php
require_once "../../../system/config.php";
require_once "../../../system/database.php";
require_once "../../models/categories.php";
require_once "../../models/product.php";
$model_categories = new Model_categories;
$model_product = new Model_product();

switch ($_POST['action']) {
    case 'checkProductIssetByCategoryId':
        $array = array();
        $id = $_POST['idcate'];
        $numProduct = $model_product->countProductByIdcate($id);       
        
        echo json_encode($numProduct);

        break;
  
    default:
        # code...
        break;
}


