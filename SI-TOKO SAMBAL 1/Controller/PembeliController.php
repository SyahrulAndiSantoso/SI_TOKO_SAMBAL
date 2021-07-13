<?php

class PembeliController{
    private $model;
    /* Function ini adalah konstruktor yang berguna menginisialisasi objek pembelimodel*/
    public function __construct(){
        $this->model = new PembeliModel();
    }
    /* Function ini digunakan untuk mengatur tampilan awal pembeli */
    public function index(){
        $data = $this->model->get();
        extract($data);
        require_once("View/pembeli/index.php");

    }
    /* Function ini digunakan untuk mengatur halaman create pembeli */
    public function create(){
        require_once("View/pembeli/create.php");
    }
    /* Function ini digunakan untuk menambah pembeli */
    public function store(){
        $nama = $_POST['nama_pembeli'];
        $no = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        if($this->model->prosesStore($nama, $no, $alamat)){
            header("location:index.php?page=pembeli&aksi=view&pesan=Berhasil Menambah Data");
        }else{
            header("location:index.php?page=pembeli&aksi=create&pesan=Gagal Menambah Data");
        }
    }
    /* Function ini digunakan untuk menghapus pembeli */
    public function delete(){
        $id_pembeli = $_GET['id'];
        if($this->model->prosesDelete($id_pembeli)){
            header("location:index.php?page=pembeli&aksi=view&pesan=Berhasil Menghapus Data");
        }else{
            header("location:index.php?page=pembeli&aksi=view&pesan=Gagal Menghapus Data");
        }
    }

    /* Function ini digunakan untuk mengatur halaman edit / update pembeli */
    public function edit(){
        $id = $_GET['id'];
        $data =  $this->model->getById($id);
        extract($data);
        require_once("View/pembeli/edit.php");
    }
    /* Function ini digunakan untuk mengupdate pembeli */
    public function update(){
        $id = $_POST['id_pembeli'];
        $nama = $_POST['nama_pembeli'];
        $no = $_POST['no_telp'];
        $alamat = $_POST['alamat'];
        if($this->model->prosesUpdate($id, $nama, $no, $alamat)){
            header("location:index.php?page=pembeli&aksi=view&pesan=Berhasil Mengupdate Data");
        }else{
            header("location:index.php?page=pembeli&aksi=edit&pesan=Gagal Mengupdate Data");
        }

    }

    

    

    



}

?>