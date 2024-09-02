<?php
    include "database.php";
    $db = new database();

    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){

        $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

        $total = $data_barang['harga'] * $_POST['jumlah'];

        $db->input_barang_keluar($_POST['kd_beli'], $_POST['kd_barang'], $_POST['kd_distributor'], $_POST['jumlah'], $_POST['tgl_keluar'], $_POST['pembeli'], $_POST['ket'], $total);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Ditambahkan');
                document.location = 'data_barang_keluar.php';
            </script>";
    }else if($aksi == "update"){
        $data_barang = $db->tampil_update_barang($_POST['kd_barang']);
    
        $total = $data_barang['harga'] * $_POST['jumlah'];

        $db->update_barang_keluar($_POST['kd_beli'], $_POST['kd_barang'], $_POST['kd_distributor'], $_POST['jumlah'], $_POST['tgl_keluar'], $_POST['pembeli'], $_POST['ket'], $total);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Diupdate');
                document.location = 'data_barang_keluar.php';
            </script>";
    }else if($aksi == "delete"){
        $kd_beli = $_GET['id'];
        $db->delete_barang_keluar($kd_beli);
        header("location:data_barang_keluar.php");
    }else{
        echo "Database Error, Silahkan Proses Kembali <a href='data_barang_keluar.php'>Klik Disini</a>";
    }
?>