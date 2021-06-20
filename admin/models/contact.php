<?php
 class Model_contact extends Model_db{
    function getInforContact()
    {
        $sql = "SELECT * FROM contact ORDER BY id DESC";
        return $this->result1(0,$sql);
    }
}