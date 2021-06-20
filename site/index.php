<?php
  session_start();

  require_once("../system/config.php");
  require_once "controllers/home.php";  
  $controller = new home;