<?php 
    include "konek.php";
    
    if(!isset($_GET['s'])) {
        $data = mysqli_query($konek,"SELECT * FROM transaksi INNER JOIN studio ON transaksi.id_studio = studio.id_studio ORDER BY id_transaksi DESC");
        $no = 1;
        foreach($data as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama_penyewa']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['nama_studio']?></td>
                <td><?=$row['harga']?>/jam</td>
                <td><?=$row['jam_mulai']?></td>
                <td><?=$row['jam_selesai']?></td>
                <td><?=$row['harga_total']?></td>
                <td>
                    <h2 class="badge bg-<?php echo ($row['status'] > 0) ? 'danger' : 'success' ?> text-white p-2" style="font-size: .7rem;letter-spacing: .2em;" ><?php echo  ($row['status'] > 0) ? 'Berlangsung' : 'Selesai' ?></h2>
                </td>
                <td>
                    <a href="../db/orderDone.php?i=<?=$row['id_transaksi']?>" class="btn btn-success btn-sm">Done</a>
                    <button onclick="ubah('<?=$row['id_transaksi']?>','<?=$row['nama_penyewa']?>','<?=$row['id_studio']?>','<?=$row['jam_mulai']?>','<?=$row['jam_selesai']?>','<?=$row['harga']?>','<?=$row['harga_total']?>')" class="btn btn-warning btn-sm">Ubah</button>
                    <a href="../db/hapusTransaksi.php?i=<?=$row['id_transaksi']?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['s'])) {
        $data = mysqli_query($konek,"SELECT * FROM transaksi INNER JOIN studio ON transaksi.id_studio = studio.id_studio WHERE nama_penyewa lIKE '%$_GET[s]%' OR nama_studio lIKE '%$_GET[s]%' OR tanggal lIKE '%$_GET[s]%' OR jam_mulai lIKE '%$_GET[s]%' OR jam_selesai lIKE '%$_GET[s]%' ORDER BY id_transaksi DESC");
        $no = 1;
        foreach($data as $row) {
?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['nama_penyewa']?></td>
                <td><?=$row['tanggal']?></td>
                <td><?=$row['nama_studio']?></td>
                <td><?=$row['harga']?>/jam</td>
                <td><?=$row['jam_mulai']?></td>
                <td><?=$row['jam_selesai']?></td>
                <td><?=$row['harga_total']?></td>
                <td>
                    <h2 class="badge bg-<?php echo ($row['status'] > 0) ? 'danger' : 'success' ?> text-white p-2" style="font-size: .7rem;letter-spacing: .2em;" ><?php echo  ($row['status'] > 0) ? 'Berlangsung' : 'Selesai' ?></h2>
                </td>
                <td>
                     
                    <button onclick="ubah('<?=$row['id_transaksi']?>','<?=$row['nama_penyewa']?>','<?=$row['id_studio']?>','<?=$row['jam_mulai']?>','<?=$row['jam_selesai']?>','<?=$row['harga_total']?>')" class="btn btn-warning btn-sm">Ubah</button>
                    <a href="../db/hapusTransaksi.php?i=<?=$row['id_transaksi']?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
<?php
        }
    }

?>