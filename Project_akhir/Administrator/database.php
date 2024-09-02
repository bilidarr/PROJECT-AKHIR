<?php
class database
{

    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $db = "toko";
    var $koneksi = "";

    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }
    
    function login_user($username, $password){
        $data = mysqli_query($this->koneksi, "SELECT * from tbl_user WHERE username='$username' AND password='$password'");
        $row = mysqli_num_rows($data);

        if($row > 0){
            $login = mysqli_fetch_assoc($data);
            if($login['status'] == "Administrator"){
                session_start();
                $_SESSION['namauser'] = $login['username'];
                $_SESSION['passuser'] = $login['password'];

                echo "<script language = 'JavaScript'>
                confirm('Anda Berhasil Masuk!');
                document.location='index.php'; </script>";
            }
        }
        else{
            echo "<script language = 'JavaScript'>
                document.location='login.php?pesan=gagal'; </script>";
        }
    }


    // =============== Data Barang ===============

    function input_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket, $foto_baru)
    {
        mysqli_query($this->koneksi, "INSERT INTO tbl_barang VALUES('$kd_barang', '$nm_barang', '$harga', '$stok', '$distributor', '$ket', '$foto_baru')");
    }
    
    function data_barang()
    {
        if(isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $data_barang = mysqli_query($this->koneksi, "SELECT tbl_barang.*, tbl_distributor.* FROM tbl_barang JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor WHERE tbl_barang.kd_barang like '%".$cari."%' OR tbl_barang.nm_barang like '%".$cari."%' OR tbl_distributor.nm_distributor like '%".$cari."%' ");
            while ($row = mysqli_fetch_array($data_barang)) {
                $hasil_barang[] = $row;
            }
            return $hasil_barang;
        }else{
            $data_barang = mysqli_query($this->koneksi, "SELECT tbl_barang.*, tbl_distributor.* FROM tbl_barang JOIN tbl_distributor ON tbl_barang.distributor = tbl_distributor.kd_distributor");
            while ($row = mysqli_fetch_array($data_barang)) {
                $hasil_barang[] = $row;
            }
            return $hasil_barang;
        }
    }

    function tampil_update_barang($kd_barang)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang WHERE kd_barang = '$kd_barang'");
        return $query->fetch_array();
    }

    function update_barang($kd_barang, $nm_barang, $harga, $stok, $distributor, $ket)
    {
        $query = mysqli_query($this->koneksi, "UPDATE tbl_barang SET nm_barang = '$nm_barang', harga = '$harga', stok = '$stok', distributor = '$distributor', ket = '$ket' WHERE kd_barang = '$kd_barang'");
    }

    function delete_barang($kd_barang)
    {
        $dok = mysqli_query($this->koneksi, "SELECT * FROM tbl_barang WHERE kd_barang = '$kd_barang'");
        $data = mysqli_fetch_array($dok);
        $foto = $data['foto'];
        unlink("Dokumen/$foto");
        mysqli_query($this->koneksi, "DELETE FROM tbl_barang WHERE kd_barang = '$kd_barang'");
    }


    // =============== Data Distributor ===============

    function input_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        mysqli_query($this->koneksi, "INSERT INTO tbl_distributor VALUES('$kd_distributor', '$nm_distributor', '$alamat', '$nohp', '$pemilik', '$tipe_produk')");
    }

    function data_distributor()
    {
        if(isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $data_distributor = mysqli_query($this->koneksi, "SELECT * FROM tbl_distributor WHERE tbl_distributor.kd_distributor like '%".$cari."%' OR tbl_distributor.nm_distributor like '%".$cari."%' OR tbl_distributor.alamat like '%".$cari."%' OR tbl_distributor.pemilik like '%".$cari."%' OR tbl_distributor.tipe_produk like '%".$cari."%' ");
            while ($row = mysqli_fetch_array($data_distributor)) {
                $hasil_distributor[] = $row;
            }
            return $hasil_distributor;
        }else{
            $data_distributor = mysqli_query($this->koneksi, "SELECT * FROM tbl_distributor");
            while ($row = mysqli_fetch_array($data_distributor)) {
                $hasil_distributor[] = $row;
            }
            return $hasil_distributor;
        }
    }

    function tampil_update_distributor($kd_distributor)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM tbl_distributor WHERE kd_distributor = '$kd_distributor'");
        return $query->fetch_array();
    }

    function update_distributor($kd_distributor, $nm_distributor, $alamat, $nohp, $pemilik, $tipe_produk)
    {
        $query = mysqli_query($this->koneksi, "UPDATE tbl_distributor SET nm_distributor = '$nm_distributor', alamat = '$alamat', nohp = '$nohp', pemilik = '$pemilik', tipe_produk = '$tipe_produk' WHERE kd_distributor = '$kd_distributor'");
    }

    function delete_distributor($kd_distributor)
    {
        mysqli_query($this->koneksi, "DELETE FROM tbl_distributor WHERE kd_distributor = '$kd_distributor'");
    }


    // =============== Data Barang Masuk ===============

    function data_barang_masuk()
    {
        if(isset($_POST['dari']) && isset($_POST['sampai'])){
            $dari = $_POST['dari'];
            $sampai = $_POST['sampai'];
            $data_barang_masuk = mysqli_query($this->koneksi, "SELECT brg_masuk.*, tbl_barang.*, tbl_distributor.* FROM brg_masuk JOIN tbl_barang ON brg_masuk.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_masuk.kd_distributor = tbl_distributor.kd_distributor 
            WHERE brg_masuk.tgl_masuk between '$dari' AND '$sampai'");
            while ($row = mysqli_fetch_array($data_barang_masuk)) {
                $hasil_barang_masuk[] = $row;
            }
            return $hasil_barang_masuk;
        }else{
            $data_barang_masuk = mysqli_query($this->koneksi, "SELECT brg_masuk.*, tbl_barang.*, tbl_distributor.* FROM brg_masuk JOIN tbl_barang ON brg_masuk.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_masuk.kd_distributor = tbl_distributor.kd_distributor");
            while ($row = mysqli_fetch_array($data_barang_masuk)) {
                $hasil_barang_masuk[] = $row;
            }
            return $data_barang_masuk;
        }
    }

    function cetak_barang_masuk()
    {
        if(isset($_POST['awal']) && isset($_POST['akhir'])){
        $awal = $_POST['awal'];
        $akhir = $_POST['akhir'];
        $cetak_barang_masuk = mysqli_query($this->koneksi, "SELECT brg_masuk.*, tbl_barang.*, tbl_distributor.* FROM brg_masuk JOIN tbl_barang ON brg_masuk.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_masuk.kd_distributor = tbl_distributor.kd_distributor 
            WHERE brg_masuk.tgl_masuk between '$awal' AND '$akhir'");
            while ($row = mysqli_fetch_array($cetak_barang_masuk)) {
                $hasil_cetak_barang_masuk[] = $row;
            }
            return $hasil_cetak_barang_masuk;
        }else{
            $cetak_barang_masuk = mysqli_query($this->koneksi, "SELECT brg_masuk.*, tbl_barang.*, tbl_distributor.* FROM brg_masuk JOIN tbl_barang ON brg_masuk.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_masuk.kd_distributor = tbl_distributor.kd_distributor");
            while ($row = mysqli_fetch_array($cetak_barang_masuk)) {
                $hasil_cetak_barang_masuk[] = $row;
            }
            return $hasil_cetak_barang_masuk;
        }
    }

    function input_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total, $sisa_stok)
    {
        mysqli_query($this->koneksi, "INSERT INTO brg_masuk VALUES('$no_ref', '$kd_barang', '$kd_distributor', '$jumlah', '$tgl_masuk', '$penerima', '$ket', '$total')");

        $query = mysqli_query($this->koneksi, "Update tbl_barang set stok='$sisa_stok' where kd_barang='$kd_barang'");
    }

    function tampil_update_barang_masuk($no_ref)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM brg_masuk WHERE no_ref = '$no_ref'");
        return $query->fetch_array();
    }

    function update_barang_masuk($no_ref, $kd_barang, $kd_distributor, $jumlah, $tgl_masuk, $penerima, $ket, $total)
    {
        $query = mysqli_query($this->koneksi, "UPDATE brg_masuk SET kd_barang = '$kd_barang', kd_distributor = '$kd_distributor', jumlah = '$jumlah', tgl_masuk = '$tgl_masuk', penerima = '$penerima', ket = '$ket', total = '$total' WHERE no_ref = '$no_ref'");
    }

    function delete_barang_masuk($no_ref)
    {
        mysqli_query($this->koneksi, "DELETE FROM brg_masuk WHERE no_ref = '$no_ref'");
    }


    // ================= Data Barang Keluar ================

    function data_barang_keluar()
    {
        if(isset($_POST['cari'])){
            $cari = $_POST['cari'];
            $data_barang_keluar = mysqli_query($this->koneksi, "SELECT brg_keluar.*, tbl_barang.*, tbl_distributor.* FROM brg_keluar JOIN tbl_barang ON brg_keluar.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_keluar.kd_distributor = tbl_distributor.kd_distributor WHERE brg_keluar.kd_beli like '%".$cari."%' OR tbl_barang.nm_barang like '%".$cari."%' OR tbl_distributor.nm_distributor like '%".$cari."%' OR brg_keluar.pembeli like '%".$cari."%' ");
            while ($row = mysqli_fetch_array($data_barang_keluar)) {
                $hasil_barang_keluar[] = $row;
            }
            return $hasil_barang_keluar;
        }else{
            $data_barang_keluar = mysqli_query($this->koneksi, "SELECT brg_keluar.*, tbl_barang.*, tbl_distributor.* FROM brg_keluar JOIN tbl_barang ON brg_keluar.kd_barang = tbl_barang.kd_barang JOIN tbl_distributor ON brg_keluar.kd_distributor = tbl_distributor.kd_distributor");
            while ($row = mysqli_fetch_array($data_barang_keluar)) {
                $hasil_barang_keluar[] = $row;
            }
            return $hasil_barang_keluar;
        }
    }

    function input_barang_keluar($kd_beli, $kd_barang, $kd_distributor, $jumlah, $tgl_keluar, $pembeli, $ket, $total)
    {
        mysqli_query($this->koneksi, "INSERT INTO brg_keluar VALUES('$kd_beli', '$kd_barang', '$kd_distributor', '$jumlah', '$tgl_keluar', '$pembeli', '$ket', '$total')");
    
        
    }

    function tampil_update_barang_keluar($kd_beli)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM brg_keluar WHERE kd_beli = '$kd_beli'");
        return $query->fetch_array();
    }

    function update_barang_keluar($kd_beli, $kd_barang, $kd_distributor, $jumlah, $tgl_keluar, $pembeli, $ket, $total)
    {
        $query = mysqli_query($this->koneksi, "UPDATE brg_keluar SET kd_barang = '$kd_barang', kd_distributor = '$kd_distributor', jumlah = '$jumlah', tgl_keluar = '$tgl_keluar', pembeli = '$pembeli', ket = '$ket', total = '$total' WHERE kd_beli = '$kd_beli'");
    }

    function delete_barang_keluar($kd_beli)
    {
        mysqli_query($this->koneksi, "DELETE FROM brg_keluar WHERE kd_beli = '$kd_beli'");
    }
}
