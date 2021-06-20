<?php
require_once "models/contact.php";
class contact
{
    function __construct()
    {
        $this->model = new Model_contact();
        $act = "contact";
        if(isset($_GET["act"])==true) $act = $_GET['act'];
        switch ($act) {
            case 'contact':
                $this->index();
                break;
            default:
                break;
        }
     
    }
    function index(){
            $listcontact = $this->model->getInforContact();
            $page_file = "views/contact.php";
            require_once "views/layout.php";
    }

  
}
?>