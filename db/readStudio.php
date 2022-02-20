<?php

    include "konek.php";
    if(!isset($_GET['s'])) {
        $no = 1;
        $read = mysqli_query($konek,"SELECT * FROM studio");
        foreach($read as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama_studio']?></td>
                <td><?=$row['harga']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_studio']?>','<?=$row['nama_studio']?>','<?=$row['harga']?>')" class="btn btn-sm btn-warning">Edit</button>
                    <a href="../db/hapusStudio.php?i=<?=$row['id_studio']?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $no = 1;
        $read = mysqli_query($konek,"SELECT * FROM studio WHERE nama_studio LIKE '%$_GET[s]%'");
        foreach($read as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama_studio']?></td>
                <td><?=$row['harga']?></td>
                <td>
                    <button onclick="edit('<?=$row['id_studio']?>','<?=$row['nama_studio']?>','<?=$row['harga']?>')" class="btn btn-sm btn-warning">Edit</button>
                    <a href="../db/hapusStudio.php?i=<?=$row['id_studio']?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
<?php
        }
    }

?>