<?php

class PembeliModel{
    /*Function ini digunakan untuk menampilkan seluruh data pembeli
    pada database*/
    public function get(){
        $sql = "SELECT * FROM pembeli";
        $query = koneksi()->query($sql);
        $hasil = [];
        
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

  
    /*Function ini digunakan untuk menambah pembeli pada database
    @param $nama string berisi nama
    @param $No int berisi nomer
    @param $alamat string berisi alamat*/
    public function prosesStore($nama, $no, $alamat){
        $sql = "INSERT INTO pembeli(nama_pembeli, no_telp, alamat) VALUES('$nama', '$no', '$alamat')";
        return koneksi()->query($sql);

    }

    /*Function ini digunakan untuk menghapus pembeli pada database
    berdasarkan @param $id*/
    public function prosesDelete($id){
        $sql = "DELETE FROM pembeli WHERE id_pembeli = $id";
        return koneksi()->query($sql);
  }
   
  /*Function ini digunakan untuk menampilkan seluruh data, berdasarkan
  @param $id*/
    public function getById($id){
        $sql = "SELECT * FROM pembeli WHERE id_pembeli = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /*Function ini digunakan untuk mengupdate pembeli berdasarkan @param $id,
    data terupdate @param $nama, @param no_telp, @param $alamat*/
    public function prosesUpdate($id, $nama, $no_telp, $alamat){
        $sql = "UPDATE pembeli SET nama_pembeli = '$nama', no_telp = '$no_telp', alamat= '$alamat' WHERE id_pembeli = $id";
        return koneksi()->query($sql);
    }

   
}


?>