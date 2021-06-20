<?php
  session_start();
  if(isset($_SESSION['srole'])&&($_SESSION['srole']==1)){
    require_once "../system/config.php";
    require_once "../system/database.php";


    define('ARR_CONTROLLER',["home","product","order","categories","users","thongbao","properties","contact","blogs"]);
    $ctrl = 'product';
    if(isset($_GET['ctrl'])==true) $ctrl=$_GET['ctrl'];
    if(in_array($ctrl,ARR_CONTROLLER)==false) die("Không thấy địa chỉ not found 404");
    $pathFile = "controllers/$ctrl.php";
    if(file_exists($pathFile)== true) {
      require_once $pathFile; 
      $controller = new $ctrl;
    }
    else echo "controllers $ctrl not found 404";
    require_once "views/layout.php";
  }
  else{
    header("location: controllers/login.php");
  }
?>