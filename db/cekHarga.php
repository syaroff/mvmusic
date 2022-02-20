<?php

    include "konek.php";
    $sel = mysqli_query($konek,"SELECT harga FROm studio WHERE id_studio = $_GET[i]");
    $data = [];
    while($row = mysqli_fetch_assoc($sel)) {
        array_push($data,$row);
    }
    echo json_encode($data);
?>