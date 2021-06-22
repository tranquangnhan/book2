<?php
require_once "models/supportresources.php";
require_once "../lib/myfunctions.php";
class supportresources
{
    public function __construct()
    {
        $this->modelSpResources = new Model_SpResources();
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
        $list = $this->modelSpResources->listRecords();        
        $page_title = "Danh sách bài viết";
        $page_file = "views/spresources_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {        
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'blogs')) {
            $oneRecode = $this->modelSpResources->getDetailAbout($_GET['id']);
            $page_title = "Sửa bài viết";
            $page_file = "views/abouts_edit.php";
        } else {
            $page_title = "Thêm bài viết";
            $page_file = "views/abouts_add.php";
        }

        if (isset($_POST['them']) && $_POST['them']) {
            $name = $this->lib->stripTags($_POST['name']);
            $content = $_POST['content-about'];
            $link = $_POST['link'];

            $slug = $this->lib->slug($name);           
                                          
            $_SESSION['message'] = "";

            if ($name == "") {
                $_SESSION['message'] = "Bạn chưa nhập tên";
            }
                
            if ($_SESSION['message']) {
                header("location: ?ctrl=thongbao");
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                }
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    settype($id, "int");

                    $slug = $slug . '-' . $id;

                     $this->edit($name, $slug, $content, $link, $id);

                } else {                    
                    $slug = $slug . '-' . ($this->modelSpResources->getLastestIdAbout() + 1);

                    $this->store($name, $slug, $content, $link);
                }
            }

        }

        require_once "views/layout.php";
    }

    public function store($name, $slug, $content, $link)
    {
        if ($this->modelSpResources->addNewAbout($name, $slug, $content, $link)) {
            header("location: ?ctrl=about");
        } else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit($name, $slug, $content, $link, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->modelSpResources->editAbouts($name, $slug, $content, $link, $id)) {
                header("location: ?ctrl=about");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    public function delete()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] == 'about')) {
            $id = $_GET['id'];
            settype($id, "int");

            if ($this->modelSpResources->deleteAbout($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=about   ");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
