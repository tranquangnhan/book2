<?php 
class Model_about extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM about order by id desc";
        return $this->result1(0,$sql);
    }
   
    public function addNewAbout($name, $slug, $content, $link)
    {
        $sql = "INSERT INTO about(name, slug, content, link) VALUE (?,?,?,?)";
        return $this->SqlExecDebug($sql, $name, $slug, $content, $link);
    }

    function deleteAbout($id)
    {   
        $sql = "DELETE FROM about WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    
    function editAbouts($name, $slug, $content, $link, $id) {
        $sql = "UPDATE about SET name = ?, slug = ?, content = ?, link = ? WHERE id = ?";
        return $this->exec1($sql, $name, $slug, $content, $link, $id);
    }
    
    function getDetailAbout($id){
        $sql = "SELECT * FROM about WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
  
    function getLastestIdAbout(){
        $sql = "SELECT id as lastid FROM about ORDER BY id DESC LIMIT 1";
        return $this->result1(1,$sql)['lastid'];
    }
}

?>