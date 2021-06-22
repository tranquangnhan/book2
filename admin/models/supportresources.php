<?php 
class Model_SpResources extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM supportresources order by id desc";
        return $this->result1(0,$sql);
    }
   
    public function addNewSpResources($name, $class, $img, $link)
    {
        $sql = "INSERT INTO supportresources(name, class, img, link) VALUE (?,?,?,?)";
        return $this->SqlExecDebug($sql, $name, $class, $img, $link);
    }

    function deleteSpResources($id)
    {   
        $sql = "DELETE FROM supportresources WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    
    function editSpResources($name, $class, $img, $link, $id) {
        if ($img != '') {
            $sql = "UPDATE supportresources SET name = ?, class = ?, img = ?, link = ? WHERE id = ?";
            return $this->exec1($sql, $name, $class, $img, $link, $id);
        } else {
            $sql = "UPDATE supportresources SET name = ?, class = ?, link = ? WHERE id = ?";
            return $this->exec1($sql, $name, $class, $link, $id);
        }
        
    }
    
    function getDetailSpResources($id){
        $sql = "SELECT * FROM supportresources WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
  
    function getLastestIdSpResources(){
        $sql = "SELECT id as lastid FROM supportresources ORDER BY id DESC LIMIT 1";
        return $this->result1(1,$sql)['lastid'];
    }
}

?>