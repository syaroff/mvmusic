<?php

    include "konek.php";

    mysqli_query($konek,"UPDATE transaksi set `status` = '0' WHERE id_transaksi = $_GET[i]");
    header("Location: ../admin/order.php");

?>