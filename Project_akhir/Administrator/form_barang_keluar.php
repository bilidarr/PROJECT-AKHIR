<?php
    function Update_data(){
        $db = new database();
        $kd_beli = $_GET['id'];
        $brg_keluar = $db->tampil_update_barang_keluar($kd_beli);
        $data_distributor = $db->data_distributor();
        $data_barang = $db->data_barang();
?>

<div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
    <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Barang Keluar</h3>

        <form action="<?= "proses_barang_keluar.php?aksi=update"; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Pembelian</label>
                <input name="kd_beli" type="text" class="form-control" value="<?= $brg_keluar['kd_beli']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Barang Keluar</label>
                <input name="tgl_keluar" type="date" class="form-control" value="<?= $brg_keluar['tgl_keluar']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <select name="kd_barang" class="form-control">
                    <option value="<?= $brg_keluar["kd_barang"]; ?>"><?= $brg_keluar["nm_barang"]; ?></option>
                    <?php foreach ($data_barang as $row) { ?>
                        <option value="<?= "$row[kd_barang]"; ?>"><?= "$row[nm_barang]"; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="kd_distributor" class="form-control">
                    <option value="<?= $brg_keluar["kd_distributor"]; ?>"><?= $brg_keluar["nm_distributor"]; ?></option>
                    <?php foreach ($data_distributor as $row) { ?>
                        <option value="<?= "$row[kd_distributor]"; ?>"><?= "$row[nm_distributor]"; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input name="jumlah" type="number" class="form-control" value="<?= $brg_keluar['jumlah']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <input name="pembeli" type="text" class="form-control" value="<?= $brg_keluar['pembeli']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea name="ket" class="form-control" rows="3"><?= $brg_keluar['ket']; ?></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
        </form>
</div>

<?php }
    function Tambah_data(){
        $db = new database();
        $data_distributor = $db->data_distributor();
        $data_barang = $db->data_barang();
?>

    <div class="col-4" style="border: 1px solid lightgray; border-radius: 10px; padding: 10px;">
        <h3 style="text-align: center; background-color: lightblue; border-radius: 10px; color: white; padding: 10px;">Input Barang Keluar</h3>

        <form action="<?= "proses_barang_keluar.php?aksi=tambah"; ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Kode Pembelian</label>
                <input name="kd_beli" type="text" class="form-control" placeholder="Masukkan Kode Pembelian">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Barang Keluar</label>
                <input name="tgl_keluar" type="date" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <select name="kd_barang" id="kd_barang" class="form-control" onchange="changeValue(this.value)">
                    <?php
                    $jsArray = "var prdName = new Array();\n";
                    foreach ($data_barang as $row) {
                        echo '<option value="' . $row['kd_barang'] . '">' . $row['kd_barang'] . '</option>';
                        $jsArray .= "prdName['" . $row['kd_barang'] . "'] = {
                                    nm_barang : '" . addslashes($row['nm_barang']) . "',
                                    harga : '" . addslashes($row['harga']) . "',
                                    stok : '" . addslashes($row['stok']) . "'
                        };\n";
                    } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" id="nm_barang" type="text" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Harga Barang</label>
                <input type="text" id="harga" type="text" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Barang</label>
                <input type="text" id="stok" type="text" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Distributor</label>
                <select name="kd_distributor" class="form-control">
                    <?php
                    foreach ($data_distributor as $row) { ?>
                        <option value="<?= "$row[kd_distributor]"; ?>"><?= "$row[nm_distributor]"; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah Keluar</label>
                <input name="jumlah" type="number" class="form-control" placeholder="Masukkan Jumlah Barang">
            </div>
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <input name="pembeli" type="text" class="form-control" placeholder="Masukkan Customer">
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan Barang</label>
                <textarea name="ket" class="form-control" rows="3" placeholder="Masukkan Keterangan Barang"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan Data">
                <input type="reset" class="btn btn-secondary" value="Reset">
            </div>
        </form>
        <script type="text/javascript">
            <?php echo $jsArray; ?>
                function changeValue(x) {
                    document.getElementById('nm_barang').value = prdName[x].nm_barang;
                    document.getElementById('harga').value = prdName[x].harga;
                    document.getElementById('stok').value = prdName[x].stok;
                }
        </script>
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