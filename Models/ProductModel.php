<?php
class ProductModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getDetail($id){
        $this->db->query("SELECT * , user.username as nama,jenis_hasiltani.nama_jenis as jenis  FROM hasil_tani 
        INNER JOIN user ON hasil_tani.id_user = user.id_user  
        INNER JOIN status_hasiltani ON hasil_tani.status_hasilTani = status_hasiltani.id_status
        INNER JOIN jenis_hasiltani ON hasil_tani.jenis_hasilTani = jenis_hasiltani.id_jenis_ht
        WHERE id_hasilTani = :id ");
        $this->db->bind(":id",$id);
        if($res = $this->db->single()){
            return $res;
        }else{
            return false;
        }
    }   

}