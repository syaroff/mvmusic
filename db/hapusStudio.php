<?php 

    include "konek.php";
    mysqli_query($konek,"DELETE FROM studio WHERE id_studio = $_GET[i]");
    header("Location: ../admin/studio.php");

?>