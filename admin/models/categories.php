<?php
class Model_categories extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM category";
        return $this->result1(0,$sql);
    }
    function listRecordsdoc() 
    {
        $sql = "SELECT * FROM catalog where style=1 and parent !=0 order by parent";
        return $this->result1(0,$sql);
    }
    function addNewCate($name, $slug)
    {
        $sql = "INSERT INTO category(name, slug) VALUE(?, ?)";
        return $this->exec1($sql, $name, $slug);
    }
    function deleteCate($id)
    {   
        $sql = "DELETE FROM category WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    function editCategory($name, $slug, $id){
        $sql = "UPDATE category SET name = ?, slug = ? WHERE id = ?";
        return $this->SqlExecDebug($sql, $name, $slug, $id);
    }
    function showChildrenCategori(){
        $sql = "SELECT * FROM catalog ";
        return $this->result1(0,$sql);
    }
    function getParentOfPro() 
    {
        $sql = "SELECT * FROM catalog where parent=2 ";
        return $this->result1(0,$sql);
    }
    function showOneProducer($id)
    {
        $sql = "SELECT * FROM category WHERE id=?";
        return $this->result1(1, $sql, $id);
    }
    function getCateBrand1(){
        $sql = "SELECT id,name FROM catalog where parent BETWEEN 129 and 130 and style=1 order by parent";
        return $this->result1(0,$sql);
    }
    function getCateBrand2($id){
        $sql = "SELECT * FROM catalog where parent=? and style=1 ";
        return $this->result1(0,$sql,$id);
    }

    function getCategoryNameById($id) {
        $sql = "SELECT name FROM `category` WHERE id = ?";
        return $this->result1(1, $sql, $id)['name'];
    }

 
}

?>