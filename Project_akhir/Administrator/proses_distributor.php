<?php
    include "database.php";
    $db = new database();

    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){
        $db->input_distributor($_POST['kd_distributor'], $_POST['nm_distributor'], $_POST['alamat'], $_POST['nohp'], $_POST['pemilik'], $_POST['tipe_produk']);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Ditambahkan');
                document.location = 'data_distributor.php';
            </script>";
    }else if($aksi == "update"){
        $db->update_distributor($_POST['kd_distributor'], $_POST['nm_distributor'], $_POST['alamat'], $_POST['nohp'], $_POST['pemilik'], $_POST['tipe_produk']);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Diupdate');
                document.location = 'data_distributor.php';
            </script>";
    }else if($aksi == "delete"){
        $kd_distributor = $_GET['id'];
        $db->delete_distributor($kd_distributor);
        header("location:data_distributor.php");
    }else{
        echo "Database Error, Silahkan Proses Kembali <a href='data_distributor.php'>Klik Disini</a>";
    }
?>