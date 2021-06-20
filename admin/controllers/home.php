<?php 

class home
{
    function __construct()
    {
       
        $act = "home";
        if(isset($_GET["act"])==true) $act = $_GET['act'];
        switch ($act) {
            case 'home':
                $this->index();
                break;
            default:
                break;
        }
     
    }
    function index(){
            $page_file = "views/home.php";
            require_once "views/layout.php";
    }

  
}
