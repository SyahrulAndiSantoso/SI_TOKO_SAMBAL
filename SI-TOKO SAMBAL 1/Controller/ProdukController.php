<?php

class ProdukController{
    private $model;
     /* Function ini adalah konstruktor yang berguna menginisialisasi objek produkmodel*/
    public function __construct(){
        $this->model = new ProdukModel();

    }
    /* Function ini digunakan untuk mengatur halaman create produk */
    public function create(){
        require_once("View/produk/create.php");
    }
    /* Function ini digunakan untuk mengatur tampilan awal produk */
    public function index(){
        $data = $this->model->get();
        extract($data);
        require_once("View/produk/index.php");
    }
    /*Function ini digunakan untuk mengatur tampilan edit / update produk*/
    public function edit(){
        $id = $_GET['id'];
        $data = $this->model->getByid($id);
        extract($data);
        require_once("View/produk/edit.php");
    }
    /*Function ini digunakan untuk mengupdate produk*/
    public function update(){
        $id = $_POST['id_produk'];
        $level = $_POST['level_pedas'];
        $berat = $_POST['berat_produk'];
        $harga = $_POST['harga'];
        $nama_produk = $_POST['nama_produk'];
        $stok = $_POST['stok'];
        if($this->model->prosesUpdate($id,$level,$berat,$harga,$nama_produk,$stok)){
          header("location: index.php?page=produk&aksi=view&pesan=Berhasil Update Data");
        }else{
          header("location: index.php?page=produk&aksi=edit&pesan=Gagal Update Data&id=$id&data=$stok");
        }
      }
      /*Function ini digunakan untuk menambah produk*/
      public function store(){
        $level = $_POST['level_pedas'];
        $berat = $_POST['berat_produk'];
        $harga = $_POST['harga'];
        $nama_produk = $_POST['nama_produk'];
        $stok = $_POST['stok'];
        if($this->model->prosesStore($level,$berat,$harga,$nama_produk,$stok)){
            header("location: index.php?page=produk&aksi=view&pesan=Berhasil Menambah Data");
        }else{
            header("location: index.php?page=produk&aksi=create&pesan=Gagal Menambah Data");
        }
    }
    /*Function ini digunakan untuk menghapus produk*/
    public function delete(){
        $id = $_GET['id'];
        if($this->model->prosesDelete($id)){
            header("location: index.php?page=produk&aksi=view&pesan=Berhasil Menghapus Data");
        }else{
            header("location: index.php?page=produk&aksi=view&pesan=Gagal Menghapus Data");
        }
    }

}



?>