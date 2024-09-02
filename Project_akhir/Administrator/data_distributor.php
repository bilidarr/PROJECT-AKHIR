<?php
    class dashboard{

        function __construct(){
            include "menu.php";
        }
        
    }
    $halaman_utama = new dashboard;

    include 'database.php';
    $db = new database();
    $data_distributor = $db->data_distributor();
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
        <?php include "form_distributor.php" ?>

        <div class="col-8" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Data Distributor</h3>
            
            <form action="data_distributor.php" method="POST">
                <div class="Form-group">
                    <input type="text" name="cari" class="col-lg-5" style="border: 1px solid lightblue; border-radius: 5px; height: 38px; padding: 10px;">
                    <button type="submit" class="btn btn-success mb-2 mt-1">Cari Data</button>
                </div>
            </form>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">Kode Distributor</th>
                        <th scope="col">Nama Distributor</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Pemilik</th>
                        <th scope="col">Tipe Produk</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($data_distributor as $row) { ?>
                    <tbody>
                        <tr>
                            <th><?php echo $no++; ?></th>
                            <td><?php echo $row['kd_distributor']; ?></td>
                            <td><?php echo $row['nm_distributor']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['nohp']; ?></td>
                            <td><?php echo $row['pemilik']; ?></td>
                            <td><?php echo $row['tipe_produk']; ?></td>
                            <td>
                                <a href="<?= "data_distributor.php?&&edit=update&&id=$row[kd_distributor]"; ?>" class="btn btn-primary">Edit</a>
                                <a href="<?= "proses_distributor.php?aksi=delete&&id=$row[kd_distributor]"; ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>