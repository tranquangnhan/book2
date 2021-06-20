<?php
require_once "models/categories.php";
require_once "../lib/myfunctions.php";
class categories
{
    public function __construct()
    {
        $this->model = new Model_categories();
        $this->lib = new lib();
        $act = "index";

        if (isset($_GET["act"]) == true) {
            $act = $_GET['act'];
        }

        switch ($act) {
            case 'index':
                $this->index();
                break;
            case 'addnew':
                $this->addNew();
                break;
            case 'edit':
                $this->addNew();
                break;
            case 'delete':
                $this->delete();
                break;
            default:

                break;
        }

    }
    public function index()
    {
        $list = $this->model->listRecords();
        $page_title = "Danh sách danh mục";
        $page_file = "views/categories_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'categories')) {
            $oneRecode = $this->model->showOneProducer($_GET['id']);    
            $page_title = "Sửa danh mục";
            $page_file = "views/categories_edit.php";
        } else {
            $page_title = "Thêm danh mục";
            $page_file = "views/categories_add.php";
        }

        if (isset($_POST['them']) && $_POST['them']) {
            $name = $_POST['name'];
            $name = $this->lib->stripTags($name);
            $slug = $this->lib->slug($name);

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                settype($id, "int");
                
                $this->edit($name, $slug, $id);
            } else {
                $this->store($name, $slug);
            }
        }

        require_once "views/layout.php";
    }

    public function store($name, $slug)
    {
        if ($this->model->addNewCate($name, $slug)) {
            echo "<script>alert('Thêm thành công')</script>";
            header("location: ?ctrl=categories");
        } else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit($name, $slug, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->model->editCategory($name, $slug, $id)) {
                echo "<script>alert('Sửa thành công')</script>";
                header("location: ?ctrl=categories");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    public function delete()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] == 'categories')) {
            $id = $_GET['id'];
            settype($id, "int");

            if ($this->model->deleteCate($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=categories");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
