<?php
class AuthController{
    private $model;
    /* Function ini adalah konstruktor yang berguna menginisialisasi objek authmodel*/
    public function __construct(){
        $this->model = new AuthModel();
    }
    /* Function ini berfungsi untuk authentication admin */
    public function authAdmin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($this->model->prosesAuthAdmin($email, $password)){
            header("location:index.php?page=pembeli&aksi=view&pesan=Berhasil Login");
        }else{
            header("location:index.php?page=auth&aksi=view&pesan=Gagal Login");
        }
    }
     /*Function logout untuk destroy session login sebelumnya*/ 
    public function logout(){
        session_destroy();
        header("location:index.php?page=auth&aksi=view&pesan=Berhasil Logout");
    }
}

?>