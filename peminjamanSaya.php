<?php
session_start();
include 'config.php';

if (isset($_SESSION['nim_penyewa']) && isset($_SESSION['password'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian head HTML -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiPirang-Peminjaman</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
</head>
<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar dan elemen-elemen lainnya -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SiPirang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading"></div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="formDaftar.php">
            <i class="fas fa-list"></i>
            <span>Form Peminjaman</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
          <a class="nav-link" href="#">
            <i class="fas fa-user-check"></i>
            <span>Peminjaman Saya</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
                <a class="nav-link collapsed" href="kalenderPinjam.php" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-calendar"></i>
                    <span>Kalender Pinjam</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ruangan dan Gazebo:</h6>
                        <a class="collapse-item" href="pinjamSeminar.php">Ruang Seminar</a>
                        <a class="collapse-item" href="pinjam101.php">Ruang 101</a>
                        <a class="collapse-item" href="pinjamGracen.php">Graha Cendekia</a>
                        <!-- Divider -->
                        <a class="collapse-item" href="pinjamTekkim.php">Gazebo Teknik Kimia</a>
                        <a class="collapse-item" href="pinjamTeksip.php">Gazebo Teknik Sipil</a>
                        <a class="collapse-item" href="pinjamPKK.php">Gazebo PKK</a>
                    </div>
                </div>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar dan elemen-elemen lainnya -->
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
              </li>

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_penyewa']; ?></span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="profil.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <!-- Bagian page heading -->
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Tabel Penyewaan</h6>
                        </div>
                        <div class="card-body">
                            <?php
                            // Sertakan file konfigurasi database
                            include 'config.php';
                            // Query untuk mengambil data mahasiswa dari database
                            $query = "SELECT * FROM tb_penyewaan1 WHERE nim_penyewa = " . $_SESSION['nim_penyewa'];
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                                echo '<div class="table-responsive">';
                                echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background: rgba(255, 255, 255, 0.8);">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th class="text-center">ID Penyewaan</th>';
                                echo '<th class="text-center">NIM Penyewa</th>';
                                echo '<th class="text-center">ID Gazebo</th>';
                                echo '<th class="text-center">ID Ruangan</th>';
                                echo '<th class="text-center">Waktu Mulai</th>';
                                echo '<th class="text-center">Waktu Selesai</th>';
                                echo '<th class="text-center">Nama Kegiatan</th>';
                                echo '<th class="text-center">Aksi</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td class="text-center">' . $no . '</td>';
                                    echo '<td>' . $row['nim_penyewa'] . '</td>';
                                    echo '<td>' . $row['id_gazebo'] . '</td>';
                                    echo '<td>' . $row['id_ruangan'] . '</td>';
                                    echo '<td>' . $row['mulai_sewa'] . '</td>';
                                    echo '<td>' . $row['selesai_sewa'] . '</td>';
                                    echo '<td>' . $row['nama_kegiatan'] . '</td>';
                                    echo '<td class="text-center">';
                                    echo '<a href="formEdit.php?id=' . $row['id_penyewaan'] . '" class="btn btn-warning btn-icon-split mb-2">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-pen"></i>
                                            </span>
                                            <span class="text">Edit Data</span>
                                        </a>';
                                    echo '    ';
                                    echo '<button class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal' . $row['id_penyewaan'] . '">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Delete Data</span>
                                        </button>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $no++;
                                }
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                            } else {
                                echo 'Tidak ada data peminjaman.';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- MODAL DELETE -->
                    <?php
                    mysqli_data_seek($result, 0); // Reset pointer hasil query

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="modal fade" id="deleteModal' . $row['id_penyewaan'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">';
                        echo '<div class="modal-dialog" role="document">';
                        echo '<div class="modal-content">';
                        echo '<div class="modal-header">';
                        echo '<h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>';
                        echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
                        echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                        echo '</div>';
                        echo '<div class="modal-body">';
                        echo '<p>Anda yakin ingin menghapus data ini?</p>';
                        echo '<form action="deletePeminjaman.php" method="post">';
                        echo '<input type="hidden" name="id_penyewaan" value="' . $row['id_penyewaan'] . '">';
                        echo '<div class="form-group">';
                        echo '<label for="id_penyewaan">ID Penyewaan:</label>';
                        echo '<input type="text" class="form-control" name="id_penyewaan" value="' . $row['id_penyewaan'] . '"></input>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="nim_penyewa">NIM Penyewa:</label>';
                        echo '<input type="text" class="form-control" name="nim_penyewa" value="' . $row['nim_penyewa'] . '"></input>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="tanggal_pembatalan">Tanggal Pembatalan:</label>';
                        echo '<input type="date" class="form-control" name="tanggal_pembatalan" required></input>';
                        echo '</div>';
                        echo '<div class="form-group">';
                        echo '<label for="alasan_batal">Alasan Pembatalan:</label>';
                        echo '<textarea class="form-control" name="alasan_batal" rows="3" required></textarea>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-danger mr-2">Hapus</button>';
                        echo '<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

            <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-dark" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

        <!-- Kode JavaScript dan elemen-elemen lainnya -->
        <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    </div>
</body>
</html>

<?php
} else {
    header("Location: login.php");
    exit();
}
?>
