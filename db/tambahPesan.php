<?php 

    include "konek.php";
    if(isset($_POST['tambah'])) {
        $date= date("Y:m:h");
        $insert = mysqli_query($konek,"INSERT INTO transaksi (id_studio,nama_penyewa,tanggal,jam_mulai,jam_selesai,harga_total,`status`) VALUES ('$_POST[studio]','$_POST[nama_penyewa]','$date','$_POST[mulai]','$_POST[selesai]','$_POST[hatot]','1')");

        $selTransaksi = mysqli_query($konek,"SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1");
        
        foreach($selTransaksi as $row) { $id_transaksi = $row['id_transaksi']; }
        
        
        $insertHasil = mysqli_query($konek,"INSERT INTO penghasilan (id_transaksi,tanggal,jumlah) VALUES ($id_transaksi,'$date','$_POST[hatot]')");
        if($insertHasil) {
            header("Location: ../admin/order.php");
        }
    }
    else if(isset($_POST['ubah'])) {
        $date = date("Y:m:h");
        $updateTransaksi = mysqli_query($konek,"UPDATE transaksi SET nama_penyewa='$_POST[nama_penyewa]',tanggal = '$date',id_studio='$_POST[studio]',jam_mulai='$_POST[mulai]',jam_selesai='$_POST[selesai]',harga_total='$_POST[hatot]',`status`='1' WHERE id_transaksi = $_POST[id_transaksi] ");
        $updateHasil = mysqli_query($konek,"UPDATE penghasilan SET jumlah=$_POST[hatot] WHERE id_transaksi = $_POST[id_transaksi]");
        if($updateHasil) {
            header("Location: ../admin/order.php");
        }
    }

?>