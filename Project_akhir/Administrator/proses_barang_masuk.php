<?php
include "database.php";
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    $total = $data_barang['harga'] * $_POST['jumlah'];
    $sisa_stok = $_POST['stok'] + $_POST['jumlah'];

    $db->input_barang_masuk(
        $_POST['no_ref'],
        $_POST['kd_barang'],
        $_POST['kd_distributor'],
        $_POST['jumlah'],
        $_POST['tgl_masuk'],
        $_POST['penerima'],
        $_POST['ket_masuk'],
        $total,
        $sisa_stok
    );
    echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Ditambahkan');
            document.location = 'data_barang_masuk.php';
        </script>";
} else if ($aksi == "update") {
    $data_barang = $db->tampil_update_barang($_POST['kd_barang']);

    $total = $data_barang['harga'] * $_POST['jumlah'];

    $db->update_barang_masuk($_POST['no_ref'], $_POST['kd_barang'], $_POST['kd_distributor'], $_POST['jumlah'], $_POST['tgl_masuk'], $_POST['penerima'], $_POST['ket_masuk'], $total);
    echo "
        <script language = 'Javascript'>
            alert('Data Berhasil Diupdate');
            document.location = 'data_barang_masuk.php';
        </script>";
} else if ($aksi == "delete") {
    $no_ref = $_GET['id'];
    $db->delete_barang_masuk($no_ref);
    header("location:data_barang_masuk.php");
} else {
    echo "Database Error, Silahkan Proses Kembali <a href='data_barang_masuk.php'>Klik Disini</a>";
}