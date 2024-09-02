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
                $_SESSION['nmuser']   = $login['nm_user'];
                $_SESSION['statuser'] = $login['status'];

                echo "<script language = 'JavaScript'>
                confirm('Anda Berhasil Masuk!');
                document.location='Administrator/index.php'; </script>";
            }else if($login['status'] == "Staff Kasir"){
                session_start();
                $_SESSION['namauser'] = $login['username'];
                $_SESSION['passuser'] = $login['password'];
                $_SESSION['nmuser']   = $login['nm_user'];
                $_SESSION['statuser'] = $login['status'];

                echo "<script language = 'JavaScript'>
                confirm('Anda Berhasil Masuk!');
                document.location='Staff Kasir/index.php'; </script>";
            }
        }
        else{
            echo "<script language = 'JavaScript'>
                document.location='index.php?pesan=gagal'; </script>";
        }
    }
}