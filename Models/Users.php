<?php
class Users{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function profile(){
        $this->db->query('SELECT user.*, tp.nama AS p_nama,tk.nama AS k_nama,tkc.nama AS kc_nama FROM user INNER JOIN t_propinsi tp ON user.id_provinsi = tp.id INNER JOIN t_kota tk ON user.id_kota = tk.id INNER JOIN t_kecamatan tkc ON user.id_kecamatan = tkc.id WHERE id_user = :id ' );
        $this->db->bind(':id',$_SESSION['user_id']);
  
        try {
            $row = $this->db->singleArr();
            return $row;
        } catch (\Throwable $th) {
           echo $th->getMessage();
        }
    
    }
    public function deleteUser(){
        $this->db->query('DELETE FROM user WHERE id_user = :id');
        $this->db->bind(':id',$_SESSION['user_id']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function editNama($data){
        $this->db->query('UPDATE user SET nama_depan = :nama_depan , nama_belakang = :nama_belakang WHERE id_user = :id');
        $this->db->bind(':id',$_SESSION['user_id']);
        $this->db->bind(':nama_depan',$data['nama_depan']);
        $this->db->bind(':nama_belakang',$data['nama_belakang']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO user (username,password_user,nama_depan,nama_belakang,alamat_email,status,nomor_hp,jalan,id_provinsi,id_kota,id_kecamatan) 
                                VALUES(:username, :password, :nama_depan, :nama_belakang, :email, :status, :no_telp, :jalan, :provinsi, :kota, :kecamatan)');

        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':nama_depan',$data['nama_depan']);
        $this->db->bind(':nama_belakang',$data['nama_belakang']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':status',$data['status']);
        $this->db->bind(':no_telp',$data['notelp']);
        $this->db->bind(':jalan',$data['jalan']);
        $this->db->bind(':provinsi',$data['provinsi']);
        $this->db->bind(':kota',$data['kota']);
        $this->db->bind(':kecamatan',$data['kecamatan']);

        try {
            $this->db->execute();
            return true;
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getJenis(){
        $this->db->query('SELECT id_jenis_ht AS id, nama_jenis FROM jenis_hasiltani;');
        return $this->db->resultSet();
    }

    public function addProduct($data){
        $this->db->query('INSERT INTO hasil_tani (nama_hasil,jenis_hasilTani,kadaluarsa_hasilTani,deskripsi,harga,image,status_hasilTani,id_user) 
                        VALUES(:nama_hasil,:jenis_hasilTani,:kadaluarsa_hasilTani,:deskripsi,:harga,:image,:status_hasilTani,:id_user)');
        $this->db->bind(':nama_hasil',$data['nama_barang']);
        $this->db->bind(':jenis_hasilTani',$data['jenis_barang']);
        $this->db->bind(':kadaluarsa_hasilTani',$data['kadaluarsa']);
        $this->db->bind(':deskripsi',$data['deskripsi_barang']);
        $this->db->bind(':harga',(int)$data['harga']);
        $this->db->bind(':image',$data['img']);
        $this->db->bind(':status_hasilTani',2);
        $this->db->bind(':id_user',$data['id_user']);
        try {
            $this->db->execute();
            return true;
        }catch(Exception $e){
            throw $e;
        }

    }

    public function login($data){
        $this->db->query('SELECT * FROM user WHERE username = :username AND password_user = :password');

        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);

        

        if($row = $this->db->single()){
            return $row;
        }else{
            return false;
        }

    }
}