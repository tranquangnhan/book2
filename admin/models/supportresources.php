<?php 
class Model_SpResources extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM supportresources order by ordinal asc";
        return $this->result1(0,$sql);
    }

    function listRecordsByClass($class) {
        $sql = "SELECT * FROM supportresources WHERE class = ? order by ordinal desc";
        return $this->result1(0, $sql, $class);
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
    
    function editSpResources($name, $img, $link, $id) {
        if ($img != '') {
            $sql = "UPDATE supportresources SET name = ?, img = ?, link = ? WHERE id = ?";
            return $this->exec1($sql, $name, $img, $link, $id);
        } else {
            $sql = "UPDATE supportresources SET name = ?, link = ? WHERE id = ?";
            return $this->exec1($sql, $name, $link, $id);
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

    function getAmountOrdinal() {
        $sql = "SELECT count(*) AS sodong FROM `about`";
        return $this->result1(1, $sql)['sodong'];
    }

    function getIdMoveByOrdinal($ordinal, $class) {
        $sql = "SELECT id as idmove FROM supportresources WHERE ordinal = ? AND class = ?";
        return $this->result1(1,$sql, $ordinal, $class)['idmove'];
    }

    function getIdMoveUpByOrdinal($ordinal, $class) {
        $sql = "SELECT id as idmove FROM supportresources WHERE ordinal > ? AND class = ? order by ordinal desc limit 1";
        return $this->result1(1,$sql, $ordinal, $class)['idmove'];
    }

    function getIdMoveDownByOrdinal($ordinal, $class) {
        $sql = "SELECT id as idmove FROM supportresources WHERE ordinal < ? AND class = ? order by ordinal desc limit 1";
        return $this->result1(1,$sql, $ordinal, $class)['idmove'];
    }

    function updateOrdinalAbout($ordinal, $id) {
        $sql = "UPDATE supportresources SET ordinal = ? WHERE id = ?";
        return $this->exec1($sql, $ordinal, $id); 
    }

    function getSpresourceByClass($class) {
        $sql = "SELECT * FROM `supportresources` WHERE class = ?";
        return $this->result1(0, $sql, $class);
    }
}

?>