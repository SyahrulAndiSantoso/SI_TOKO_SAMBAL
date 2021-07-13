<?php
  
  class MenuController{
    private $model;
/* Function ini adalah konstruktor yang berguna menginisialisasi objek menumodel*/
public function __construct(){
    $this->model = new MenuModel();
}
/* Function ini digunakan unu menampilkan menu */
public function index(){
    $data = $this->model->get();
    extract($data);
    require_once("View/menu/index.php");
}


  }



?>