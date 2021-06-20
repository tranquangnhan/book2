<?php
class lib{
    public function stripTags($str){
        return trim(strip_tags($str));
    }


    function checkUpLoadMany($allFile){
        $pathimg = '../uploads/';
        foreach ($allFile['name'] as $file) {
            $nameimg[] = $file;
        }
        foreach($allFile['tmp_name'] as $file){
            $tmp_name[] = $file;
        }
        $imgupload = '';
        for ($i=0; $i <count($nameimg) ; $i++) { 
            $temp = preg_split('/[\/\\\\]+/',$nameimg[$i]);
            $img = $temp[count($temp)-1];
            $target_file = $pathimg . basename($img);
            if (move_uploaded_file($tmp_name[$i], $target_file)) {
                $uploadfile = 'Upload file thành công';
            }
            else{
                $uploadfile = 'upload file không thành công';
            }
            if($i <(count($nameimg) -1)){
                $imgupload .= $nameimg[$i].',';                
            }else{
                $imgupload .= $nameimg[$i];
            }  
        }
    return $imgupload;
    }
    function forMatTien($num){
        $num = round($num, 0);
        $formattedNum = number_format($num, 0, ',', '.');
        return $formattedNum;
    }
    function checkMiddleWare($token){
        return isset($_SESSION['token'])&&($_SESSION['token']) == $token; //check token
    }
    function middleWare(){
        $token = md5(time());
        $_SESSION['token'] = $token;
        echo '<input type="hidden" name="token" value="'.$token.'">';//tạo ra token
    }
    function test_input($data) { //test xem các kí tự đặc biệt
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function thuocTinh($thuoctinh){
        if($thuoctinh == 1){
            $thuoctinh = "Có";
        }else{
            $thuoctinh = "Không";
        }
        return $thuoctinh;
    }
    function slug($str)
    {
        // $str = strtolower($str) ;
        if(!$str) return false;
            $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ', 'D'=>'Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị', 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
            );
            foreach($unicode as $khongdau=>$codau) {
                $arr=explode("|",$codau);
                $str = str_replace($arr,$khongdau,$str);
        }
        $str = str_replace(["%","$","*","&","?","!","#","@","^","+","=",":",",",".","/","|",";","'",'"',"-","“","”","{","}"],"",$str);
        $str = trim($str);
        $str = strtolower($str);
        $str = preg_replace('/\s+/', ' ', $str);
        $str = str_replace(" ","-",$str);
        return $str;
    }

    
    // hàm này dùng để trừ thời gian return ra giờ vd: 1h 30m
    function tinhThoiGian($gioBatDau,$gioKetThuc){
        
        // convert to unix timestamps
        $firstTime=strtotime($gioBatDau);
        $lastTime=strtotime($gioKetThuc);
        
        // perform subtraction to get the difference (in seconds) between times
        $difference=$lastTime-$firstTime;
         
         $years = abs(floor($difference / 31536000));
         $days = abs(floor(($difference-($years * 31536000))/86400));
         $hours = abs(floor(($difference-($years * 31536000)-($days * 86400))/3600));
         $mins = abs(floor(($difference-($years * 31536000)-($days * 86400)-($hours * 3600))/60));#floor($difference / 60);

         return $hours . "h, " . $mins . "m";
    }
    //log file lỗi 
    // biến thứ 1 truyền vào lỗi,
    //biến thứ 2 truyền vào tên function 
    //biến thứ 3 truyền vào tất cả các biến
    function LogFile($ErrorMess, $Function, $Variable)
    {
        $Name = date('d-m-Y');
        $Error = @fopen('D:\hoc-fpt\code-tren-lop\php\xampp3\htdocs\asmphp2\site\log\/'. $Name . '.txt', 'a+');
        @fwrite($Error, PHP_EOL . '--------------' . PHP_EOL);
        @fwrite($Error, 'Error Date: ' . (print_r(date('d-m-Y h:i:s'), true)) . PHP_EOL);
        @fwrite($Error, 'Error In: ' . (print_r($Function, true)) . PHP_EOL);
        @fwrite($Error, 'Error Message: ' . (print_r($ErrorMess, true)) . PHP_EOL);
        @fwrite($Error, 'Variable JSON: ' . (print_r($Variable, true)));
        @fclose($Error);
    }
    // xoá session
    function unsetSs()
    {
        unset($_SESSION['idchuyenbay']);
        unset($_SESSION['hangghe']);
        unset($_SESSION['urlve']);
        unset($_SESSION['vitrighe']);
        unset($_SESSION['vitrighekh']);
        unset($_SESSION['idchuyenbaykh']);
        unset($_SESSION['hangghekh']);
    }
    // get ip user
    function get_client_ip() 
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

     function TokenCreator
    (
        int $KeyLength = 64,
        string $KeySpace = "ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ234567890"
    )
    {
        if ($KeyLength < 1) throw new \RangeException("Length must be a positive integer");

        $Token = [];

        $MinLoop = 0;
        $MaxLoop = mb_strlen($KeySpace, '8bit') - 1;

        while ($MinLoop < $KeyLength)
        {
            ReWhile:
            try {
                $Token[] = $KeySpace[random_int(0, $MaxLoop)];
            }
            catch (\Exception $Error)
            {
                self::LogFile($Error -> getMessage(), 'Token Creator', get_defined_vars());
            }

            if ($Token[$MinLoop] === NULL) goto ReWhile;

            $MinLoop++;
        }

        return implode('', $Token);
    }
    
}