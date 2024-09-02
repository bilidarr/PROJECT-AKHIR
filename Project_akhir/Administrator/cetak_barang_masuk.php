<body onload="javascript:window.print()" style="margin:0 auto; width: 1000px">
    
    <div style="margin-left:20px"></div>

    <div style="margin: auto; 
        top:20%; 
        left: 20%; 
        display: block; 
        position: absolute; 
        opacity: 0.05;
        font-size: 200pt;
        filter: alpha(opacity=20);">
        <label>ASLI</label>
    </div>

    <p>&nbsp;</p>

    <img src="image/logo.png" style="width: 10%; float: left;">
    <table width="90%" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <div align="center">
                    <font size="8"><b>BEBUKNAS</b></font>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div align="center">
                    <font size="5">JL. Kyai Haji Agus Salim No.128, Pegagan, Palimanan, Cirebon, West Java 45161</font>
                </div>
            </td>
        </tr>
    </table><br>
    <hr>

    <label>
        <font size="6"><u>
                <center>Laporan Buku</center>
            </u></font>
    </label>

    <p>&nbsp;</p>

    <table style="border: 1px solid gray;" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <th style="border: 1px solid gray;">NO</th>
            <th style="border: 1px solid gray;">No Referensi</th>
            <th style="border: 1px solid gray;">Tanggal Masuk</th>
            <th style="border: 1px solid gray;">Nama Barang</th>
            <th style="border: 1px solid gray;">Nama Distributor</th>
            <th style="border: 1px solid gray;">Harga</th>
            <th style="border: 1px solid gray;">Jumlah Beli</th>
            <th style="border: 1px solid gray;">Total</th>
            <th style="border: 1px solid gray;">Penerima</th>
        </tr>
        <?php
        include 'database.php';
        $db = new database();
        $brg_masuk = $db->cetak_barang_masuk();
        $no = 1;
        foreach ($brg_masuk as $row) { ?>
            <tr align="center">
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $no++; ?></th>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['no_ref']; ?></td>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['tgl_masuk']; ?></td>
                <td style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['nm_barang']; ?></td>
                <td style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['nm_distributor']; ?></td>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;">Rp. <?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['jumlah']; ?> Unit </td>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;">Rp. <?php echo number_format($row['total'], 0, ',', '.') ?></td>
                <td align="center" style="border-right: 1px solid gray; border-top: 1px solid gray; padding: 3px 5px;"><?php echo $row['penerima']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <p>&nbsp;</p>

    <table align="right" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <center>Cirebon, <?php echo date("d F Y") ?></center>
            </td>
        </tr>
        <tr>
            <td>
                <center>Pemilik BEBUKNAS</center>
                <p align="center"><img src="image/ttd.png" width="30%"></p>
                <center><u>BillyDarmawan</u></center>
            </td>
        </tr>
    </table>

</body>