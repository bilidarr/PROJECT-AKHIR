<?php
  class dashboard{

    function __construct(){
      include "menu.php";
    }
    
  }
  $halaman_utama = new dashboard;

  include 'database.php';
  $db = new database();
  $brg_keluar = $db->data_barang_keluar();
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>BEBUKNAS</title>
</head>

<body>

  <div class="row" style="margin: 20px;">
    <?php include "form_barang_keluar.php" ?>

    <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
      <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Data Barang Keluar</h3>
      
      <form action="data_barang_keluar.php" method="POST">
        <div class="Form-group">
          <input type="text" name="cari" class="col-lg-5" style="border: 1px solid lightblue; border-radius: 5px; height: 38px; padding: 10px;">
          <button type="submit" class="btn btn-success mb-2 mt-1">Cari Data</button>
        </div>
      </form>
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Kode Pembelian</th>
            <th scope="col">Tanggal Keluar</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Nama Distributor</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah Beli</th>
            <th scope="col">Total</th>
            <th scope="col">Customer</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($brg_keluar as $row) { ?>
          <tbody>
            <tr>
              <th><?php echo $no++; ?></th>
              <td><?php echo $row['kd_beli']; ?></td>
              <td><?php echo $row['tgl_keluar']; ?></td>
              <td><?php echo $row['nm_barang']; ?></td>
              <td><?php echo $row['nm_distributor']; ?></td>
              <td><?php echo $row['harga']; ?></td>
              <td><?php echo $row['jumlah']; ?></td>
              <td><?php echo $row['total']; ?></td>
              <td><?php echo $row['pembeli']; ?></td>
              <td>
                <a href="<?= "data_barang_keluar.php?&&edit=update&&id=$row[kd_beli]"; ?>" class="btn btn-m btn-success">Edit</a>
                <a href="<?= "proses_barang_keluar.php?aksi=delete&&id=$row[kd_beli]"; ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>

  </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>