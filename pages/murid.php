<?php

include '../src/functions.php';
// digunakan untuk mengambil key pada db;
$sqlKey = [];
$nama_tabel = "murid";
$results = sqlquery("SELECT * FROM murid");

if (isset($_GET["submitSearch"])) {
  $stringQuery = cari($_GET["keyword"], $nama_tabel, "NAMA_MURID");
  $results = sqlquery($stringQuery);
}

foreach ($results as $result) {
  foreach ($result as $key => $val) {
    $sqlKey[] = $key;
  }
  break;
}

if (isset($_POST["submit"])) {
  if (tambah($_POST, $sqlKey, $nama_tabel) > 0) {
    echo "
        <script>
          alert('Data Berhasil Ditambahkan!');
          document.location.href = 'murid.php';
        </script>
      ";
  } else {
    echo "
        <script>
          alert('Data Gagal Ditambahkan!');
          document.location.href = 'murid.php';
        </script>
      ";
  }
}

if (isset($_GET['id'])) {
  clickHapus();
}

function clickHapus()
{
  global $sqlKey;
  $key_id = $sqlKey[0];
  global $nama_tabel;
  if (hapus($_GET["id"], $nama_tabel, $key_id) > 0) {
    echo "
          <script>
            alert('Data Berhasil Dihapus!');
            document.location.href = 'murid.php';
          </script>
        ";
  } else {
    echo "
          <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'murid.php';
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
  <title>AdminLTE 3 | Projects</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
              <a href="guru.php" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-user"></i>
                <p>
                  Guru Pengajar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                  Murid
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="mapel.php" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Mata Pelajaran
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="ruang.php" class="nav-link">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                  Data Ruang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="jadwal.php" class="nav-link">
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
              <h1>Data Murid</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" href="#">Tambah Data</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <form action="" method="get">
          <div class="form-group">
            <div class="row">
              <div class="col-md-11">
                <input type="search" class="form-control" id="cari" name="keyword" placeholder="Search by Name" autofocus>
              </div>
              <div class="col-md-1">
                <button type="submit" name="submitSearch" class="btn btn-info">Cari</button>
              </div>
            </div>
          </div>
        </form>
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Projects</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body overflow-auto p-0">
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>JK</th>
                  <th>Agama</th>
                  <th>Alamat</th>
                  <th>Kota Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Telepon</th>
                  <th>Whatsapp</th>
                  <th>ID Telegram</th>
                  <th>ID Line</th>
                  <th>ID Facebook</th>
                  <th>ID Instagram</th>
                  <th>ID Twitter</th>
                  <th>ID Youtube</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($results as $murid) : ?>
                  <tr>
                    <?php foreach ($sqlKey as $value) : ?>
                      <td><?= $murid[$value]; ?></td>
                    <?php endforeach; ?>
                    <td class="project-actions text-right">
                      <a class="btn btn-warning btn-sm" href="../src/action/edit-murid.php?id=<?= $murid['NO_INDUK']; ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="murid.php?id=<?= $murid['NO_INDUK']; ?>" onclick="confirm('Apakah Anda Yakin ?');">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link text-white" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link text-white" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-white" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-white" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link text-white" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
      </section>
      <!-- /.content -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label for="<?= $sqlKey[0]; ?>" class="col-form-label">No Induk:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[0]; ?>" name="<?= $sqlKey[0]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[1]; ?>" class="col-form-label">Nama:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[1]; ?>" name="<?= $sqlKey[1]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[2]; ?>">Jenis Kelamin:</label>
                  <select id="<?= $sqlKey[2]; ?>" name="<?= $sqlKey[2]; ?>" class="form-control custom-select">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[3]; ?>" class="col-form-label">Agama:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[3]; ?>" name="<?= $sqlKey[3]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[4]; ?>" class="col-form-label">Alamat Rumah:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[4]; ?>" name="<?= $sqlKey[4]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[5]; ?>" class="col-form-label">Tempat Lahir:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[5]; ?>" name="<?= $sqlKey[5]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[6]; ?>" class="col-form-label">Tanggal Lahir:</label>
                  <input type="date" class="form-control" id="<?= $sqlKey[6]; ?>" name="<?= $sqlKey[6]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[7]; ?>" class="col-form-label">No Handphone:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[7]; ?>" name="<?= $sqlKey[7]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[8]; ?>" class="col-form-label">No Whatsapp:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[8]; ?>" name="<?= $sqlKey[8]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[9]; ?>" class="col-form-label">ID Telegram:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[9]; ?>" name="<?= $sqlKey[9]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[10]; ?>" class="col-form-label">ID Line:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[10]; ?>" name="<?= $sqlKey[10]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[11]; ?>" class="col-form-label">ID Facebook:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[11]; ?>" name="<?= $sqlKey[11]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[12]; ?>" class="col-form-label">ID Instagram:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[12]; ?>" name="<?= $sqlKey[12]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[13]; ?>" class="col-form-label">ID Twitter:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[13]; ?>" name="<?= $sqlKey[13]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[14]; ?>" class="col-form-label">ID Youtube:</label>
                  <input type="text" class="form-control" id="<?= $sqlKey[14]; ?>" name="<?= $sqlKey[14]; ?>">
                </div>
                <div class="form-group">
                  <label for="<?= $sqlKey[15]; ?>" class="col-form-label">Email:</label>
                  <input type="email" class="form-control" id="<?= $sqlKey[15]; ?>" name="<?= $sqlKey[15]; ?>">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Kirim!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
</body>

</html>