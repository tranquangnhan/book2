<?php
require_once "../system/config.php";
//    require_once "../languages/".$_SESSION['lang'].".php";

require_once "../system/database.php";
require_once "../lib/myfunctions.php";
require_once "models/home.php";
require_once "models/user.php";
require_once "models/blog.php";
class Home
{
    public function __construct()
    {
        $this->model = new model_home();
        $this->modelUser = new Model_user();
        $this->modelBlogs = new Model_blog();
        $this->lib = new lib();

        $act = "home";
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        }

        switch ($act) {
            case "home": 
                $this->home();
                break;
            case "productdetail": 
                $this->productdetail();
                break;
            case "about": 
                $this->about();
                break;
            case "products": 
                $this->products();
                break;
            case "student": 
                $this->student();
                break;
            case "teacher": 
                $this->teacher();
                break;            
            case "parent": 
                $this->parent();
                break;
            case "blog": 
                $this->blog();
                break;    
            case "blogdetail": 
                $this->blogdetail();
                break;           
            case "contact": 
                $this->contact();
                break;
            case "updateSlug":
                $this->updateSlug();
                break;
            
        }

    }

    function updateSlug() {
        $listBook = $this->model->getAllProduct();
        foreach ($listBook as $book) {
            $slug = $this->slug($book['name']);
            $slug = $slug . '-' . $book['id'];
            $id   = $book['id'];
            $this->model->updateSlug($slug, $id);             
        }        
        exit();
    }

    function slug($str) {
        $str = $this->stripUnicode($str);
        $ar  = array("%", "$", "*", "&", "?", "!", "#", "@"); // % $ * & ? ! # @
        $str = str_replace($ar, " ",$str);
        $str = trim(preg_replace('/\s+/',' ', $str)); // \s+ là một hoặc nhiều khoảng trắng
        $str = str_replace(" ", "-",$str);
        return $str;
    }

    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|A',
            'd'=>'đ|Đ|D', 'f'=>'F', 's'=>'S', 'r'=>'R', 'w'=>'W', 'q'=>'Q', 't'=>'T', 'p'=>'P', 'g'=>'G',
            'h'=>'H', 'j'=>'J', 'k'=>'K', 'l'=>'L', 'z'=>'Z', 'x'=>'X', 'c'=>'C', 'v'=>'V', 'b'=>'B', 'n'=>'N', 'm'=>'M',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|E',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|I',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|O',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|U',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Y',
        );
        foreach($unicode as $khongdau=>$codau) {
            $arr =explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    public function home()
    {
        $page_title   = "Trang Chủ - EngBook";
        $viewFile     = "views/home.php";
        $abouts       = $this->model->getAbouts();
        $video        = $this->model->getAllVideo();
        require_once "views/layout.php";
    }

    public function about() {
        $page_title   = "Giới Thiệu - EngBook";
        $viewFile     = "views/about.php";
        $css          = "about.css";
        if (isset($_GET['id'])) {
            $id          = $_GET['id'];
            $aboutDetail = $this->model->getAboutDetail($id);
            $namePage2 = $aboutDetail['name'];
        }   
        $namePage     = "Giới Thiệu";        
        require_once "views/layout.php";
    }

    public function products() {
        $page_title     = "Sản Phẩm - EngBook";
        $viewFile       = "views/product-list.php";
        $namePage       = "Sản Phẩm";        
        $js             = "product-list.js";
        $ajax           = ["product-list.js"];
        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $idCateFirst    = $categories[0]['id'];

        if (isset($_GET['level'])) {            
            $level = $_GET['level'];
                    
            if ($level == 1) {
                $listProduct   = $this->model->getProductsByClass('0');                
                $AmountProduct = $this->model->countProductsByTypes('', '0', '');
            } else if ($level == 2) {
                $listProduct   = $this->model->getProductsByTypes('1', '1', $idCateFirst);
                $AmountProduct = $this->model->countProductsByTypes('1', '1', $idCateFirst);
                
            } else if ($level == 3) {
                $listProduct   = $this->model->getProductsByTypes('1', '6', $idCateFirst);
                $AmountProduct = $this->model->countProductsByTypes('1', '6', $idCateFirst);
            } else if ($level == 4) {
                $listProduct   = $this->model->getProductsByTypes('1', '10', $idCateFirst);
                $AmountProduct = $this->model->countProductsByTypes('1', '10', $idCateFirst);
            }
            
        } else {
            $level = 6;
            $listProduct    = $this->model->getProducts();
            $AmountProduct  = $this->model->getAmountProducts();
        }

        if ($AmountProduct == 0) {
            $mess = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
        }

        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);
        require_once "views/layout.php";
    }

    public function productdetail() {
        $slug = $_GET['slug'];
        $oneproduct = $this->model->getOnePro($slug);
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $slugPart1 =  $this->model->getSlugByPart($oneproduct['id']);
        
        $slugPart2 =   $this->model->getSlugById($oneproduct['id']);


        if($this->model->getSlugByPart($oneproduct['id']) == ''){
            $slugPart1 = $this->model->getSlugById($oneproduct['id']);
            $slugPart2 =  $this->model->getSlugById($oneproduct['part']);
        }

        $getProductsSameClass = $this->model->getProductsSameClass($oneproduct['class']);

   
        $page_title   = "Sản Phẩm Chi Tiết - EngBook";
        $viewFile     = "views/product-detail.php";
        $css          = "product-detail.css";
        $js           = "course-detail.js";
        $namePage     = "Sản Phẩm";
        require_once "views/layout.php";
    }

    public function student() {
        $page_title     = "Học Sinh - EngBook";
        $viewFile       = "views/student.php";
        $css            = "student.css";        
        $namePage       = "Học Sinh";               
        $ajax           = ["product-list.js", "student.js"];

        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $idCateFirst    = $categories[0]['id'];

        $where          = ' type = 1 ';
        $listProduct    = $this->model->getProductLimit($where);        
        $allproduct     = $this->model->getProductStudent();        
        $AmountProduct  = count($allproduct);
        
        if ($AmountProduct == 0) {
            $mess = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
        }

        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);

        require_once "views/layout.php";
    }

    public function teacher() {
        $page_title     = "Giáo Viên - EngBook";
        $viewFile       = "views/teacher.php";
        $css            = "teacher.css";    
        $js             = "teacher.js";    
        $namePage       = "Giáo Viên";            
        $ajax           = ["product-list.js", "teacher.js"];
        $where          = ' type = 2 ';

        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $listProduct    = $this->model->getProductLimit($where);        
        $allproduct     = $this->model->getProductTeacher();        
        $AmountProduct  = count($allproduct);
        
        if ($AmountProduct == 0) {
            $mess = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
        }
        
        $listSpResources = $this->model->getSpResouceslimit();
        $amountSpResources = $this->model->getAmountSpResources();
        
        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);        
        $pageNumberResources = ceil($amountSpResources / $limitItem); 
        
        require_once "views/layout.php";
    }

    public function parent() {
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $page_title   = "Phụ Huynh - EngBook";
        $viewFile     = "views/parent.php";          
        $namePage     = "Phụ Huynh";
        require_once "views/layout.php";
    }

    public function blog() {
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $showDmBlog =  $this->modelBlogs->getAllBlogCate();

        if(isset($_GET['maloai'])==true&&($_GET['maloai']>0))
        $maLoai= $_GET['maloai'];

        $pageNum=1;
        if(isset($_GET['Page'])==true) $pageNum = $_GET['Page'];
       
        settype($maLoai,"int");
        settype($pageNum,"int");

        if($pageNum<=0) $pageNum = 1;
        $pageSize = PAGE_SIZE_BAIVIET;

        if($maLoai)
        {
            $ds =  $this->modelBlogs->getHangHoaTheoLoai($maLoai,$pageNum,$pageSize);
         
            $TotalProduct = (int)  $this->modelBlogs->demHangHoaTheoLoai($maLoai);
        }
        if(!$maLoai)
        {    
            $ds =  $this->modelBlogs->getAllHangHoa($pageNum,$pageSize);
            $TotalProduct = (int) $this->modelBlogs->demAllHangHoa();
        }

        if($TotalProduct == 0) $TotalProduct =1;
        $BaseLink= 'bai-viet';


        $Pagination =  $this->modelBlogs->Page($TotalProduct, $pageNum,$pageSize,$BaseLink);

        $page_title   = "Tin Tức - EngBook";
        $viewFile     = "views/blog-list.php";          
        $namePage     = "Tin Tức";
        require_once "views/layout.php";
    }

    public function blogdetail() {
        $slug = $_GET['slug'];
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $oneBlog = $this->modelBlogs->getBlogDetail($slug);
   

        $page_title   = "Tin Tức - EngBook";
        $viewFile     = "views/blog-detail.php";     
        $css          = "blog-detail.css";         
        $namePage     = "Tin Tức";
        require_once "views/layout.php";
    }

    public function contact() {
        if(isset($_POST['submitMessage'])){
            $name = strip_tags(trim($_POST['name']));
            $email = strip_tags(trim($_POST['email']));
            $subject = strip_tags(trim($_POST['subject']));
            $message = strip_tags(trim($_POST['message']));
            if($name == '' || $email == ''|| $subject=='' ||$message == '' ){
               echo '<script>alert("Bạn chưa điền đủ thông tin !")</script>';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
                echo '<script>alert("Email không đúng định dạng !")</script>';
            }else{
               $this->model->storeContact($name,$email,$subject,$message);
               echo '<script>alert("Cảm ơn! Chúng tôi sẽ liên hệ bạn sớm nhất !")</script>';
            } 
         }
        $page_title   = "Liên Hệ - EngBook";
        $viewFile     = "views/contact.php";     
        $css          = "contact.css";         
        $namePage     = "Liên Hệ";
        require_once "views/layout.php";
    }

}
