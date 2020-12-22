<?php
class HomeModel{
    private $db;


    public function __construct(){
        $this->db = new Database;
    }

    public function getCarousel(){
        $this->db->query("SELECT * FROM carousel");
        $row = $this->db->resultSet();
        return $row;
    }

    public function getCategories(){
        $this->db->query("SELECT * FROM jenis_hasiltani");
        $row = $this->db->resultSet();
        return $row;
    }

    public function getProduct(){
        $this->db->query("SELECT * FROM hasil_tani LIMIT 10");
        $row = $this->db->resultSet();
        return $row;
    }

    public function searchProduct($keywords){
        $this->db->query("SELECT * FROM hasil_tani WHERE nama_hasil LIKE :keyword");
        $this->db->bind(':keyword',"%".$keywords."%");
        $row = $this->db->resultSet();
        return $row;
    }

    public function checkKadaluarsa(){
        $this->db->query("UPDATE hasil_tani SET status_hasilTani = 1 WHERE kadaluarsa_hasilTani < CURRENT_DATE");
        $this->db->execute();
    }
}