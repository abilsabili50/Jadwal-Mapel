<?php

include_once "../functions.php";
// digunakan untuk mengambil key pada db;
$sqlKey = [];
$nama_tabel = "guru_pengajar";
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $results = sqlquery("SELECT * FROM guru_pengajar WHERE IDGURU = '$id'");
  foreach ($results as $result) {
    foreach ($result as $key => $val) {
      $sqlKey[] = $key;
    }
    break;
  }
} else {
  echo "<script>
			document.location.href = '../../pages/guru.php';
		</script>";
}

if (isset($_POST["submit"])) {
  global $id;
  if (ubah($_POST, $sqlKey, $nama_tabel, $id) > 0) {
    echo "
				<script>
					alert('Data Berhasil Diubah!');
					document.location.href = '../../pages/guru.php';
				</script>
			";
  } else {
    echo "
				<script>
					alert('Data Gagal Diubah!');
					document.location.href = '../../pages/guru.php';
				</script>
			";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Edit</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../index.php" class="brand-link">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-bold ml-3">Data Sekolah</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-header">Navigation</li>
            <li class="nav-item">
              <a href="../../pages/guru.php" class="nav-link active">
                <i class="nav-icon fas fa-chalkboard-user"></i>
                <p>
                  Guru Pengajar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/murid.php" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Murid
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/mapel.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Mata Pelajaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/ruang.php" class="nav-link">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                  Data Ruang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../pages/jadwal.php" class="nav-link">
                <i class="nav-icon fas fa-calendar-days"></i>
                <p>
                  Jadwal Mata Pelajaran
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Data Guru</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <form action="" method="POST">
          <div class="row">
            <form action="" method="POST">
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Nama</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="<?= $sqlKey[0]; ?>" class="col-form-label">ID Guru:</label>
                      <input value="<?= $results[0][$sqlKey[0]]; ?>" type="text" class="form-control" id="<?= $sqlKey[0]; ?>" name="<?= $sqlKey[0]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[1]; ?>" class="col-form-label">Nama Guru:</label>
                      <input value="<?= $results[0][$sqlKey[1]]; ?>" type="text" class="form-control" id="<?= $sqlKey[1]; ?>" name="<?= $sqlKey[1]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[2]; ?>" class="col-form-label">Gelar Depan Guru:</label>
                      <input value="<?= $results[0][$sqlKey[2]]; ?>" type="text" class="form-control" id="<?= $sqlKey[2]; ?>" name="<?= $sqlKey[2]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[3]; ?>" class="col-form-label">Gelar Belakang Guru:</label>
                      <input value="<?= $results[0][$sqlKey[3]]; ?>" type="text" class="form-control" id="<?= $sqlKey[3]; ?>" name="<?= $sqlKey[3]; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Data Diri</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="<?= $sqlKey[4]; ?>">Jenis Kelamin:</label>
                      <select id="<?= $sqlKey[4]; ?>" name="<?= $sqlKey[4]; ?>" class="form-control custom-select">
                        <?php if ($results[0][$sqlKey[4]] === "L") : ?>
                          <option value="L" selected>Laki-laki</option>
                          <option value="P">Perempuan</option>
                        <?php else : ?>
                          <option value="L">Laki-laki</option>
                          <option value="P" selected>Perempuan</option>
                        <?php endif; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[5]; ?>" class="col-form-label">Agama Guru:</label>
                      <input value="<?= $results[0][$sqlKey[5]]; ?>" type="text" class="form-control" id="<?= $sqlKey[5]; ?>" name="<?= $sqlKey[5]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[6]; ?>" class="col-form-label">Alamat Guru:</label>
                      <input value="<?= $results[0][$sqlKey[6]]; ?>" type="text" class="form-control" id="<?= $sqlKey[6]; ?>" name="<?= $sqlKey[6]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[7]; ?>" class="col-form-label">Kota Lahir Guru:</label>
                      <input value="<?= $results[0][$sqlKey[7]]; ?>" type="text" class="form-control" id="<?= $sqlKey[7]; ?>" name="<?= $sqlKey[7]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[8]; ?>" class="col-form-label">Tanggal Lahir Guru:</label>
                      <input value="<?= $results[0][$sqlKey[8]]; ?>" type="date" class="form-control" id="<?= $sqlKey[8]; ?>" name="<?= $sqlKey[8]; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-md-6">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Media Sosial</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="<?= $sqlKey[9]; ?>" class="col-form-label">No Handphone Guru:</label>
                      <input value="<?= $results[0][$sqlKey[9]]; ?>" type="text" class="form-control" id="<?= $sqlKey[9]; ?>" name="<?= $sqlKey[9]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[10]; ?>" class="col-form-label">No Whatsapp Guru:</label>
                      <input value="<?= $results[0][$sqlKey[10]]; ?>" type="text" class="form-control" id="<?= $sqlKey[10]; ?>" name="<?= $sqlKey[10]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[11]; ?>" class="col-form-label">ID Telegram Guru:</label>
                      <input value="<?= $results[0][$sqlKey[11]]; ?>" type="text" class="form-control" id="<?= $sqlKey[11]; ?>" name="<?= $sqlKey[11]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[12]; ?>" class="col-form-label">ID Line Guru:</label>
                      <input value="<?= $results[0][$sqlKey[12]]; ?>" type="text" class="form-control" id="<?= $sqlKey[12]; ?>" name="<?= $sqlKey[12]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[13]; ?>" class="col-form-label">ID Facebook Guru:</label>
                      <input value="<?= $results[0][$sqlKey[13]]; ?>" type="text" class="form-control" id="<?= $sqlKey[13]; ?>" name="<?= $sqlKey[13]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[14]; ?>" class="col-form-label">ID Instagram Guru:</label>
                      <input value="<?= $results[0][$sqlKey[14]]; ?>" type="text" class="form-control" id="<?= $sqlKey[14]; ?>" name="<?= $sqlKey[14]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[15]; ?>" class="col-form-label">ID Twitter Guru:</label>
                      <input value="<?= $results[0][$sqlKey[15]]; ?>" type="text" class="form-control" id="<?= $sqlKey[15]; ?>" name="<?= $sqlKey[15]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[16]; ?>" class="col-form-label">ID Youtube Guru:</label>
                      <input value="<?= $results[0][$sqlKey[16]]; ?>" type="text" class="form-control" id="<?= $sqlKey[16]; ?>" name="<?= $sqlKey[16]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="<?= $sqlKey[17]; ?>" class="col-form-label">Email Guru:</label>
                      <input value="<?= $results[0][$sqlKey[17]]; ?>" type="email" class="form-control" id="<?= $sqlKey[17]; ?>" name="<?= $sqlKey[17]; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
              </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <a href="#" class="btn btn-danger">Cancel</a>
              <input type="submit" name="submit" value="Save Changes" class="btn btn-warning float-right">
            </div>
          </div>
        </form>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>