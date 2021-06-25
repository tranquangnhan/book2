<?php
require_once "../../../system/config.php";
require_once "../../../system/database.php";
require_once "../../models/categories.php";
require_once "../../models/product.php";
require_once "../../models/supportresources.php";
$model_categories = new Model_categories;
$model_product    = new Model_product();
$model_sprs       = new Model_SpResources();

switch ($_POST['action']) {
    case 'checkProductIssetByCategoryId':
        $array = array();
        $id = $_POST['idcate'];
        $numProduct = $model_product->countProductByIdcate($id);       
        
        echo json_encode($numProduct);
        break;
    case 'getOrdinalByClass':
        $valueSelected = $_POST['valueSelected'];
        $spresource    = $model_sprs->getSpresourceByClass($valueSelected);
        echo json_encode($spresource);
        break;
    default:
        # code...
        break;
}


