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
        $this->db->query("SELECT * FROM hasil_tani");
        $row = $this->db->resultSet();
        return $row;
    }

}