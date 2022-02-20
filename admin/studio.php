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
    Studio - MV Music Studio
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
        <div class="col-xl-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-microphone-alt pr-1"></i> Tambah Studio</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 mb-3">
                                    <label for="nama_studio">Nama Studio</label>
                                    <input type="hidden" name="id_studio" id="id_studio">
                                    <input type="text" name="nama_studio" id="nama_studio" class="form-control">
                                </div>
                                <div class="col-xl-12 mb-3">
                                    <label for="harga">Harga Sewa</label>
                                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Enter number here">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <input type="submit" name="simpanStudio" value="Simpan" class="btn btn-danger float-right">
                        <input type="submit" name="ubahStudio" value="Update" class="btn btn-warning mr-2 float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <h2 class="px-2 py-2 py-md-0"><i class="fas fa-microphone pr-1"></i> List Studio</h2>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-bordered table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Studio</th>
                                <th>Harga Sewa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              
                              <?php include "../db/readStudio.php"; ?>

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
    <script>
        const edit = (idStudio,nama,harga) => {
          $('#id_studio').val(idStudio);
          $('#nama_studio').val(nama);
          $('#harga').val(harga);
        }
        $('#btn-search').click(function (e) { 
          e.preventDefault();
          alert('s')
        });
    </script>
    <?php
    
        // Input Jenis
        if(isset($_POST['simpanStudio'])) {
            $insertStudio = mysqli_query($konek,"INSERT INTO studio (nama_studio,harga) VALUES ('$_POST[nama_studio]','$_POST[harga]')");
            if($insertStudio) {
                echo "<script>window.location.href = 'studio.php';</script>";
            }
        }
        else if(isset($_POST['ubahStudio'])) {
            $ubah = mysqli_query($konek,"UPDATE studio  SET nama_studio='$_POST[nama_studio]',harga='$_POST[harga]' WHERE id_studio = $_POST[id_studio]");
            if($ubah) {
                echo "<script>window.location.href = 'studio.php';</script>";
            }
        }
        // Ubah Jenis

    ?>
</body>

</html>