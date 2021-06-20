<?php

class Model_login extends Model_db{

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
    function checkEmailTonTai($email){
        $sql = "select * from user where email=?";
        return $this->result1(1,$sql,$email);
    }

}