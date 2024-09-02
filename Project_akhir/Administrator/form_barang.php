<?php
    function Update_data(){
        $db = new database();
        $kd_barang = $_GET['id'];
        $barang = $db->tampil_update_barang($kd_barang);
        $data_distributor = $db->data_distributor();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Update Buku</h3>

        <form action="<?= "proses_barang.php?aksi=update"; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Kode buku</label>
                <input name="kd_barang" type="text" class="form-control" value="<?= $barang['kd_barang']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Buku</label>
                <input name="nm_barang" type="text" class="form-control" value="<?= $barang['nm_barang']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Buku</label>
                <input name="harga" type="text" class="form-control" value="<?= $barang['harga']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Buku</label>
                <input name="stok" type="text" class="form-control" value="<?= $barang['stok']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="distributor" class="form-control">
                    <option value="<?= $barang["distributor"]; ?>"><?= $barang["distributor"]; ?></option>
                    <?php foreach ($data_distributor as $row) { ?>
                        <option value="<?= "$row[kd_distributor]" ?>"><?= $row['nm_distributor']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan </label>
                <textarea name="ket" class="form-control" rows="3" placeholder="Masukan Keterangan Barang"><?= $barang['ket']; ?></textarea>
            </div>

            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Update Data">
                <a href="index.php" class="btn btn-success">Kembali</a>
            </div>
        </form>
    </div>

<?php }
    function Tambah_data(){
        $db = new database();
        $data_distributor = $db->data_distributor();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Buku</h3>

        <form action="<?= "proses_barang.php?aksi=tambah"; ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Kode Buku</label>
                <input name="kd_barang" type="text" class="form-control" placeholder="Masukkan Kode ">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Buku</label>
                <input name="nm_barang" type="text" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Buku</label>
                <input name="harga" type="text" class="form-control" placeholder="Masukkan Harga ">
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input name="stok" type="text" class="form-control" placeholder="Masukkan Stok">
            </div>

            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="distributor" class="form-control">
                    <?php
                    foreach ($data_distributor as $row) { ?>
                        <option value="<?= "$row[kd_distributor]"; ?>"><?= "$row[nm_distributor]"; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea name="ket" class="form-control" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="foto" class="form-control">
            </div>


            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
        </form>
    </div>
<?php } ?>

<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $edit = $_GET['edit'];
    if($edit == "update"){
        Update_data();
    }else{
        Tambah_data();
    }
?>