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

    public function getCartCount($id){
        $this->db->query("SELECT COUNT(id_user) as jumlah FROM keranjang WHERE id_user = :id");
        $this->db->bind(":id",$id);
        if($row = $this->db->single()){
            return $row;
        }else{
            return false;
        }
    }
    
    public function checkDuplicate($data){
        $this->db->query("SELECT id_keranjang,banyak, (SELECT COUNT(id_keranjang) FROM keranjang WHERE id_user = :id_user2 AND id_hasiltani = :id_barang2) AS jumlah From keranjang WHERE id_user = :id_user AND id_hasiltani = :id_hasil");
        $this->db->bind(":id_user",$data['user_id']);
        $this->db->bind(":id_hasil",$data['id_barang']);
        $this->db->bind(":id_user2",$data['user_id']);
        $this->db->bind(":id_barang2",$data['id_barang']);
        $row = $this->db->single();
        if($row->jumlah > 0){
            return $row;
        }else{
            return false;
        }
    }

    public function updateCart($data){
        $this->db->query("UPDATE keranjang SET banyak = banyak + :jumlah WHERE id_keranjang = :id ");
        $this->db->bind(":jumlah",1);
        $this->db->bind(":id",(int)$data['id_keranjang']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCart($data){
        $this->db->query("SELECT keranjang.* , hs.id_user as id_penjual , hs.*, us.username as username_penjual FROM keranjang INNER JOIN hasil_tani AS hs ON keranjang.id_hasiltani = hs.id_hasilTani INNER JOIN user AS us ON hs.id_user = us.id_user WHERE keranjang.id_user = :id ");
        $this->db->bind(':id',$data);
        if($row = $this->db->resultSet()){
            return $row;
        }else{
            return false;
        }
    }

    public function userProduct($data){
        $this->db->query("SELECT * FROM hasil_tani WHERE hasil_tani.id_user = :id");
        $this->db->bind(':id',$data);
        if($row = $this->db->resultSet()){
            return $row;
        }else{
            return false;
        }
    }

    public function userPesanan($data){
        $this->db->query("SELECT * FROM detail_transaksi INNER JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi INNER JOIN hasil_tani ON detail_transaksi.id_barang = hasil_tani.id_hasilTani WHERE detail_transaksi.id_pembeli = :id");
        $this->db->bind(':id',$data);
        if($row = $this->db->resultSet()){
            return $row;
        }else{
            return false;
        }
    }
    public function checkOut($id)
    {
        $this->db->query("SELECT keranjang.* , hs.id_user as id_penjual , hs.*, us.username as username_penjual FROM keranjang INNER JOIN hasil_tani AS hs ON keranjang.id_hasiltani = hs.id_hasilTani INNER JOIN user AS us ON hs.id_user = us.id_user WHERE keranjang.id_user = :id ");
        $this->db->bind(":id",$id);
        if($res = $this->db->resultSet()){
            $this->db->query("INSERT INTO transaksi (id_transaksi) value (:id)");
            $this->db->bind(":id",NULL);
            if($this->db->execute()){
                $this->db->query("SELECT LAST_INSERT_ID() as ID");
                $last = $this->db->single();
                foreach($res as $val){
                    $this->db->query("INSERT INTO detail_transaksi(id_transaksi,harga,id_barang,id_pembeli,id_penjual,status) VALUES(:id_transaksi,:harga,:id_barang,:id_pembeli,:id_penjual,:status)");
                    $this->db->bind(":id_transaksi",$last->ID);
                    $this->db->bind(":harga",$val->harga);
                    $this->db->bind(":id_barang",$val->id_hasilTani);
                    $this->db->bind(":id_pembeli" ,$id);
                    $this->db->bind(":id_penjual",$val->id_penjual);
                    $this->db->bind(":status",0);
                    $this->db->execute();
                    $this->db->query("DELETE FROM keranjang WHERE id_keranjang = :id");
                    $this->db->bind(":id",$val->id_keranjang);
                    $this->db->execute();
                }
            }
        }
    }

    public function removeCart($id){
        $this->db->query("DELETE FROM keranjang WHERE id_keranjang = :id");
        $this->db->bind(":id",$id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addCart($data){
        $this->db->query('INSERT INTO keranjang (id_user,id_hasiltani,banyak) VALUES (:id_user,:id_hasiltani,:banyak)');
        $this->db->bind(":id_user",$data['user_id']);
        $this->db->bind('id_hasiltani',$data['id_barang']);
        $this->db->bind('banyak',1);
        if($this->db->execute()){
            return true;
        }else{
            return false;
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