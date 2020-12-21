<?php
class AdminModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCarousel(){
        $this->db->query("SELECT * FROM carousel");
        $row = $this->db->resultSet();
        return $row;
    }

    public function deleteCarousel($id){
        $this->db->query("DELETE FROM carousel WHERE id = :id;");
        $this->db->bind(":id",$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getUsers(){
        $this->db->query("SELECT nama_depan,nama_belakang,username,alamat_email FROM user");
        $row = $this->db->resultSet();
        return $row;
    }

    public function addCarousel($data){
        $this->db->query("INSERT INTO carousel (title,path) VALUES (:title,:path);");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":path",$data['path']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addCategories($data)
    {
        $this->db->query("INSERT INTO jenis_hasiltani (nama_jenis,img) VALUES (:title,:path);");
        $this->db->bind(":title",$data['title']);
        $this->db->bind(":path",$data['path']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCategories()
    {
        $this->db->query("SELECT * FROM jenis_hasiltani");
        $row = $this->db->resultSet();
        return $row;
    }
}