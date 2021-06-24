<?php 
class Model_about extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM about order by ordinal desc";
        return $this->result1(0,$sql);
    }
   
    public function addNewAbout($name, $slug, $content, $link, $ordinal)
    {
        $sql = "INSERT INTO about(name, slug, content, link, ordinal) VALUE (?,?,?,?,?)";
        return $this->SqlExecDebug($sql, $name, $slug, $content, $link, $ordinal);
    }

    function deleteAbout($id)
    {   
        $sql = "DELETE FROM about WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    
    function editAbouts($name, $slug, $content, $link, $ordinal, $id) {
        $sql = "UPDATE about SET name = ?, slug = ?, content = ?, link = ?, ordinal = ? WHERE id = ?";
        return $this->exec1($sql, $name, $slug, $content, $link, $ordinal, $id);
    }
    
    function getDetailAbout($id){
        $sql = "SELECT * FROM about WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
  
    function getLastestIdAbout(){
        $sql = "SELECT id as lastid FROM about ORDER BY id DESC LIMIT 1";
        return $this->result1(1,$sql)['lastid'];
    }

    function getIdMoveByOrdinal($ordinal) {
        $sql = "SELECT id as idmove FROM about WHERE ordinal = ?";
        return $this->result1(1,$sql, $ordinal)['idmove'];
    }

    function getAmountAboutShowing() {
        $sql = "SELECT count(*) AS sodong FROM `about`";
        return $this->result1(1, $sql)['sodong'];
    }

    function updateOrdinalAbout($ordinal, $id) {
        $sql = "UPDATE about SET ordinal = ? WHERE id = ?";
        return $this->exec1($sql, $ordinal, $id); 
    }
}

?>