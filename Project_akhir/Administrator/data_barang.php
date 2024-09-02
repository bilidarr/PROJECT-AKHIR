<?php
  class dashboard{

    function __construct(){
      include "menu.php";
    }
    
  }
  $halaman_utama = new dashboard;

  include 'database.php';
  $db = new database();
  $data_barang = $db->data_barang();
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
    <?php include "form_barang.php" ?>

    <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
      <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Data Buku</h3>
      
      <form action="data_barang.php" method="POST">
        <div class="Form-group">
          <input type="text" name="cari" class="col-lg-5" style="border: 1px solid lightblue; border-radius: 5px; height: 38px; padding: 10px;">
          <button type="submit" class="btn btn-success mb-2 mt-1">Cari Data</button>
        </div>
      </form>
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Foto</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama Buku</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th scope="col">Distributor</th>
            <th scope="col">Telp Distributor</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($data_barang as $row) { ?>
          <tbody>
            <tr>
              <th><?php echo $no++; ?></th>
              <td><img style="height: 70px;" src="Dokumen/<?php echo $row['foto'] ?>"></td>
              <td><?php echo $row['kd_barang']; ?></td>
              <td><?php echo $row['nm_barang']; ?></td>
              <td><?php echo $row['harga']; ?></td>
              <td><?php echo $row['stok']; ?></td>
              <td><?php echo $row['nm_distributor']; ?></td>
              <td><?php echo $row['nohp']; ?></td>
              <td>
                <a href="<?= "data_barang.php?&&edit=update&&id=$row[kd_barang]"; ?>" class="btn btn-m btn-success">Edit</a>
                <a href="<?= "proses_barang.php?aksi=delete&&id=$row[kd_barang]"; ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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