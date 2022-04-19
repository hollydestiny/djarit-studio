<?php
    include "config/config.php";
    // Define your location project directory in htdocs (EX THE FULL PATH: D:\xampp\htdocs\x-kang\simple-routing-with-php)
    $project_location = "/djarit-studio";
    $me = $project_location;

    // For get URL PATH
    $request = $_SERVER['REQUEST_URI'];

    switch ($request) {
        case $me.'/' :
            require "views/index.php";
            break;
        case $me.'/admin' :
            require "views/admin/index.php";
            break;
        case $me.'/admin/instruktur/tambah' :
            require "views/admin/instruktur_tambah_form.php";
            break;
        case $me.'/admin/diklat/tambah' :
            require "views/admin/diklat_tambah_form.php";
            break;
        case $me.'/admin/diklat/tambah?feedback=1' :
            require "views/admin/diklat_tambah_form.php";
            break;
        case $me.'/admin/diklat/tambah?feedback=2' :
            require "views/admin/diklat_tambah_form.php";
            break;
        case $me.'/admin/diklat/list' :
            include "config/koneksi.php";
            require "views/admin/diklat_list.php";
            break;
        case $me.'/admin/diklat/list?feedback=1' :
            include "config/koneksi.php";
            require "views/admin/diklat_list.php";
            break;
        case $me.'/admin/diklat/list?feedback=2' :
            include "config/koneksi.php";
            require "views/admin/diklat_list.php";
            break;
        case $me.'/admin/peserta/tambah' :
            include "config/koneksi.php";
            require "views/admin/peserta_tambah_form.php";
            break;
        case $me.'/admin/peserta/tambah?feedback=1' :
            require "views/admin/peserta_tambah_form.php";
            break;
        case $me.'/admin/peserta/tambah?feedback=2' :
            require "views/admin/peserta_tambah_form.php";
            break;
        default:
            http_response_code(404);
            echo "404";
            break;
    }
    
    // header("location: ". SERVER . "views/index.php");
    // exit();
?>