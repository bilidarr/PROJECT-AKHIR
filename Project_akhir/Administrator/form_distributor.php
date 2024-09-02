<?php
    function Update_data(){
        $db = new database();
        $kd_distributor = $_GET['id'];
        $distributor = $db->tampil_update_distributor($kd_distributor);
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Update Distributor</h3>

        <form action="<?= "proses_distributor.php?aksi=update"; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input name="kd_distributor" type="text" class="form-control" value="<?= $distributor['kd_distributor']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input name="nm_distributor" type="text" class="form-control" value="<?= $distributor['nm_distributor']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat"><?= $distributor['alamat']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input name="nohp" type="text" class="form-control" value="<?= $distributor['nohp']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input name="pemilik" type="text" class="form-control" value="<?= $distributor['pemilik']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <input name="tipe_produk" class="form-control" value="<?= $distributor['tipe_produk']; ?>"></input>
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
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Distributor</h3>

        <form action="<?= "proses_distributor.php?aksi=tambah"; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Distributor</label>
                <input name="kd_distributor" type="text" class="form-control" placeholder="Masukkan Kode Distributor">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Distributor</label>
                <input name="nm_distributor" type="text" class="form-control" placeholder="Masukkan Nama Distributor">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" placeholder="Masukkan Alamat"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input name="nohp" type="text" class="form-control" placeholder="Masukkan Nomor HP">
            </div>

            <div class="mb-3">
                <label class="form-label">Pemilik</label>
                <input name="pemilik" type="text" class="form-control" placeholder="Masukkan Pemilik">
            </div>

            <div class="mb-3">
                <label class="form-label">Tipe Produk</label>
                <input name="tipe_produk" class="form-control" placeholder="Masukkan Tipe Produk"></input>
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