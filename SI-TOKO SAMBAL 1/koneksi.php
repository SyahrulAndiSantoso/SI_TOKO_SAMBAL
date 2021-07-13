<?php


function koneksi(){
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_database = "db_tokosambal1";

    try {
        return new mysqli($db_host,$db_user,$db_password,$db_database);
    }catch (Exception $e){
        echo "Terjadi kesalahan koneksi database";
    }
}

?>