<?php
class Wilayah{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProvinsi(){
        $this->db->query("SELECT * FROM t_propinsi ORDER BY nama ASC");
        
        return $this->db->resultSet();
    }

    public function getKota($id)
    {
        $this->db->query("SELECT * FROM t_kota WHERE LEFT(id,2) = :id ORDER BY nama ASC");
        $this->db->bind(':id',$id);
        return $this->db->resultSet();
    }

    public function getKec($id)
    {
        $this->db->query("SELECT * FROM t_kecamatan WHERE LEFT(id,4) = :id ORDER BY nama ASC");
        $this->db->bind(':id',$id);
        return $this->db->resultSet();
    }
}