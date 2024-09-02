<?php
class dashboard
{

    function __construct()
    {
        include "menu.php";
    }
}
$halaman_utama = new dashboard;

include 'database.php';
$db = new database();
$brg_masuk = $db->data_barang_masuk();
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

    <div class="row" style="margin: 50px; ">
    
        

        <div class="col-10" style="border: 5px solid lightblue; border-radius: 10px; padding: 10px;">
            <h3 style="text-align: center; background-color: lightblue; border-radius: 60px; color: white; padding: 10px;">BUKU TERSEDIA</h3>

            <form action="data_barang_masuk.php" method="POST">
                <div class="mb-3">
                    <input type="date" name="dari" class="col-lg-3" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;"> s/d
                    <input type="date" name="sampai" class="col-lg-3" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
                    <button type="submit" name="cari" class="btn btn-primary mb-2 mt-1">Cari Data</button>
                    <!-- <a href="cetak_barang_masuk.php" target="_blank" class="btn btn-success mb-2 mt-1">Cetak Data</a> -->
                </div>
            </form>
            <!-- <form action="data_barang_masuk.php" method="POST">
                <div class="form-group">
                    <input type="text" name="cari" class="col-lg-5" style="border: 1px solid lightblue; border-radius: 5px; height: 38px; padding: 10px;">
                    <button type="submit" value="cari" class="btn btn-success mb-2 mt-1">Search Data</button>
                </div>
            </form> -->

            <?php
                if(isset($_POST['cari'])){
                    $dari = $_POST['dari'];
                    $sampai = $_POST['sampai'];

                    echo "<label>Data Barang Masuk Periode Tanggal dari : <b>$dari</b> Sampai dengan Tanggal <b>$sampai</b></label><hr>
                    
                    <a href='cetak_barang_masuk.php?awal=$dari&&akhir=$sampai' target='_blank' class='btn btn-success mb-2 mt-1'>Cetak Data</a>";
                }
                else{
                    echo "<a href='cetak_barang_masuk.php' target='_blank' class='btn btn-success mb-2 mt-1'>Cetak Data</a>";
                }
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Nama Distributor</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah Masuk</th>
                        <th scope="col">Total</th>
                        
                        <th scope="col">Keterangan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($brg_masuk as $row) { ?>
                    <tbody>
                        <tr>
                            <th><?php echo $no++; ?></th>
                            
                            <td><?php echo $row['tgl_masuk']; ?></td>
                            <td><?php echo $row['nm_barang']; ?></td>
                            <td><?php echo $row['nm_distributor']; ?></td>
                            <td><?php echo $row['harga']; ?></td>
                            <td><?php echo $row['jumlah']; ?></td>
                            <td><?php echo $row['total']; ?></td>
                            
                            <td><?php echo $row['ket']; ?></td>
                            <td>
                                <a href="<?= "data_barang_masuk.php?&&edit=update&&id=$row[no_ref]"; ?>" class="btn btn-m btn-success">Edit</a>
                                <a href="<?= "proses_barang_masuk.php?aksi=delete&&id=$row[no_ref]"; ?>" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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