<?php 
    $total = 0;
    if(!isset($_GET['q'])) {
        $selectOrder = mysqli_query($konek,"SELECT * FROM penghasilan");
        $no = 1;
        foreach($selectOrder as $row) {
            $total += $row['jumlah'];
?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['jumlah'];?></td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['q'])) {
        $selectOrder = mysqli_query($konek,"SELECT * FROM penghasilan WHERE tanggal LIKE '%$_GET[q]%'");
        $no = 1;
        foreach($selectOrder as $row) {
            $total += $row['total'];
?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['jumlah'];?></td>
            </tr>
<?php
        }

    }

?>