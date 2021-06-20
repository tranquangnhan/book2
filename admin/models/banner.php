<?php

use Aws\Result;

class Model_banner extends Model_db{
    function listRecords(){
        $sql = "SELECT * FROM banner";
        return $this->result1(0,$sql);
    }

    function getOneRecord($id){
        $sql = "SELECT bannerImage as banner FROM banner WHERE id=?";
        return $this->result1(1,$sql,$id)['banner'];
    }
    
    function editImage($imgs,$id){
        $sql ="UPDATE banner SET bannerImage= ? WHERE id=?";
        return $this->exec1($sql,$imgs,$id);
    }
}

?>