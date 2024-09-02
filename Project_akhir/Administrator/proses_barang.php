<?php
    include "database.php";
    $db = new database();

    $aksi = $_GET['aksi'];
    if($aksi == "tambah"){
        $foto = $_FILES['foto']['name'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1, 9999);
        $foto_baru = $angka_acak . '-' . $foto;
        $folder = "Dokumen/";

        move_uploaded_file($file_tmp, $folder . $foto_baru);

        $db->input_barang($_POST['kd_barang'], $_POST['nm_barang'], $_POST['harga'], $_POST['stok'], $_POST['distributor'], $_POST['ket'], $foto_baru);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Ditambahkan');
                document.location = 'data_barang.php';
            </script>";
    }else if($aksi == "update"){
        $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

        $total = $data_barang['harga'] * $_POST['jumlah'];

        $db->update_barang($_POST['kd_barang'], $_POST['nm_barang'], $_POST['harga'], $_POST['stok'], $_POST['distributor'], $_POST['ket']);
        echo "
            <script language = 'Javascript'>
                alert('Data Berhasil Diupdate');
                document.location = 'data_barang.php';
            </script>";
    }else if($aksi == "delete"){
        $kd_barang = $_GET['id'];
        $db->delete_barang($kd_barang);
        header("location:data_barang.php");
    }else{
        echo "Database Error, Silahkan Proses Kembali <a href='data_barang.php'>Klik Disini</a>";
    }
?>