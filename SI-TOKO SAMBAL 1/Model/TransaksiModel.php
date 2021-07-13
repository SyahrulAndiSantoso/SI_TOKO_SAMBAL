<?php

class TransaksiModel{

    public function get(){
        $sql = "SELECT pembeli.nama_pembeli AS nama, transaksi.status_transaksi AS status_transaksi, transaksi.tgl_transaksi AS tgl, transaksi.kode_transaksi AS kode, COALESCE(SUM(detail_transaksi.jumlah_produk*produk.harga),0) AS total_harga,
        transaksi.status_transaksi AS status FROM transaksi LEFT JOIN detail_transaksi ON transaksi.kode_transaksi = detail_transaksi.kode_transaksi
        LEFT JOIN produk ON detail_transaksi.id_produk = produk.id_produk
        LEFT JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli GROUP BY transaksi.kode_transaksi";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getPembeli(){
        $sql = "SELECT * FROM pembeli WHERE status_pembeli = 0";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    
    public function getdetail_produk($kode){
        $sql = "SELECT detail_transaksi.kode_transaksi AS kode_transaksi,  
        produk.nama_produk AS nama_produk, produk.level_pedas AS level, produk.id_produk AS id_produk, produk.berat_produk AS berat, detail_transaksi.jumlah_produk AS jumlah_produk, COALESCE(detail_transaksi.jumlah_produk*produk.harga,0) AS jumlah_harga FROM detail_transaksi
        JOIN transaksi ON detail_transaksi.kode_transaksi = transaksi.kode_transaksi
        JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli
        JOIN produk ON detail_transaksi.id_produk = produk.id_produk
        WHERE detail_transaksi.kode_transaksi = $kode";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getdetail_pembeli($kode){
        $sql = "SELECT detail_transaksi.kode_transaksi AS kode_transaksi, pembeli.alamat AS alamat, pembeli.nama_pembeli AS nama, pembeli.no_telp AS no, 
        transaksi.tgl_transaksi AS tgl, COALESCE(SUM(detail_transaksi.jumlah_produk*produk.harga),0) AS total_harga FROM detail_transaksi
        JOIN transaksi ON detail_transaksi.kode_transaksi = transaksi.kode_transaksi
        JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli
        JOIN produk ON detail_transaksi.id_produk = produk.id_produk
        WHERE detail_transaksi.kode_transaksi = $kode";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();

    }

    

   

    public function prosesstoretransaksi($id_admin, $id_pembeli, $tgl_transaksi, $status_transaksi){
        $sql = "INSERT INTO transaksi(id_admin,id_pembeli,tgl_transaksi,status_transaksi) VALUES($id_admin,$id_pembeli, '$tgl_transaksi', $status_transaksi)";
        return koneksi()->query($sql);
    }

    public function getlasdata(){
        $sql = "SELECT transaksi.kode_transaksi as kode, pembeli.nama_pembeli as nama from transaksi
        JOIN pembeli ON transaksi.id_pembeli = pembeli.id_pembeli 
        ORDER BY kode_transaksi DESC LIMIT 1";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    

    public function getstok1($id_produk,$jumlah_produk){
        $sql = "SELECT SUM(stok - $jumlah_produk) AS stok FROM produk
        WHERE id_produk = $id_produk";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getstok2($id_produk,$jumlah_produk){
        $sql = "SELECT SUM(stok + $jumlah_produk) AS stok FROM produk
        WHERE id_produk = $id_produk";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getstok3($jumlahproduk_baru,$jumlahproduk_lama,$id_produk){
        $sql = "SELECT SUM(stok - ($jumlahproduk_baru - $jumlahproduk_lama)) AS stok
        FROM produk  WHERE id_produk = $id_produk";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getstok4($jumlahproduk_baru,$jumlahproduk_lama,$id_produk){
        $sql = "SELECT SUM(stok + ($jumlahproduk_lama - $jumlahproduk_baru)) AS stok
        FROM produk  WHERE id_produk = $id_produk";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc(); 
    }

    public function getproduk(){
        $sql = "SELECT produk.id_produk, produk.nama_produk,produk.stok, produk.berat_produk, produk.level_pedas
        from produk WHERE produk.stok !=0";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
   
   

    public function prosesstoredetailtransaksi($kode_transaksi,$id_produk,$jumlah_produk){
        $sql = "INSERT INTO detail_transaksi(kode_transaksi,id_produk,jumlah_produk) VALUES($kode_transaksi, $id_produk, $jumlah_produk)";
        return  koneksi()->query($sql);
    }


    public function updatestok($id_produk,$stok){
        $sql = "UPDATE produk SET stok = $stok WHERE id_produk = $id_produk";
        return koneksi()->query($sql);
    }

   

    public function prosesstorecheckout($nama){
        $sql = "UPDATE pembeli SET status_pembeli = 1
        WHERE nama_pembeli = '$nama'";
        return koneksi()->query($sql);
    }

    public function prosesstorecheckout1($kode){
        $sql = "UPDATE transaksi SET status_transaksi = 1
        WHERE kode_transaksi = $kode";
        return koneksi()->query($sql);
    }

  

   

    

    public function prosesdelete($id,$kode,$jumlah){
        $sql = "DELETE FROM detail_transaksi WHERE kode_transaksi = $kode AND id_produk = $id AND jumlah_produk = $jumlah";
        return koneksi()->query($sql);
    }

    

    public function getByKode($kode,$id,$jumlah){
        $sql = "SELECT detail_transaksi.kode_transaksi AS kode_transaksi, produk.nama_produk AS nama_produk, produk.stok AS stok, produk.berat_produk AS berat_produk, produk.level_pedas AS level_pedas, 
        produk.id_produk AS id_produk, detail_transaksi.jumlah_produk AS jumlah_produk FROM detail_transaksi 
        JOIN transaksi ON detail_transaksi.kode_transaksi = transaksi.kode_transaksi 
        JOIN produk ON detail_transaksi.id_produk = produk.id_produk
        WHERE detail_transaksi.kode_transaksi = $kode AND produk.id_produk = $id AND detail_transaksi.jumlah_produk = $jumlah";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

   

    public function prosesupdate($jumlahproduk_lama,$jumlahproduk_baru,$id_produk_baru,$id_produk_lama,$kode_transaksi){
        $sql = "UPDATE detail_transaksi SET jumlah_produk = $jumlahproduk_baru, id_produk = $id_produk_baru
        WHERE kode_transaksi = $kode_transaksi AND jumlah_produk = $jumlahproduk_lama AND id_produk = $id_produk_lama";
         return koneksi()->query($sql);
         
    }

 



   
   
}


?>