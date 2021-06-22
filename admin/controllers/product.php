<?php
require_once "models/product.php";
require_once "models/categories.php";
require_once "../lib/myfunctions.php";
class Product
{
    public function __construct()
    {
        $this->model = new Model_product();
        $this->modelCate = new Model_categories();
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
            case 'update':

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

        if (isset($_GET['Page'])) {
            $CurrentPage = $_GET['Page'];
        } else {
            $CurrentPage = 1;
        }

        $TotalProduct = $this->model->countAllProduct();

        if ($TotalProduct == 0) {
            $TotalProduct = 1;
        }

        $ProductList = $this->model->GetProductList($CurrentPage);
        $Pagination = $this->model->Page($TotalProduct, $CurrentPage);
        $page_title = "Danh sách nhà sản xuất";
        $page_file = "views/product_index.php";
        require_once "views/layout.php";
    }
    public function addNew()
    {
        $categoryList = $this->modelCate->listRecords();
        $productList = $this->model->listRecords();
        if (isset($_GET['id']) && ($_GET['act'] = 'product')) {
            $oneRecode = $this->model->getDetailProductById($_GET['id']);
            $page_title = "Sửa Sản Phẩm";
            $page_file = "views/product_edit.php";
        } else {
            $page_title = "Thêm Sách";
            $page_file = "views/product_add.php";
        }

        if (isset($_POST['them']) && $_POST['them']) {
            $name = $this->lib->stripTags($_POST['name']);
            $author = $_POST['author'];
            $idcate = $_POST['idcate'];
            $class = $_POST['class'];
            $type = $_POST['type'];
            $year = $_POST['year'];
            $publishing = $_POST['publishing'];
            $link = $_POST['link'];
            $description = $_POST['description'];
            $img = $_FILES['img'];

            $linksachmengv          =   $_POST['linksachmengv'];
            $linksachmemhs          =   $_POST['linksachmemhs'];
            $linkSachGv             =   $_POST['linksachgv'];
            $linkudtuvung           =   $_POST['linkudtuvung'];
            $linksachgv2            =   $_POST['linksachgv2'];
            $linkudnghenoi          =   $_POST['linkudnghenoi'];
            $linkdekiemtra          =   $_POST['linkdekiemtra'];
            $linkstoryland          =   $_POST['linkstoryland'];  
            $linkppct               =   $_POST['linkppct']; 
            $linkudluyentuvung      =   $_POST['linkudluyentuvung'];
            $linkudluyennghenoi     =   $_POST['linkudluyennghenoi'];      


            if(isset($_GET['id']) && $_GET['id'] && $_POST['part'] !=0){
                $checkIsHavePart = $this->model->checkIsHavePart($_GET['id']);
            }

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
            } else if ($author == "") {
                $_SESSION['message'] = "Bạn chưa nhập tên tác giả";
            } else if ($year == "") {
                $_SESSION['message'] = "Bạn chưa nhập năm";
            } else if ($publishing == "") {
                $_SESSION['message'] = "Bạn chưa nhập nhà xuất bản";
            }else if($checkIsHavePart>=1) {
                $_SESSION['message'] = "Lỗi! Sản phẩm đang là phần 2 ";
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
                    $part = $_POST['part'];

                    $slug = $slug . '-' . $id;
  

                  
                    $this->edit(
                     $name, $slug, $imgs, $type, $class, 
                     $author, $publishing, $year, $description, $link,$part,
                     $linksachmengv,$linksachmemhs ,$linkSachGv,
                     $linkudtuvung,$linksachgv2,$linkudnghenoi,
                     $linkdekiemtra,$linkstoryland,$linkppct,
                     $linkudluyentuvung,$linkudluyennghenoi,
                     $idcate, $id);

                } else {                    
                    $slug = $slug . '-' . ($this->model->getLastestIdProduct() + 1);

                    $this->store(
                     $name, $slug, $imgs, $type, $class, 
                     $author, $publishing, $year, $description, $link,
                     $linksachmengv,$linksachmemhs ,$linkSachGv,
                     $linkudtuvung,$linksachgv2,$linkudnghenoi,
                     $linkdekiemtra,$linkstoryland,$linkppct,
                     $linkudluyentuvung,$linkudluyennghenoi,
                    $idcate);
                }
            }

        }

        require_once "views/layout.php";
    }

    public function store(
        $name, $slug, $imgs, $type, $class, 
        $author, $publishing, $year, $description, $link,
        $linksachmengv,$linksachmemhs ,$linkSachGv,
        $linkudtuvung,$linksachgv2,$linkudnghenoi,
        $linkdekiemtra,$linkstoryland,$linkppct,
        $linkudluyentuvung,$linkudluyennghenoi,
        $idcate
        )
        {
        $idLastBook = $this->model->addNewProduct(
         $name, $slug, $imgs, $type, $class, 
         $author, $publishing, $year, $description, $link,
         $linksachmengv,$linksachmemhs ,$linkSachGv,
         $linkudtuvung,$linksachgv2,$linkudnghenoi,
         $linkdekiemtra,$linkstoryland,$linkppct,
         $linkudluyentuvung,$linkudluyennghenoi,
        $idcate);
        
        if($idLastBook != null) {
            echo "<script>alert('Thêm thành công')</script>";
            header("location: ?ctrl=product");
        }

        else {
            echo "<script>alert('Thêm thất bại')</script>";
        }

        require_once "views/layout.php";
    }

    public function edit(
    $name, $slug, $imgs, $type, $class, 
    $author, $publishing, $year, $description, $link,$part,
    $linksachmengv,$linksachmemhs ,$linkSachGv,
    $linkudtuvung,$linksachgv2,$linkudnghenoi,
    $linkdekiemtra,$linkstoryland,$linkppct,
    $linkudluyentuvung,$linkudluyennghenoi,
    $idcate, $id
    )
    {
        

        if($this->model->editProduct(
        $name, $slug, $imgs, $type, $class, 
        $author, $publishing, $year, $description, $link,$part,
        $linksachmengv,$linksachmemhs ,$linkSachGv,
        $linkudtuvung,$linksachgv2,$linkudnghenoi,
        $linkdekiemtra,$linkstoryland,$linkppct,
        $linkudluyentuvung,$linkudluyennghenoi,
        $idcate, $id))
        {
            echo "<script>alert('Sửa thành công')</script>";
            header("location: ?ctrl=product");
        }else
        {
            echo "<script>alert('Sửa thất bại')</script>";
        }
        require_once "views/layout.php";
    }

    public function delete()
    {
        if (isset($_GET['id']) && ($_GET['ctrl'] == 'product')) {
            $id = $_GET['id'];
            settype($id, "int");
            if ($this->model->deleteProduct($id)) {
                echo "<script>alert('Xoá thành công')</script>";
                header("location: ?ctrl=product");
            } else {
                echo "<script>alert('Xoá thất bại')</script>";
            }
        }
        require_once "views/layout.php";
    }
}
