<?php 
class Model_blogs extends Model_db{
    function listRecords() 
    {
        $sql = "SELECT * FROM news order by id";
        return $this->result1(0,$sql);
    }
   
    public function addNewBlog($name, $slug, $imgs, $date, $description, $content, $source, $iddm)
    {
        $sql = "INSERT INTO news(name, slug, img, date, description, content, source, iddm) VALUE(?,?,?,?,?,?,?,?)";
        return $this->SqlExecDebug($sql,$name, $slug, $imgs, $date, $description, $content, $source, $iddm);
    }

    function deleteBlog($id)
    {   
        $sql = "DELETE FROM news WHERE id = ?";
        return $this->exec1($sql,$id);
    }
    
    function editBlogs($name, $slug, $imgs, $date, $description, $content, $source, $iddm, $id){
        if($imgs == "")
        {
            $sql = "UPDATE news SET name = ?, slug = ?, date = ?, description = ?, content = ?, source = ?, iddm = ? WHERE id=?";
            return $this->exec1($sql,$name, $slug, $date, $description, $content, $source, $iddm, $id);
        }else
        {
            $sql = "UPDATE news SET name = ?, slug = ?, img= ?, date = ?, description = ?, content = ?, source = ?, iddm = ? WHERE id=?";
            return $this->exec1($sql, $name, $slug, $imgs, $date, $description, $content, $source, $iddm, $id);
        }
    }
    
    function getDetailblog($id){
        $sql = "SELECT * FROM news WHERE id = ?";
        return $this->result1(1,$sql,$id);
    }
  
    function getAllBlogCate(){
        $sql = "SELECT * FROM categoriesnews ";
        return $this->result1(0,$sql);
    }



}


?>