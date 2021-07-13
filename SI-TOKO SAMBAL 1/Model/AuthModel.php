<?php

class AuthModel{
    /*Function ini digunakan untuk di database berdasarkan
    @param $email
    @param $password*/
    public function prosesAuthAdmin($email, $password){
        $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

 

   
}

?>