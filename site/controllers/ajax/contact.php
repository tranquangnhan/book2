<?php
require_once "../../../system/config.php";
require_once "../../../system/database.php";
require_once "../../models/home.php";
$model = new Model_home;
// đây là code của nhân
switch ($_POST['action']) {
    case 'add':
        $array = array();
        
        $array['StatusCode']= $model->storeContactForDetail($_POST['name'],$_POST['phone'],$_POST['id_contact'],$_POST['message'],$_POST['idsp'])? 1: 0;
        
        echo json_encode($array);

        break;
  
    default:
        # code...
        break;
}
