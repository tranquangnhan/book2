<?php 
    require_once "../../../system/config.php";
    require_once "../../../system/database.php";
    require_once "../../models/home.php";
    $model = new Model_home;
    session_start();
    switch ($_POST['action']) {
        case 'addview':
            $array = array();
   
            $model->addNewView($_POST['idsp']);

            $array['statusCode'] = 1;
            
            echo json_encode($array);
            break;

        case 'comment':
            $array = array();
            
            $lastId = $model->addComment($_POST['review'],$_POST['name'],$_POST['iddt'],$_POST['iduser']);


            $array['datacmt'] = $model->getOneComment($lastId);

            $array['statusCode'] = 1;

            echo json_encode($array);
            break;
        default:
            # code...
            break;
    }
?>