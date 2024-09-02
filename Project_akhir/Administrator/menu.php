<?php
  session_start();
  if(!isset($_SESSION['namauser'])){
    echo "<script language = 'JavaScript'>
          confirm('Anda Harus Login Kembali!');
          document.location='../index.php'; </script>";
  }
?>
<meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/aos.css">
     <link rel="stylesheet" href="css/owl.carousel.min.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

         <!-- Site Icons -->
    <link rel="shortcut icon" href="image/logo.png" type="image/x-icon" />
    

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-digital-trend.css">



<!-- MENU BAR -->
<nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
            <i class="fa fa line-chart"></i>
              BEBUKNAS
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= "index.php"; ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= "data_barang_masuk.php"; ?>">BOOK</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= "data_distributor.php"; ?>">Distributor</a>
                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Item Sales
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="data_barang.php">Item In</a></li>
            <li><a class="dropdown-item" href="data_barang_keluar.php">Item Out</a></li>
          </ul>
        </li>
        </li>
        <li class="nav-link contact">
          <a class="nav-link active" aria-current="page" href="<?= "../proses_login.php?aksi=logout"; ?>">Logout</a>
        </li>
        </div>
        </div>
  
      </ul>
      <form class="d-flex mb-2 mb-lg-0" >
        <label> <?php echo "$_SESSION[nmuser]! - $_SESSION[statuser]"; ?>
      </form>
      </ul>
      
</nav>
    



<script src="js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/aos.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
