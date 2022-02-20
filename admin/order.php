<?php 
        session_start();
        include "../db/konek.php";
        if(!$_SESSION['username']) {
            header("Location: ../");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Transaksi - MV Music Studio
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="">
        <h3>MV Music Studio</h3>
      </a>
      <!-- User -->
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                  <h1>MV Music Studio</h1>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <?php include "../components/sidebar.php" ?>
        <!-- Divider -->
        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a href="../db/signout.php" class="nav-link">
              <i class="ni ni-send text-dark"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark bg-gradient-info" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span id="btn-search" class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input id="search-box" class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['username'] ?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    
    <div class="container-fluid pb-8 pt-2 pt-md-5">
      <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-plus pr-2"></i> Tambah Transaksi</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="../db/tambahPesan.php">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                      <input type="hidden" name="id_transaksi" id="id_transaksi">
                                      <label for="nama_penyewa">Nama Penyewa</label>
                                      <input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control" placeholder="Enter text here" required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="studio">Studio</label>
                                    <select name="studio" id="studio" class="form-control" required>
                                        <option value="0" disabled selected>Pilih Studio</option>
                                        <?php
                                              $selStudio = mysqli_query($konek,"SELECT * FROM studio");
                                              foreach($selStudio as $row) {
                                        ?>
                                                    <option value="<?=$row['id_studio']?>"><?=$row['nama_studio']?></option>
                                        <?php
                                              }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="lama_sewa">Lama Sewa</label>
                                      <input type="tel" name="lama_sewa" id="lama_sewa" class="form-control" placeholder="Enter number here" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="mulai">Jam Mulai</label>
                                      <input type="time" name="mulai" id="mulai" class="form-control" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="selesai">Jam Selessai</label>
                                      <input type="time" name="selesai" id="selesai" class="form-control" readonly required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                      <label for="harga">Harga Sewa</label>
                                      <input type="number" name="harga" id="harga" class="form-control" readonly required>
                                </div>
                                <div class="col-xl-6 mb-3">
                                      <label for="hatot">Total Bayar</label>
                                      <input type="number" name="hatot" id="hatot" class="form-control" readonly required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <p class="float-left">Note: </p>
                        <input type="submit" name="tambah" value="Simpan" class="btn btn-danger float-right ml-2">
                        <input type="submit" name="ubah" value="Ubah" class="btn btn-primary float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-money-check mr-2"></i> Tabel Data Pesaanan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Penyewa</th>
                                <th>Tanggal</th>
                                <th>Studio</th>
                                <th>Harga</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Harga Bayar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php include "../db/showTransaksi.php"; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
    <!--   Core   -->
    <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--   Optional JS   -->
    <script src="../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
    <script src="../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
    <!--   Argon JS   -->
    <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="../assets/js/plugins/custom/time.js"></script>
    <script>
        let harga = 0;
        let hatot = 0;
        let lama_sewa = 0;
        let jam_mulai = 0;
        let jam_selesai = 0;
        let jam_tambahan = 0;
        const search = () => {
          let query = $('#query').val();
          window.location.href = 'order.php?q=' + query;
        }

        const ubah = (id_transaksi,nama,studio,mulai,selesai,harga,hatot) => {
            $('#id_transaksi').val(id_transaksi);
            $('#nama_penyewa').val(nama);
            $('#studio').val(studio);
            $('#mulai').val(mulai);
            $('#selesai').val(selesai);
            $('#harga').val(harga);
            $('#hatot').val(hatot);
        }

        $('#studio').change(function (e) { 
          e.preventDefault();
          $.ajax({
            type: "GET",
            url: "../db/cekHarga.php?i=" + $(this).val(),
            success: function (res) {
                data = JSON.parse(res)
                data.forEach(el => {
                    harga = parseFloat(el.harga);
                    hatot = parseFloat(harga * lama_sewa);
                });
                
                $('#harga').val(harga);
                $('#hatot').val(hatot);
            } 
            
          });
          
        });
        $('#lama_sewa').keyup(function (e) { 
            // Hitung Jam
            lama_sewa = $(this).val();
            jam_tambahan = toDecimal(jam_mulai) + parseFloat(lama_sewa);
            jam_selesai = toJam(jam_tambahan);
            // Hitung Harga
            harga = $('#harga').val();
            hatot = parseFloat(harga) *  parseFloat(lama_sewa);
            $('#hatot').val(hatot);
            $('#selesai').val(jam_selesai);

            
        });
        $('#mulai').on('change', function () {
            // Hitung Jam
            jam_mulai = $(this).val();
            jam_tambahan = toDecimal(jam_mulai) + parseFloat(lama_sewa);
            jam_selesai = toJam(jam_tambahan);
            // Hitung Harga
            harga = $('#harga').val();
            hatot = parseFloat(harga) *  parseFloat(lama_sewa);
            $('#hatot').val(hatot);
            $('#selesai').val(jam_selesai);
        });
    </script>
</body>

</html>