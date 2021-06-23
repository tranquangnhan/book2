<?php
require_once "models/blogs.php";
require_once "../lib/myfunctions.php";
class blogs
{
    public function __construct()
    {
        $this->modelBlogs = new Model_blogs();
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
        $list = $this->modelBlogs->listRecords();
        $page_title = "Danh sách bài viết";
        $page_file = "views/blogs_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {
        $showDmBlog =  $this->modelBlogs->getAllBlogCate();
        if (isset($_GET['id']) && ($_GET['ctrl'] = 'blogs')) {
            $oneRecode = $this->modelBlogs->getDetailblog($_GET['id']);
            $page_title = "Sửa bài viết";
            $page_file = "views/blogs_edit.php";
        } else {
            $page_title = "Thêm bài viết";
            $page_file = "views/blogs_add.php";
        }

        if (isset($_POST['them']) && $_POST['them']) {
            $name = $this->lib->stripTags($_POST['name']);
            $source = $_POST['source'];
            $iddm = $_POST['iddm'];
            $description = $_POST['description'];
            $content = $_POST['content'];
            $img = $_FILES['img'];
            $date = time();

            $slug = $this->lib->slug($name);

            settype($idcate, "int");
            settype($class, "int");
            settype($type, "int");
            settype($year, "int");            

            $imgs = $this->lib->checkUpLoadMany($img);
            if ($imgs) {                
                $checkIMG = explode(",", $imgs);                
               
                for ($i = 0; $i < count($checkIMG); $i++) {
                    $checkIMG[$i] = explode(".", $checkIMG[$i]);
                    $checkIMG[$i][1] = strtolower($checkIMG[$i][1]);
                    if ($checkIMG[$i][1] != "jpg" && $checkIMG[$i][1] != "jpeg" && $checkIMG[$i][1] != "png" && $checkIMG[$i][1] != "gif" && $checkIMG[$i][1] != "webp") {
                        $checkimg = "Chỉ chấp nhận file .jpg, .jpeg, .png";
                        break;
                    }
                }
            }
                                          
            $_SESSION['message'] = "";
            
            if ($img == "") {
                $_SESSION['message'] = "Bạn chưa chọn ảnh";
            } else if ($checkimg) {
                $_SESSION['message'] = $checkimg;
            } else if ($name == "") {
                $_SESSION['message'] = "Bạn chưa nhập tên";
            }  else if ($iddm == "") {
                $_SESSION['message'] = "Bạn chưa chọn danh mục";
            }else if($description == "") {
                $_SESSION['message'] = "Bạn chưa nhập mô tả";
            }else if($content== ""){
                $_SESSION['message'] = "Bạn chưa nhập nội dung";
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

                     $this->edit($name, $slug, $imgs, $date, $description, $content, $source, $iddm, $id);

                } else {                    
                    $slug = $slug . '-' . ($this->modelBlogs->getLastestIdBlog() + 1);

                    $this->store($name, $slug, $imgs, $date, $description, $content, $source, $iddm);
                }
            }

        }

        require_once "views/layout.php";
    }

    public function store($name, $slug, $imgs, $date, $description, $content, $source, $iddm)
    {
        if ($this->modelBlogs->addNewBlog($name, $slug, $imgs, $date, $description, $content, $source, $iddm)) {
            header("location: ?ctrl=blogs");
        } else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit($name, $slug, $imgs, $date, $description, $content, $source, $iddm, $id)
    {
        if (isset($_GET['id'])) {

            if ($this->modelBlogs->editBlogs($name, $slug, $imgs, $date, $description, $content, $source, $iddm, $id)) {
                header("location: ?ctrl=blogs");
            } else {
                echo "<script>alert('Sửa thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

    public function delete()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] == 'blogs')) {
            $id = $_GET['id'];
            settype($id, "int");

            if ($this->modelBlogs->deleteBlog($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=blogs");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }

}
