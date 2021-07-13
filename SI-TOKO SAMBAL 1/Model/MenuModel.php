<?php
/*Function ini berfungsi untuk menampilkan seluruh data pada
database*/
class MenuModel{
    public function get(){
        $sql = "SELECT * FROM admin";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[]=$data;
        }
        return $hasil;
    }
    
}


?>