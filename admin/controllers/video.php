<?php
require_once "models/video.php";
require_once "../lib/myfunctions.php";
class video
{
    public function __construct()
    {
        $this->model = new Model_video();
        $this->lib = new lib();
        $act = "index";

        if (isset($_GET["act"]) == true) {
            $act = $_GET['act'];
        }

        switch ($act) {
            case 'index':
                $this->index();
                break;
            case 'edit':
                $this->addNew();
                break;

            default:

                break;
        }

    }
    public function index()
    {
        $list = $this->model->listRecords();
        $page_title = "Danh sách danh mục";
        $page_file = "views/video_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'categories')) {
            $oneRecode = $this->model->showOneVideo($_GET['id']);
            $page_title = "Sửa danh mục";
            $page_file = "views/video_edit.php";
        } 

        if (isset($_POST['them']) && $_POST['them']) {
            $name = $this->lib->stripTags($_POST['name']);
            $linkyoutube = $_POST['linkyoutube'];

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                settype($id, "int");
                
                $this->edit($name,$linkyoutube, $id);
            }
        }

        require_once "views/layout.php";
    }

    public function edit($name,$linkyoutube, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->model->editVideo($name,$linkyoutube, $id)) {
                echo "<script>alert('Sửa thành công')</script>";
                header("location: ?ctrl=video");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
