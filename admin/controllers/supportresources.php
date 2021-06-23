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
            $oneRecode = $this->modelSpResources->getDetailSpResources($_GET['id']);
            $page_title = "Sửa bài viết";
            $page_file = "views/spresources_edit.php";
        } else {
            $page_title = "Thêm bài viết";
            $page_file = "views/spresources_add.php";
        }

        if (isset($_POST['them']) && $_POST['them']) {
            $name   = $this->lib->stripTags($_POST['name']);            
            $link   = $_POST['link'];
            $img    = $_FILES['img'];            
            $imgs   = $this->lib->checkUpLoadMany($img);
            if ($imgs) {                
                $checkIMG = explode(",", $imgs);                
               
                for ($i = 0; $i < count($checkIMG); $i++) {
                    $checkIMG[$i] = explode(".", $checkIMG[$i]);
                    $checkIMG[$i][1] = strtolower($checkIMG[$i][1]);
                    if ($checkIMG[$i][1] != "jpg" && $checkIMG[$i][1] != "jpeg" && $checkIMG[$i][1] != "png" && $checkIMG[$i][1] != "gif" && $checkIMG[$i][1] != "webp" && $checkIMG[$i][1] != "svg") {
                        $checkimg = "Chỉ chấp nhận file .jpg, .jpeg, .png, .svg";
                        break;
                    }
                }
            }                               
                                      
            $_SESSION['message'] = "";

            if ($name == "") {
                $_SESSION['message'] = "Bạn chưa nhập tên";
            } else if ($img == "") {
                $_SESSION['message'] = "Bạn chưa chọn ảnh";
            } else if ($checkimg) {
                $_SESSION['message'] = $checkimg;
            } else if ($link == "") {
                $_SESSION['message'] = "Bạn chưa nhập link";
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
                    
                    $this->edit($name, $imgs, $link, $id);
                    exit();

                } else {                                        
                    $this->store($name, $imgs, $link);
                }
            }
        }
        require_once "views/layout.php";
    }

    public function store($name, $img, $link)
    {
        if ($this->modelSpResources->addNewSpResources($name, $img, $link)) {
            header("location: ?ctrl=supportresources");
        } else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit($name, $imgs, $link, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->modelSpResources->editSpResources($name, $imgs, $link, $id)) {
                header("location: ?ctrl=supportresources");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    public function delete()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] == 'supportresources')) {
            $id = $_GET['id'];
            settype($id, "int");

            if ($this->modelSpResources->deleteSpResources($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=supportresources   ");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
