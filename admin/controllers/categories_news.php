<?php
require_once "models/categories_news.php";
require_once "../lib/myfunctions.php";
class categories_news
{
    public function __construct()
    {
        $this->model = new Model_categories_news();
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
        $page_file = "views/categories_news_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'categories')) {
            $oneRecode = $this->model->showOneProducer($_GET['id']);    
            $page_title = "Sửa danh mục";
            $page_file = "views/categories_news_edit.php";
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
            }
        }

        require_once "views/layout.php";
    }

    public function edit($name, $slug, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->model->editCategory($name, $slug, $id)) {
                echo "<script>alert('Sửa thành công')</script>";
                header("location: ?ctrl=categories_news");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
