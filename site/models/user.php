<?php 

use SendGrid\Mail\Mail;
use SendGrid\Mail\TypeException;

    session_start(); 
    // $lib = new lib();    
class Model_user extends Model_db{ 
    
    function checkUser($email,$pass){
       
        $email = str_replace(";","",$email);
        $email = str_replace("'","",$email);
        $email = str_replace('"',"",$email);
        $pass = str_replace(";","",$pass);
        $pass = str_replace("'","",$pass);
        $pass = str_replace('"',"",$pass);
        $email = addslashes($email);
        $pass = addslashes($pass);
        $sql = "select * from user where email=? and pass=?";
        $email = $this->result1(1,$sql,$email,$pass);
        if(is_array($email)){
            $_SESSION['sid'] = $email['idUser'];
            $_SESSION['suser']= $email['name'];
            $_SESSION['srole'] = $email['role'];
            return true;
        }else{
            return false;
        }
    }

    function checkUserSignup($user,$pass){
        $user = str_replace(";","",$user);
        $user = str_replace("'","",$user);
        $user = str_replace('"',"",$user);
        $pass = str_replace(";","",$pass);
        $pass = str_replace("'","",$pass);
        $pass = str_replace('"',"",$pass);
        $user = addslashes($user);
        $pass = addslashes($pass);
        $sql = "select * from users where Username=? and Password=?";
        $user = $this->result1(1,$sql,$user,$pass);
        if(is_array($user)){
            $_SESSION['sid'] = $user['idUser'];
            $_SESSION['suser']= $user['Username'];
            $_SESSION['role'] = $user['VaiTro'];
            return true;
        }else{
            return false;
        }
    }
 
 
    function checkUser2($user){
        $sql = "select * from users where Username=?";
        return $this->result1(1,$sql,$user);
    }
    function registerUser($name,$email,$pass){
        $sql = "INSERT INTO user(name,email,pass) VALUE(?,?,?)";
        return $this->exec1($sql,$name,$email,$pass);
    }
    function IsExist ($user){ // kiểm tra xem user đã tồn tại hay chưa
        $sql = "select * from users where Username=?";
        return $this->result1(1,$sql,$user);
    }
    function checkEmailTonTai($email){
        $sql = "select * from user where email=?";
        return $this->result1(1,$sql,$email);
    }
    
    function checkPhoneTonTai($phone){
        $sql = "select * from users where sodienthoai=?";
        return $this->result1(1,$sql,$phone);
    }
     function addUser($userName,$passWord,$active,$email,$randomKey)
    {
        require_once "../../../lib/vendor/autoload.php";
        $CurrentDate = time();
        $Mailer = new \SendGrid\Mail\Mail();

        try
        {
            $Mailer -> setFrom('tranquangnhan1606@gmail.com', 'Trần Quang Nhân');
        }
        catch (TypeException $Error)
        {
            $lib-> LogFile($Error -> getMessage(), '\Model\User\Register.SendMail', get_defined_vars());
            return false;
        }

        $ActiveLink = 'http://localhost'.SITE_URL.'?act=active&userid='.$userName.'&token='.$randomKey;

        $Mailer -> addTo($email, $userName);
        $Mailer -> setSubject(" Kích hoạt tài khoản của bạn.");

        $Mailer -> addDynamicTemplateData('UserName', $userName);
        $Mailer -> addDynamicTemplateData('UserLogin', $userName);
        $Mailer -> addDynamicTemplateData('ActiveLink', $ActiveLink);
        $Mailer -> setTemplateId('d-8cf80c02ffc74a93bccd52625bb73a15');

        $Sender = new \SendGrid('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');

        try
        {
            $Result = $Sender -> send($Mailer);
        }
        catch (\Exception $Error)
        {
            return false;
        }

        $sql = "INSERT INTO users (Username,Password,kichhoat,Email,randomkey,VaiTro,AnHien) VALUES (?,?,?,?,?,?,?)";
        return $this->exec1($sql,$userName,$passWord,$active,$email,$randomKey,0,0);
    }
    function sendMailResetPass($email){
        require_once "../../../lib/vendor/autoload.php";
        $lib = new lib();

        $Mailer = new \SendGrid\Mail\Mail();
        
        try
        {
            $Mailer -> setFrom('tranquangnhan1606@gmail.com', 'Trần Quang Nhân');
        }
        catch (TypeException $Error)
        {
            $lib-> LogFile($Error -> getMessage(), 'Active Mail Sender.', get_defined_vars());
            return false;
        }

        $UserName = $this -> GetUserName($_POST['Login']);
        $Mailer -> addTo($email, $UserName);

        $Mailer -> setSubject("QGarden - Hóa đơn đã được tạo.");

        $Mailer -> addDynamicTemplateData('UserName', $UserName);
        $Mailer -> addDynamicTemplateData('ResetCode', $_SESSION['Token']);
        $Mailer -> setTemplateId('d-285dec64176b40acbe187320a214f904');

        $Sender = new \SendGrid('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');

        try
        {
            $Result = $Sender -> send($Mailer);
            $lib-> LogFile('Log Mail Result', '\Model\User\Register.SendMail', $Result);
        }
        catch (\Exception $Error)
        {
            $lib-> LogFile($Error -> getMessage(), '\Model\User\Register.SendMail', get_defined_vars());
            return false;
        }
        
    }

    public function DoReset($ResetCode, $NewPass)
    {
        if (strcmp($_SESSION['Token'], $ResetCode) == 0)
        {
            $sql = "UPDATE users SET Password = ? WHERE Email= ?";
            return $this->exec1($sql,$NewPass, $_SESSION['RequestUser']);
        } else return NULL;
    }

    function GetUserName($email){
        $sql = "SELECT Username FROM users WHERE Email=?";
        return $this->result1(1,$sql,$email)['Username'];
    }
   

    function user($idUser){
        $sql = "select * from users where id=?";
        return $this->result1(1,$sql,$idUser);
    }
    function setNewPass($id,$newpass){
        $sql = "UPDATE users SET pass='{$newpass}'  WHERE id=".$id;
        return $this->exec1($sql);  
    }
    function showNameUser($iduser){
        $sql = "select * from users where id='{$iduser}'";
        return $this->result1(1,$sql)['tenKH'];
    } 
    
    function setPass($email){
        $sql = "UPDATE users SET pass='123456'  WHERE email='{$email}'";
        return $this->exec1($sql);
    }
    function selectRanDomKey($userId){
        $sql = "SELECT randomkey FROM users WHERE Username=?";
        return $this->result1(1,$sql,$userId)['randomkey'];
    }
    function setThanhVien($id){
        $sql = "UPDATE users SET KichHoat='1' WHERE Username=?";
        return $this->exec1($sql,$id);  
    }
    function ChangePass($NewPass,$OldPass)
    {
        $sql ="SELECT Password FROM users WHERE idUser=?";
        $kq =  $this->result1(1,$sql,$_SESSION['sid'])['Password'];        
        if($kq === $OldPass){
            $sql = "UPDATE users SET Password=? WHERE idUser =?";
            return $this->exec1($sql,$NewPass,$_SESSION['sid']);
        }else{
            return NULL;
        }
    }
    function getInfoBill($keybill){
        $sql = "SELECT * FROM donhang WHERE keybill = ?";
        return $this->result1(1,$sql,$keybill);
    }
}
