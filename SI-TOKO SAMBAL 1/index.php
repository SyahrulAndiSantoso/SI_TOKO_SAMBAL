<?php 

require_once("koneksi.php");

require_once("Model/AuthModel.php");
require_once("Model/PembeliModel.php");
require_once("Model/ProdukModel.php");
require_once("Model/TransaksiModel.php");
require_once("Model/MenuModel.php");

require_once("Controller/AuthController.php");
require_once("Controller/MenuController.php");
require_once("Controller/ProdukController.php");
require_once("Controller/PembeliController.php");
require_once("Controller/TransaksiController.php");

if(isset($_GET['page']) && isset($_GET['aksi'])){

    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page
    $menu = new MenuController();

    if($page == "auth"){
        $auth = new AuthController();
        if($aksi == 'authAdmin'){
            $auth->authAdmin();
        }else if($aksi == 'logout'){
            $auth->logout();
        }else if($aksi == 'view'){
            require_once("View/auth/index.php");
        }else{
            echo "Method Not Found";
        }
    }else if($page == 'pembeli'){
        $menu->index();
        $pembeli = new PembeliController();
        if($aksi == 'view'){
            $pembeli->index();
        }else if($aksi == 'create'){
            $pembeli->create();
        }else if($aksi == 'edit'){
            $pembeli->edit();
        }else if($aksi == 'update'){
            $pembeli->update();
        }else if($aksi == 'delete'){
            $pembeli->delete();
        }else if($aksi == 'store'){
            $pembeli->store();
        }
        else{
            echo "Method Not Found";
        }
    }else if($page == 'produk'){
        $menu->index();
        $produk = new ProdukController();
        if($aksi == 'view'){
            $produk->index();
        }else if($aksi == 'create'){
            $produk->create();
        }else if($aksi == 'store'){
            $produk->store();
        }else if($aksi == 'edit'){
            $produk->edit();
        }else if($aksi == 'update'){
            $produk->update();
        }else if($aksi == 'delete'){
            $produk->delete();
        }
        else{
            echo "Method Not Found";
        }
    }else if($page == 'transaksi'){
        
        $transaksi = new TransaksiController();
        if($aksi == 'view'){
            $menu->index();
           $transaksi->index();
        }else if($aksi == 'create'){
            $menu->index();
            $transaksi->create();
        }else if($aksi == 'detail'){
            $menu->index();
            $transaksi->detail();
        }else if($aksi == 'storeTransaksi'){
            $menu->index();
            $transaksi->storeTransaksi();
        }else if($aksi == 'storecheckout1'){
            $menu->index();
            $transaksi->storecheckout1();
        }else if($aksi == 'storeDetailTransaksi'){
            $menu->index();
            $transaksi->storeDetailTransaksi();
        }else if($aksi== 'checkout'){
            $menu->index();
            $transaksi->checkout();
        }else if($aksi == 'storecheckout'){
            $menu->index();
            $transaksi->storecheckout();
        }else if($aksi == 'delete'){
            $menu->index();
            $transaksi->delete();
        }else if($aksi == 'edit'){
            $menu->index();
            $transaksi->edit();
        }else if($aksi == 'update'){
            $menu->index();
            $transaksi->update();
        }else if($aksi == 'struk'){
            $transaksi->struk();
        }else{
            echo "Method Not Found";
        }
    }else{
        echo "Page Not Found";
    }
}else{
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}



 ?>