<?php

class ProdukModel{

   

  
   

    public function get(){
        $sql = "SELECT * FROM produk";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

   
    public function getByid($id){
        $sql = "SELECT * FROM produk WHERE id_produk = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
  

    public function prosesUpdate($id, $level, $berat, $harga, $nama_produk, $stok){
        $sql = "UPDATE produk SET level_pedas = '$level', berat_produk = '$berat', harga = $harga, nama_produk = '$nama_produk', stok = $stok WHERE id_produk = $id";
        return koneksi()->query($sql);
    }

  

    public function prosesStore($level, $berat, $harga, $nama_produk, $stok){
        $sql = "INSERT INTO produk(level_pedas, berat_produk, harga, nama_produk, stok) VALUES('$level', '$berat', 
        $harga,'$nama_produk', $stok)";
        return koneksi()->query($sql);
    }
    
    

    public function prosesDelete($id){
        $sql = "DELETE FROM produk WHERE id_produk = $id";
        return koneksi()->query($sql);
    }

   

}




?>