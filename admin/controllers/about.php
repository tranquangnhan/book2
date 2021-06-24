<?php
require_once "models/about.php";
require_once "../lib/myfunctions.php";
class about
{
    public function __construct()
    {
        $this->modelAbout = new Model_about();
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
            case 'move':
                $this->move();
                break;
            default:

                break;
        }

    }
    public function index()
    {
        $list = $this->modelAbout->listRecords();
        $maxOrdinal = $this->modelAbout->getAmountAboutShowing();
        $page_title = "Danh sách bài viết";
        $page_file = "views/abouts_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {        
        $list = $this->modelAbout->listRecords();
        $maxOrdinal = $this->modelAbout->getAmountAboutShowing();
        
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'blogs')) {
            $oneRecode = $this->modelAbout->getDetailAbout($_GET['id']);
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
            $ordinal = $_POST['ordinal']; 

            if ($ordinal == '') {
                $ordinal = 0;
            }           
            
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
                    
                    $idB = $this->modelAbout->getIdMoveByOrdinal($ordinal);
                    $this->modelAbout->updateOrdinalAbout($oneRecode['ordinal'], $idB); // A
                    $this->edit($name, $slug, $content, $link, $ordinal, $id);
                } else {                    
                    $slug = $slug . '-' . ($this->modelAbout->getLastestIdAbout() + 1);
                    if ($ordinal != $maxOrdinal) {
                        $idB = $this->modelAbout->getIdMoveByOrdinal($ordinal);
                        $this->modelAbout->updateOrdinalAbout($maxOrdinal, $idB); // A
                    }
                    $this->store($name, $slug, $content, $link, $ordinal);
                }
            }

        }

        require_once "views/layout.php";
    }

    public function store($name, $slug, $content, $link, $ordinal)
    {
        if ($this->modelAbout->addNewAbout($name, $slug, $content, $link, $ordinal)) {
            header("location: ?ctrl=about");
        } else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit($name, $slug, $content, $link, $ordinal, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->modelAbout->editAbouts($name, $slug, $content, $link, $ordinal, $id)) {
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

            if ($this->modelAbout->deleteAbout($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=about");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    function move() {
        $action = $_GET['action'];
        $ordinal = $_GET['ordinal'];
        if ($action == 'down') {
            $ordinalMove = $ordinal - 1;
        } else if ($action == 'up') {
            $ordinalMove = $ordinal + 1;
        } else {
            echo "<script>alert('Đã có lỗi xảy ra!')</script>";
            header("location: ?ctrl=about");
        }

        $idB = $this->modelAbout->getIdMoveByOrdinal($ordinalMove);
        
        if ($idB) {
            $idA = $this->modelAbout->getIdMoveByOrdinal($ordinal);
            
            $this->modelAbout->updateOrdinalAbout($ordinalMove, $idA); // A
            $this->modelAbout->updateOrdinalAbout($ordinal, $idB); // B
            header("location: ?ctrl=about");
            exit();
        } else {
            echo "<script>alert('Đã có lỗi xảy ra!')</script>";
            header("location: ?ctrl=about");
            exit();
        }                
    }

}
