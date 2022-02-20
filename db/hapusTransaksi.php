<?php 

    include "konek.php";

    mysqli_query($konek,"DELETE FROM transaksi WHERE id_transaksi = $_GET[i]");
    header("Location: ../admin/order.php");
?>