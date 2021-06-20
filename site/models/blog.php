<?php
class Model_blog extends Model_db{


    function showAllBlog($limit){
        $sql = "select * from news where public=1 order by id desc limit {$limit}";
        return $this->result1(0,$sql);
    }
    function showAllBlog2($limit){
        $sql = "select * from news where public=1 order by id asc limit {$limit}";
        return $this->result1(0,$sql);
    }
  

    function getHangHoaTheoLoai($maloai,$pagenum,$pagesize){
        $startrow= ($pagenum - 1) *$pagesize;
        $sql = "SELECT * FROM news WHERE iddm = ?"
                ." ORDER BY id DESC LIMIT $startrow, $pagesize";
        return $this->result1(0,$sql,$maloai);
    }
    function getAllHangHoa($pagenum,$pagesize){
        $startrow= ($pagenum - 1) *$pagesize;
        $sql = "SELECT * FROM news WHERE 1"
                ." ORDER BY id DESC LIMIT $startrow, $pagesize";
        return $this->result1(0,$sql);
    }
    function demAllHangHoa(){
        $sql = "select count(*) as sodong from news where 1";
        return $this->result1(1,$sql)['sodong'];
    }
    function demHangHoaTheoLoai($iddm){
        $sql = "select count(*) as sodong from news where iddm = ?";
        return $this->result1(1,$sql,$iddm)['sodong'];
    }

    function Page($TotalProduct, $CurrentPage,$PageSize,$BaseLink)
    {

        $LimitPage = $PageSize; // 5 sản phẩm 2 trang

        $PagedHTML = ''; // khởi tạo

        $CurrentQuery = $_GET; //query hiện tại

        $NextQuery = $_GET; //next query
        $PrevQuery = $_GET; // query trước

        $LastQuery = $_GET; // query trước đây
        $FirstQuery = $_GET; // query đầu tiên

        $IsLastButtonHidden = '';
        $IsNextButtonHidden = '';

        $IsFirstButtonHidden = '';
        $IsPreviousButtonHidden = '';

        $TotalPage = ceil($TotalProduct / $LimitPage); // tổng số page
        
        if($CurrentPage == 1)
        {
            $IsFirstButtonHidden .= 'hidden';
            $IsPreviousButtonHidden .= 'hidden';
        }
        // nếu page == 1 thì không cho quay về trang trước

        if ((int) $CurrentPage == (int) $TotalPage)
        {
            $IsLastButtonHidden .= 'hidden';
            $IsNextButtonHidden .= 'hidden';
        }
        if($_GET['slug']){
            $slug = '/'.$_GET['slug'].'-';
        }else{
            $slug = '';
        }

        // nếu tổng số page hiện tại == current page thì không có tiếp tục

        $NextQuery['Page'] = $CurrentPage + 1; //tạo ra query tiếp theo
        $LastQuery['Page'] = $TotalPage; // tạo ra query cuối
        
        $linkNextQuery  = ROOT_URL.'/'.$BaseLink. $slug.$_GET['maloai'].'/page-'.($NextQuery['Page']);
        $linkLastQuery  = ROOT_URL.'/'.$BaseLink. $slug.$_GET['maloai'].'/page-'.($LastQuery['Page']);

        $NextButton = '<li class="'.$IsNextButtonHidden.'"><a href="'.$linkNextQuery.'">></a></li>';
        $LastButton = '<li class="'.$IsLastButtonHidden.'"><a href="'.$linkLastQuery.'">>|</a></li>';
            

        $PrevQuery['Page'] = $CurrentPage - 1; //trở về trang trước
        $FirstQuery['Page'] = 1; // trở về trang 1

        $linkPrevQuery  = ROOT_URL.'/'.$BaseLink. $slug.$_GET['maloai'].'/page-'.($PrevQuery['Page']);
        $linkFirstQuery  = ROOT_URL.'/'.$BaseLink. $slug.$_GET['maloai'].'/page-'.($FirstQuery['Page']);

        $PreviousButton = '<li class="'.$IsFirstButtonHidden.'"><a href="'.$linkPrevQuery.'"><</a></li>';
        $FirstButton = '<li class="'.$IsPreviousButtonHidden.'"><a href="'.$linkFirstQuery.'">|<</a></li>';
        // trở về trang trước
        // trở về trang đâu
        $PagedHTML .= $FirstButton.$PreviousButton;
        //tạo html
        if ($CurrentPage <= $TotalPage && $TotalPage >= 1) // nếu page hiện tại nhỏ hơn hoặc bằng tổng số page và và tổng số page >=1
        {
            $PageBreak = 1; // break page

            if ($CurrentPage > ($LimitPage / 2)) // nếu page hiện tại lớn hon 5/2 
            {
                $CurrentQuery['Page'] = 1; // page hiện tại bằng 1 
                $linkCurrentQuery  = ROOT_URL.'/'.$BaseLink.$slug.$_GET['maloai'].'/page-'.($CurrentQuery['Page']);

                $PagedHTML .= '<li><a href="'.$linkCurrentQuery.'">1</a></li>'; // trang đầu
                $PagedHTML .= '<li><a>...</a></li>'; // đến ....
            }

            $Loop = $CurrentPage; // lặp = page hiện tại
           
            while ($Loop <= $TotalPage) // curren page => tổng số page
            {
                if ($PageBreak < $LimitPage) // nếu pagebreak ++ nếu pagebreak < 5 (limit page)
                {
                    $CurrentQuery['Page'] = $Loop; // gán lại cho current query
                    $linkCurrentQuery  = ROOT_URL.'/'.$BaseLink.$slug.$_GET['maloai'].'/page-'.($CurrentQuery['Page']);

                    if ($CurrentPage === $Loop) // nếu currentpage == loop
                    {
                        $PagedHTML .= '<li class="active"><a href="'.$linkCurrentQuery.'">'.$Loop.'</a></li>';
                    } else $PagedHTML .= '<li><a href="'.$linkCurrentQuery.'">'.$Loop.'</a></li>';
                }

                $PageBreak++;
                $Loop++;
            }

            if ($CurrentPage < ($TotalPage - ($LimitPage / 2))) 
            {
                $CurrentQuery['Page'] = $TotalPage;
                $linkCurrentQuery  = ROOT_URL.'/'.$BaseLink.$slug.$_GET['maloai'].'/page-'.($CurrentQuery['Page']);

                $PagedHTML .= '<li><a href="'.$linkCurrentQuery.'">...</a></li>';
                $PagedHTML .= '<li><a href="'.$linkCurrentQuery.'">'.$TotalPage.'</a></li>';
            }
        }

        return $PagedHTML.$NextButton.$LastButton;
    }
    
    
    //end  phân trang
    function getBlogDetail($slug){
        $sql = "SELECT  * FROM news WHERE slug=?";
        return $this->result1(1,$sql,$slug);
    }
    
    function getLastestNews(){
        $sql = "SELECT  * FROM news ORDER BY id DESC";
        return $this->result1(0,$sql);
    }
}
?>