<?php

class TransaksiController{
    private $model;
    /* Function ini adalah konstruktor yang berguna menginisialisasi objek transaksimodel*/
    public function __construct(){
        $this->model = new TransaksiModel();

    }    
    /* Function ini digunakan untuk mengatur tampilan awal transaksi */
    public function index(){
        $pembeli = $this->model->getPembeli();
        $data = $this->model->get();
        extract($data);
        require_once("View/transaksi/index.php"); 
    }
    /*Functino ini digunakan untuk mengatur tampilan struk transaksi*/
    public function struk(){
        $kode = $_GET['kode'];
        $detail_pembelian = $this->model->getdetail_produk($kode);
        $data = $this->model->getdetail_pembeli($kode);
        extract($detail_pembelian);
        extract($data);
        require_once("View/transaksi/struk.php");

    }
    /*Function ini digunakan untuk mengatur tampilan detail transaksi*/
    public function detail(){
        $kode = $_GET['kode'];
        $detail_pembelian = $this->model->getdetail_produk($kode);
        $data = $this->model->getdetail_pembeli($kode);
        extract($detail_pembelian);
        extract($data);
        require_once("View/transaksi/detail.php"); 
    }
    /*Function ini digunakan untuk menambah transaksi pembeli*/
    public function storeTransaksi(){
        $idpembeli = $_POST['nama_pembeli'];
        $tgl_transaksi = date('Y-m-d');
        
        if($this->model->prosesstoretransaksi(1,$idpembeli,$tgl_transaksi,0)){
           
            header("location: index.php?page=transaksi&aksi=create&pesan=Berhasil menambah data");
        }else{
            header("location: index.php?page=transaksi&aksi=view&pesan=Gagal menambah data");
        }

    }
    /*Function ini digunakan untuk mengatur tampilan create transaksi*/
    public function create(){
        $produk = $this->model->getproduk();
        $getlastdata = $this->model->getlasdata();
        $pembeli = $this->model->getdetail_pembeli($getlastdata['kode']);
        $data = $this->model->getdetail_produk($getlastdata['kode']);
        extract($produk);
        extract($data);
        extract($pembeli);
        require_once("View/transaksi/create.php"); 
    }
    /*Function ini digunakan untuk menambah detail transaksi*/
    public function storeDetailTransaksi(){
        $kode = $this->model->getlasdata();
        $id_produk = $_POST['nama_produk'];
        $jumlah_produk = $_POST['jumlah_produk'];
        $stok = $this->model->getstok1($id_produk,$jumlah_produk);
        if($stok['stok']<0){
            $stok['stok'] = null;
        }

        if($this->model->updatestok($id_produk,$stok['stok'])&&$this->model->prosesstoredetailtransaksi($kode['kode'], $id_produk,$jumlah_produk)){
            header("location: index.php?page=transaksi&aksi=create&pesan=Berhasil menambah data");
        }else{
            header("location: index.php?page=transaksi&aksi=create&pesan=Gagal menambah data");
        }

    }
    /*Function ini digunakan untuk melakukan checkout transaksi*/
    public function storecheckout(){
        $data = $this->model->getlasdata();
        if($this->model->prosesstorecheckout($data['nama'])){
            header("location: index.php?page=transaksi&aksi=checkout&pesan=Berhasil Checkout");
        }else{
            header("location: index.php?page=transaksi&aksi=create&pesan=Gagal Checkout");
        }
        
    }
    /*Functino ini digunakan untuk mengatur halaman checkout*/
    public function checkout(){
        $kode = $this->model->getlasdata();
        $pembeli = $this->model->getdetail_pembeli($kode['kode']);
        $data = $this->model->getdetail_produk($kode['kode']);
        extract($pembeli);
        extract($data);
        require_once("View/transaksi/checkout.php");
    }
    /*Function ini digunakan untuk menghapus detail transaksi*/
    public function delete(){
        $id_produk = $_GET['id'];
        $kode_transaksi = $_GET['kode'];
        $jumlah_produk = $_GET['jumlah_produk'];
        $stok = $this->model->getstok2($id_produk,$jumlah_produk);
        if($this->model->prosesdelete($id_produk,$kode_transaksi,$jumlah_produk)&&$this->model->updatestok($id_produk,$stok['stok'])){
            header("location: index.php?page=transaksi&aksi=create&pesan=Berhasil Menghapus Data");
        }else{
            header("location: index.php?page=transaksi&aksi=create&pesan=Gagal Menghapus Data");
        }
    }
    /*Functino ini digunakan untuk mengatur halaman edit / update detail transaksi*/
    public function edit(){
        $id_produk = $_GET['id'];
        $kode_transaksi = $_GET['kode'];
        $jumlah_produk = $_GET['jumlah_produk'];
        $produk = $this->model->getproduk();
        $data1 = $this->model->getByKode($kode_transaksi,$id_produk,$jumlah_produk);
        extract($produk);
        extract($data1);
        require_once("View/transaksi/edit.php");

    }
    /*Function ini digunakan untuk mengupdate detail transaksi*/
    public function update(){
        $jumlahproduk_lama = $_POST['jumlah_produklama'];
        $jumlahproduk_baru = $_POST['jumlah_produkbaru'];
        $kode_transaksi = $_POST['kode_transaksi'];
        $id_produk_lama = $_POST['id_produk'];
        $id_produk_baru = $_POST['nama_produk'];
        if($id_produk_baru == $id_produk_lama){
            if($jumlahproduk_baru>$jumlahproduk_lama){
                $stok = $this->model->getstok3($jumlahproduk_baru,$jumlahproduk_lama,$id_produk_lama);
                $this->model->updatestok($id_produk_lama,$stok['stok']);
                $updatedetail_transaksi = $this->model->prosesupdate($jumlahproduk_lama,$jumlahproduk_baru, $id_produk_baru, $id_produk_lama,$kode_transaksi);
            }else{
                $stok = $this->model->getstok4($jumlahproduk_baru,$jumlahproduk_lama,$id_produk_lama);
                $this->model->updatestok($id_produk_lama,$stok['stok']);
                $updatedetail_transaksi = $this->model->prosesupdate($jumlahproduk_lama,$jumlahproduk_baru, $id_produk_baru, $id_produk_lama,$kode_transaksi);
            }
        }else{
            $stok = $this->model->getstok2($id_produk_lama,$jumlahproduk_lama);
            $this->model->updatestok($id_produk_lama,$stok['stok']);
            $stok1 = $this->model->getstok1($id_produk_baru,$jumlahproduk_baru);
            $this->model->updatestok($id_produk_baru,$stok1['stok']);
            $updatedetail_transaksi = $this->model->prosesupdate($jumlahproduk_lama,$jumlahproduk_baru, $id_produk_baru, $id_produk_lama,$kode_transaksi);
        }

        if($updatedetail_transaksi){
            header("location: index.php?page=transaksi&aksi=create&pesan=Berhasil Mengupdate Data");
        }else{
            header("location: index.php?page=transaksi&aksi=create&pesan=Gagal Mengupdate Data");
        }
    }
    /*Function ini digunakan untuk melakukan checkout Final Checkout*/
    public function storecheckout1(){
        $data = $this->model->getlasdata();
        $total = $_POST['total_harga'];
        $tunai = $_POST['tunai'];
        if($tunai>=$total){
            if( $this->model->prosesstorecheckout1($data['kode'])){
                header("location: index.php?page=transaksi&aksi=view&pesan=Berhasil Transaksi");
            }
        }else{
                header("location: index.php?page=transaksi&aksi=checkout&pesan=Gagal");
        }


    }



}



?>